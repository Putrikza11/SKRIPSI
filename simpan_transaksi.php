<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

if (isset($_POST['btn-pesan'])) {

    $id = $_SESSION['id_user'];
    $namabrand= $_POST['namaBrand'];
    $tanggal = $_POST['tanggal'];
    $bahan = $_POST['bahan'];
    $warna = $_POST['warna'];
    $ukuran_panjang=$_POST['inputPanjang'];
    $ukuran_lebar = $_POST['inputLebar'];
    $ukuran_tinggi = $_POST['inputTinggi'];
    $quantity=$_POST['quantity'];
    $laminasi=$_POST['laminasi'];

    $query = ("INSERT INTO transaksi (id_user,nama_brand,tanggal,nama_bahan,ukuran_panjang,ukuran_lebar,ukuran_tinggi,warna_produk,laminasi_produk,quantity) 
  VALUES ('$id','$namabrand','$tanggal','$bahan','$ukuran_panjang','$ukuran_lebar','$ukuran_tinggi','$quantity','$laminasi')
  ");

    mysqli_query($conn, $query);


}


?>