<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');


// Ambil data dari post
$id_user = $_SESSION['id_user'];
$namabrand = $_POST['namaBrand'];
$tanggal = $_POST['tanggal'];

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
    $resultPanjang = $conn->query("SELECT * FROM `potongan_kertas` WHERE panjang >=$panjang_kertas ORDER BY id ASC LIMIT 1");
    $potongan_kertas_panjang = mysqli_fetch_array($resultPanjang);

    $panjangMaster = $potongan_kertas_panjang['(panjang'];

    
    $lebarMaster = $potongan_kertas_error['lebar'];

    // selisih antara  inputan user dan master
    $panjangSelisih = $panjang_kertas - $panjangMaster;
    $lebarSelisih = $lebar_kertas - $lebarMaster;


    header("Location:../order.php?message='Ukuran produk tidak valid'&action='error'");
} else {
    // extrack data dari array database untuk potongan kertas
    $id_potongan_kertas = $potongan_kertas['id'];
    $bagi = $potongan_kertas['bagi'];
    $panjangMaster = $potongan_kertas['panjang'];
    $lebarMaster = $potongan_kertas['lebar'];

    // Ambil data bahan dari database
    $resultBahan = $conn->query("SELECT * FROM bahan WHERE id = $id_bahan ");
    $bahan = mysqli_fetch_array($resultBahan);
    // extrack data dari array database untuk bahan
    $harga_bahan = $bahan['harga'];
    $nama_bahan = $bahan['nama_bahan'];


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

    // Insert query to table transaksi
    $query = ("INSERT INTO transaksi (id_user,nama_brand,tanggal,ukuran_panjang,ukuran_lebar,ukuran_tinggi,quantity,harga_satuan,total_harga,id_bahan,id_warna,id_laminasi,id_potongan_kertas) 
VALUES ('$id_user','$namabrand','$tanggal','$panjang','$lebar','$tinggi', '$quantity','$hargaSatuan','$totalHarga','$id_bahan','$id_warna','$id_laminasi','$id_potongan_kertas')");
    mysqli_query($conn, $query);

    // get users infor query
    $resultUser = $conn->query("SELECT * FROM user WHERE id = $id_user ");
    $user = mysqli_fetch_array($resultUser);
    // extrack data dari array database untuk user
    $nama_user = $user['nama'];

    // Redirect to WA 
    $no_wa = "6288210787770";
    $text = "Pesanan atas Nama : " . $nama_user . ", dengan Nama Brand : " . $namabrand . ", Ukuran : " . $panjang . " x " . $lebar . " x " . $tinggi . ", Bahan : " . $nama_bahan . " dan Quantity : " . $quantity;


    $wa_url = "https://api.whatsapp.com/send?phone=" . $no_wa . "&text=" . $text;


    header("Location:$wa_url");
}
