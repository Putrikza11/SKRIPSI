<?php 
// buat function rumus menghitung ukuran master
function rumus($input_ukuran){
    //ambil data dari form input ukuran masukin ke variabel
    $panjang = $input_ukuran["inputPanjang"];
    $lebar = $input_ukuran["inputLebar"];
    $tinggi = $input_ukuran["inputTinggi"];

    // kemudian hitung 
    $rumus_panjang = 2 * $tinggi + $panjang;
    $rumus_lebar = 3* $tinggi + 2* $lebar;
    
}


?>