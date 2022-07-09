<?php

$conn = mysqli_connect("localhost", "root", "", "db_company");

require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');


//mengecek apakah sudah login atau belum
// if (isset($_POST["btn-pesan"])) {

//     if (!isset($_SESSION["login"])) {
//         header("Location: login.php");
//     }
// }

//     //pilih db_potongan kertas
//     $result = mysqli_query($conn, "SELECT * FROM potongan_kertas WHERE ");

//   if ($rumus_panjang>=) {
//     # code...
//   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './component/head.php'; ?>

    <title>Custom Order</title>

</head>

<body>
    <!-- NAVBAR -->
    <?php require_once './component/navbar.php'; ?>

    <!-- END NAVBAR -->

    <div class="container-fluid">
        <div class="row d-flex justify-content-center  py-10">
            <div class="col-md-6">
                <div class="form-box px-5 py-4 mt-5">
                    <div class="title-order text-center mb-5">
                        <h2 style="color: #7D1D64;" class="text-3xl font-semibold">CUSTOM ORDER!</h2>
                        <P>Lihat detail Bahan dan produk <a href="material.php">Klik disini</a></P>
                    </div>
                    <div class="input-order">
                        <form class=" g-3" method="POST" action="">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="inputBrand" class="form-label">Nama Brand</label>
                                    <input type="text" required class="form-control" name="namaBrand" id="inputNamaBrand" placeholder="Exp : BrownieCake">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="inputBahan" class="form-label">Bahan</label>
                                    <select id="inputBahan" class="form-select" name="bahan">
                                        <option selected>Choose...</option>

                                        <?php

                                        $bahanOptions = $conn->query('SELECT * FROM bahan');

                                        while ($bahan = mysqli_fetch_array($bahanOptions)) :

                                        ?>
                                            <option class="capitalize" value="<?= $bahan['id'] ?>"><?= $bahan['nama_bahan'] ?></option>
                                        <?php endwhile; ?>

                                    </select>

                                </div>

                                <div class="col-md-4">
                                    <label for="inputWarna" class="form-label">Warna</label>
                                    <select id="inputWarna" class="form-select" name="warna">
                                        <option selected>Choose...</option>
                                        <?php

                                        $warnaOptions = $conn->query('SELECT * FROM warna');

                                        while ($warna = mysqli_fetch_array($warnaOptions)) :

                                        ?>
                                            <option class="capitalize" value="<?= $warna['id'] ?>"><?= $warna['jenis_warna'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 ">
                                    <label for="inputUkuran" class="form-label">Ukuran (cm)</label>
                                    <div class="input-wrapper w-full flex justify-between">
                                        <div class="col-md-4 pr-[10px]">
                                            <input type="number" class="form-control" id="inputPanjang" name="inputPanjang" placeholder="Panjang">
                                        </div>
                                        <div class="col-md-4 px-[10px]">
                                            <input type="number" class="form-control" id="inputLebar" name="inputLebar" placeholder="Lebar">
                                        </div>
                                        <div class="col-md-4 pl-[10px]">
                                            <input type="number" class="form-control" id="inputTinggi" name="inputTinggi" placeholder="Tinggi">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label for="inputQty" class="form-label">Quantity</label>
                                    <input type="number" min="500" class="form-control" id="inputQty" name="quantity" placeholder="500">
                                </div>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="inputLaminasi" class="form-label">Laminasi <span class='text-xs text-slate-500'>(opsional)</span></label>
                                <select id="inputLaminasi" class="form-select" name='laminasi'>
                                    <option selected>Choose...</option>
                                    <?php

                                    $laminasiOptions = $conn->query('SELECT * FROM laminasi');

                                    while ($laminasi = mysqli_fetch_array($laminasiOptions)) :

                                    ?>
                                        <option class="capitalize" value="<?= $laminasi['id'] ?>"><?= $laminasi['jenis_laminasi'] ?></option>
                                    <?php endwhile; ?>

                                </select>
                            </div>


                            <div class="col-12 mb-3  flex flex-row justify-between items-center">
                                <button type="submit" class="btn btn-secondary bg-[#6c757d] h-fit ">Cek Harga</button>
                                <div class="price-info-wrapper my-3 text-right">
                                    <?php

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

                                        $totalHarga = $hpp * 110 / 100;
                                        $hargaSatuan = $totalHarga  / $quantity;

                                        // echo 'Rp. ' . number_format(ceil($totalHarga));
                                    }
                                    ?>

                                    <p>
                                        <?php
                                        if (isset($totalHarga)) {
                                            echo 'Total Harga : Rp. ' . number_format(ceil($totalHarga));
                                        }
                                        ?>

                                    </p>
                                    <p>
                                        <?php
                                        if (isset($hargaSatuan)) {
                                            echo  number_format(ceil($hargaSatuan)) . '/pcs';
                                        }
                                        ?>

                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- https://api.whatsapp.com/send?phone=6288210787770-->
                                <?php
                                if (isset($_SESSION["login"])) :
                                    if ($_SESSION["login"]) : ?>
                                        <a class="btn  bg-[#9D4689] focus:bg-[#9D4689] hover:bg-[#c25caa] active:bg-[#d85ebc]  text-white block w-full" href='https://api.whatsapp.com/send?phone=6288210787770' name="btn-pesan" target="_blank">Pesan dan Konsultasi Desain
                                        </a>
                                    <?php
                                    endif; ?>

                                <?php else : ?>
                                    <a class="btn  bg-[#9D4689] focus:bg-[#9D4689] hover:bg-[#c25caa] active:bg-[#d85ebc]  text-white block w-full" href='/login.php' name="btn-pesan">Pesan dan Konsultasi Desain
                                    </a>
                                <?php endif
                                ?>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './component/footer.php'; ?>

    <script>
        let inputQuantityField = document.querySelector('#inputQty');


        inputQuantityField.addEventListener('keyup', function(e) {
            setTimeout(() => {
                if (inputQuantityField.value <= 500) {
                    inputQuantityField.value = 500;
                }
            }, 1000)
        })
    </script>



</body>

</html>