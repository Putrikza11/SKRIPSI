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
                <div class="form-box p-5 mt-5">
                    <div class="title-order">
                        <h2 style="color: #7D1D64;">CUSTOM ORDER!</h2>
                        <P>Lihat detail Bahan dan produk <a href="material.html">Klik disini</a></P>
                    </div>
                    <div class="input-order">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="inputBrand" class="form-label">Nama Brand</label>
                                <input type="text" class="form-control" id="inputNamaBrand" placeholder="Exp : BrownieCake">
                            </div>
                            <div class="col-md-6">
                                <label for="inputBahan" class="form-label">Bahan</label>
                                <select id="inputBahan" class="form-select">
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

                            <label for="inputUkuran" class="form-label">Ukuran (cm)</label>


                            <div class="col-md-2">
                                <input type="text" class="form-control" id="inputPanjang" placeholder="Panjang">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="inputLebar" placeholder="Lebar">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="inputTinggi" placeholder="Tinggi">
                            </div>
                            <div class="col-md-6">
                                <label for="inputWarna" class="form-label">Warna</label>
                                <select id="inputWarna" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Full color</option>
                                    <option>One color</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputLaminasi" class="form-label">Laminasi <p>(opsional)</p></label>
                                <select id="inputLaminasi" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Laminasi glossy 1 sisi</option>
                                    <option>Laminasi glossy 2 sisi</option>
                                    <option>Laminasi doff 1 sisi</option>
                                    <option>Laminasi doff 2 sisi</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputQty" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="inputQty" placeholder="500">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Cek Harga</button>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button">Pesan dan Konsultasi Desain</button>
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