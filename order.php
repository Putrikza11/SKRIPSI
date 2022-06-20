<?php
session_start();


if (isset($_POST["btn-pesan"])) {

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
    }

}
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
                                    <input type="text" class="form-control" id="inputNamaBrand" placeholder="Exp : BrownieCake">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="inputBahan" class="form-label">Bahan</label>
                                    <select id="inputBahan" class="form-select ">
                                        <option selected>Choose...</option>
                                        <option>Bahan Ivory 270gr</option>
                                        <option>Bahan Ivory 300gr</option>
                                        <option>Bahan Ivory 350gr</option>
                                        <option>Bahan Kraft 270gr</option>
                                        <option>Bahan Kraft 310gr</option>
                                        <option>Bahan Kraft 350gr</option>
                                        <option>Bahan Duplex 275gr</option>
                                        <option>Bahan Duplex 310gr</option>
                                        <option>Bahan Duplex 350gr</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputWarna" class="form-label">Warna</label>
                                    <select id="inputWarna" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Full color</option>
                                        <option>One color</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 ">
                                    <label for="inputUkuran" class="form-label">Ukuran (cm)</label>
                                    <div class="input-wrapper w-full flex justify-between">
                                        <div class="col-md-4 pr-[10px]">
                                            <input type="text" class="form-control" id="inputPanjang" placeholder="Panjang">
                                        </div>
                                        <div class="col-md-4 px-[10px]">
                                            <input type="text" class="form-control" id="inputLebar" placeholder="Lebar">
                                        </div>
                                        <div class="col-md-4 pl-[10px]">
                                            <input type="text" class="form-control" id="inputTinggi" placeholder="Tinggi">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label for="inputQty" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="inputQty" placeholder="500">
                                </div>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="inputLaminasi" class="form-label">Laminasi <span class='text-xs text-slate-500'>(opsional)</span></label>
                                <select id="inputLaminasi" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Laminasi glossy 1 sisi</option>
                                    <option>Laminasi glossy 2 sisi</option>
                                    <option>Laminasi doff 1 sisi</option>
                                    <option>Laminasi doff 2 sisi</option>
                                </select>
                            </div>


                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-secondary bg-[#6c757d]  ">Cek Harga</button>
                            </div>
                            <div class="col-12">
                                <button class="btn  bg-[#9D4689] hover:bg-[#9D4689] text-white block w-full" type="submit" name="btn-pesan">Pesan dan Konsultasi Desain</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './component/footer.php'; ?>



</body>

</html>