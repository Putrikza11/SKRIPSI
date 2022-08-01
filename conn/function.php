<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
    // buat function rumus menghitung ukuran master
    // function rumus($input_ukuran){
    //     //ambil data dari form input ukuran masukin ke variabel
    //     $panjang = $input_ukuran["inputPanjang"];
    //     $lebar = $input_ukuran["inputLebar"];
    //     $tinggi = $input_ukuran["inputTinggi"];

    //     // kemudian hitung 
    //     $rumus_panjang = 2 * $tinggi + $panjang;
    //     $rumus_lebar = 3* $tinggi + 2* $lebar;

    // }

    $harga_bahan = 6500;
    $panjang = 22;
    $lebar = 22;
    $tinggi = 8;
    $full_color = 150000;
    $laminasi = 0;
    $qty = 500;
    $panjang_ukuran_kertas = 39.5;
    $lebar_ukuran_kertas = 54;
    $satuan_warna = 60;

    //rumus mencari p x l potongan kertas
    $panjang_kertas = 2 * $tinggi + $panjang;
    $lebar_kertas = 3 * $tinggi + 2 * $lebar;

    echo "panjang : $panjang_kertas";
    echo "<br />";
    echo "lebar: $lebar_kertas";
    echo "<br />";
    echo "ukuran yang dipakai: $panjang_ukuran_kertas 'and' $lebar_ukuran_kertas ";
    echo "<br />";

    //hitung harga bahan
    $bahan = $harga_bahan / 4;
    echo round($bahan);
    echo "<br />";
    $total_bahan = $bahan * ($qty + 150);
    echo "total harga bahan: $total_bahan ";
    echo "<br />";

    //hitung harga full color
    if ($qty > 1000) {
        $harga_qty = $satuan_warna * ($qty - 1000);
        $total_harga_warna = $full_color + $harga_qty;
        echo "total harga warna: $total_harga_warna ";
    } else {
        echo "total harga warna: $full_color ";
    }
    echo "<br />";

    //hitung harga laminasi;
    $total_harga_laminasi = $panjang_ukuran_kertas * $lebar_ukuran_kertas
        * $laminasi * ($qty + 150);
    echo "total harga laminasi:$total_harga_laminasi";
    echo "<br />";

    //hitung harga pond
    $total_harga_pond = 250000 + 60000;
    echo "total harga pond: $total_harga_pond";
    echo "<br />";

    //hitung HPP
    $hpp = $total_bahan + $full_color +
        $total_harga_laminasi + $total_harga_pond;
    echo
    "<p> HPP : Rp." . number_format(ceil($hpp)) . "</p>";
    echo "<br />";

    //hitung satuan harga
    $harga = ($hpp * 125 / 100)  / $qty;
    // echo $laba;
    echo "<br />";
    echo "<p> harga satuan Rp." . number_format(ceil($harga)) . "/pcs </p>";

    //hitung total pembelian
    $total_pembelian = $harga * $qty;
    echo "<br />";
    echo
    "<p> total pembelian Rp." . number_format(ceil($total_pembelian))."</p>";






    ?>






</body>

</html>