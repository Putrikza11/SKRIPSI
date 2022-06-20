<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_company";
date_default_timezone_set("Asia/Jakarta");
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	echo "Koneksi database gagal" . mysqli_connect_error();
}

//Debug

// $result = $conn->query("SELECT * FROM produk");
// $rows = [];
// while ($row = $result->fetch_assoc()) {
//     $rows[] = $row;
// }
// echo json_encode($rows);
// // var_dump($rows);
