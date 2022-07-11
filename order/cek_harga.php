<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

if (isset($_POST['inputPanjang'])) {

    // Ambil data dari post
    $panjang = $_POST['inputPanjang'];
    $lebar = $_POST['inputLebar'];
    $tinggi = $_POST['inputTinggi'];
    $quantity = $_POST['quantity'];

    $id_bahan = $_POST['bahan'];
    $id_warna = $_POST['warna'];
    $id_laminasi = $_POST['laminasi'];

    //rumus mencari p x l potongan kertas
    $panjang_kertas = (2 * $tinggi) + $panjang;
    $lebar_kertas = (3 * $tinggi) + (2 * $lebar);

    // Ambil data potongan kertas dari database
    $result = $conn->query("SELECT * FROM potongan_kertas WHERE panjang >= $panjang_kertas and lebar >=$lebar_kertas ORDER BY id DESC LIMIT 1");

    $potongan_kertas = mysqli_fetch_array($result);
    if (count($potongan_kertas) == 0) {
        echo "error";
        $resultError = $conn->query("SELECT * FROM `potongan_kertas` WHERE panjang >=$panjang_kertas or lebar >=$lebar_kertas ORDER BY id ASC LIMIT 1");
        $potongan_kertas_error = mysqli_fetch_array($resultError);

        if (count($potongan_kertas_error) >= 1) {
            $resultPanjang = $conn->query("SELECT * FROM `potongan_kertas` WHERE panjang >=$panjang_kertas ORDER BY id ASC LIMIT 1");
            $potongan_kertas_panjang = mysqli_fetch_array($resultPanjang);

            if (count($potongan_kertas_panjang) >= 1) {
                header("Location:../order.php?message='Ukuran tinggi dan panjang terlalu besar'&action='error'");
            } else {
                header("Location:../order.php?message='Ukuran tinggi dan lebar terlalu besar'&action='error'");
            }
        } else {
            header("Location:../order.php?message='Ukuran terlalu besar'&action='error'");
        }
    } else {
        // extrack data dari array database untuk potongan kertas
        $bagi = $potongan_kertas['bagi'];
        $panjangMaster = $potongan_kertas['panjang'];
        $lebarMaster = $potongan_kertas['lebar'];

        // Ambil data bahan dari database
        $resultBahan = $conn->query("SELECT * FROM bahan WHERE id = $id_bahan ");
        $bahan = mysqli_fetch_array($resultBahan);
        // extrack data dari array database untuk bahan
        $harga_bahan = $bahan['harga'];

        // Ambil data laminasi dari database
        if ($_POST['laminasi'] && $_POST['laminasi'] !== 'Choose...') {

            $resultLaminasi = $conn->query("SELECT * FROM laminasi WHERE id = $id_laminasi ");
            $laminasi = mysqli_fetch_array($resultLaminasi);
            // extrack data dari array database untuk laminasi
            $harga_laminasi = $laminasi['harga'];
        } else {
            $harga_laminasi = 1;
        }

        // Ambil data warna dari database
        $resultWarna = $conn->query("SELECT * FROM warna WHERE id = $id_warna ");
        $warna = mysqli_fetch_array($resultWarna);
        // extrack data dari array database untuk warna

        $harga_warna = $warna['harga'];

        // Ambil data pond dari database

        $resultPond = $conn->query("SELECT * FROM pond");
        $pond = 0;
        while ($ponds = mysqli_fetch_array($resultPond)) {
            $pond = $pond + $ponds['harga'];
        }


        // Perhitungan rumus bahan
        $hargaSatuanPotonganKertas = $harga_bahan / $bagi;
        $totalHargaBahan = $hargaSatuanPotonganKertas * ($quantity + 150);

        // perhitungan rumus warna
        $totalHargaWarna = $quantity >= 1000 ? $harga_warna + (($quantity - 1000) * 60) : $harga_warna;

        // perhitungan rumus laminasi
        $laminasi = $panjangMaster * $lebarMaster * $harga_laminasi * ($quantity + 150);

        //perhitungan rumus hpp
        $hpp = $totalHargaBahan + $totalHargaWarna + $laminasi + $pond;

        //perhitungan total harga dan harga satuan
        $totalHarga = $hpp * 110 / 100;
        $hargaSatuan = $totalHarga  / $quantity;

        echo "
        <p>
            Total Harga : Rp. " . number_format(ceil($totalHarga)) . "
        </p>
        <p> Rp." . number_format(ceil($hargaSatuan)) . "/pcs </p>
        ";
    }
}
