<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

$sesi = $_SESSION['id_user'];


if (isset($_POST['submit'])) {
  $nama = $_POST['Updatename'];
  $username = $_POST['UpdateUsername'];
  $noHp = $_POST['UpdateHp'];
  $alamat = $_POST['UpdateAlamat'];

  $conn->query("UPDATE user SET nama = '$nama', username='$username', alamat='$alamat', nohp = '$noHp' 
  WHERE id = '$sesi'");
  // mysqli_query($conn, $query);
}
header("Location:../pesanan.php?status='success'&message='Data berhasil diubah'");