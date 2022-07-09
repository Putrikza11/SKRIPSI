<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

if (isset($_POST)) {

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
    $resultLaminasi = $conn->query("SELECT * FROM laminasi WHERE id = $id_laminasi ");
    $laminasi = mysqli_fetch_array($resultLaminasi);
    // extrack data dari array database untuk laminasi
    $harga_laminasi = $laminasi['harga'];

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

    $hpp = $totalHargaBahan + $totalHargaWarna + $laminasi + $pond;

    $hargaSatuan = ($hpp * 110 / 100)  / $quantity;
    print($hargaSatuan);
    

    // print_r($_POST);
} else {
    header("Location:../order.php");
}
