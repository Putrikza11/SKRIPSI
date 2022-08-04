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

    // $result2 = $conn->query("SELECT * FROM potongan_kertas WHERE panjang <= $panjang_kertas or lebar <=$lebar_kertas ORDER BY lebar DESC LIMIT 1");
    // $result2 = mysqli_fetch_assoc($result2);

    // $p = $result2["panjang"];
    // $l = $result2["lebar"];

    $potongan_kertas = mysqli_fetch_array($result);

    //jika tidak ada potongan kertas yang sesuai dengan database buat variabel potongan_kertas_error yang berisi hasil kalau potongan kertas tidak ditemukan yg cocok antara panjang atau lebar maka dicek satu-satu.
    if (!$potongan_kertas) {
        $resultError = $conn->query("SELECT * FROM `potongan_kertas` WHERE panjang >=$panjang_kertas or lebar >=$lebar_kertas ORDER BY id ASC LIMIT 1");
        $potongan_kertas_error = mysqli_fetch_array($resultError);

        //jika potongan kertas tidak ditemukan maka di cek ukuran panjang potongan kertas
        if ($potongan_kertas_error) {
            //buat variabel yang menampung nilai dimana ukuran panjang potongan kertas yang ada didatabase lebih panjang dari hasil perhitungan rumus panjang
            $resultPanjang = $conn->query("SELECT * FROM `potongan_kertas` WHERE panjang >=$panjang_kertas ORDER BY id ASC LIMIT 1");
            $potongan_kertas_panjang = mysqli_fetch_array($resultPanjang);

            //jika ukuran panjang yang dihasilkan rumus terlalu besar maka akan muncul notif 
            if ($potongan_kertas_panjang) {

                // header("Location:../order.php?message='Ukuran tinggi dan panjang terlalu besar'&action='error'");
                echo "
                    Ukuran tinggi dan panjang terlalu besar
                    ";
            } else {
                // header("Location:../order.php?message='Ukuran tinggi dan lebar terlalu besar'&action='error'");
                echo "
                   Ukuran tinggi dan lebar terlalu besar
                    ";
            }
        } else {
            // header("Location:../order.php?message='Ukuran terlalu besar'&action='error'");
            //   <b>MAXIMAL PANJANG : '.$p.'</b> <br>
                //   <b>MAXIMAL LEBAR : '.$l.'</b> <br>
                //   <br>
                //   PANJANG KERTAS ANDA : <b>'.$panjang_kertas.'</b> <br>
                //   LEBAR KERTAS ANDA : <b>'.$lebar_kertas.'</b> <br>

            
            echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert">
                  <i class="fa-solid fa-triangle-exclamation"></i> <br>
                  <p>Ukuran terlalu besar</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

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
            $harga_laminasi = 0;
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
        $totalHarga = $hpp * 125 / 100;
        $hargaSatuan = $totalHarga  / $quantity;
        
        echo "
        <span>
            Total Harga : Rp. " . number_format(ceil($totalHarga)) . "
        </span> <br>
        <span>  Rp." . number_format(ceil($hargaSatuan)) . "/pcs
        </span>
        ";
    }
}