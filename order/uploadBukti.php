<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

// Ambil data dari post
$id_transaksi = $_POST['id_transaksi'];

//foto
$filename   = uniqid() . "-" . time();
$extension  = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
$namaFile   = $filename . "." . $extension;


$namaSementara = $_FILES["foto"]["tmp_name"];
$dirUpload  = "../img/buktiTransaksi/{$namaFile}";

// tentukan lokasi file akan dipindahkan
$terupload = move_uploaded_file($namaSementara, $dirUpload);


$conn->query("UPDATE transaksi SET bukti_pembayaran = '$namaFile' WHERE id_transaksi = '$id_transaksi'");
header("Location:../pesanan.php?status='success'&message='Bukti Pembayaran Berhasil Dikirim'");
