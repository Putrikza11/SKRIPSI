<?php

// $conn = mysqli_connect("localhost", "root", "", "db_company");

require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');



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
                        <form class=" g-3" method="POST" action="./order/make_order.php">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="inputBrand" class="form-label">Nama Brand</label>
                                    <input type="text" required class="form-control" name="namaBrand"
                                        id="inputNamaBrand" placeholder="Exp : BrownieCake">
                                </div>

                                <div class="col-md-4">
                                    <label for="inputTanggal" class="form-label">Tanggal</label>
                                    <input type="date" required class="form-control" name="tanggal"
                                        value="<?= date('Y-m-d') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="inputBahan" class="form-label">Bahan</label>
                                    <select id="inputBahan" class="form-select" name="bahan" required>
                                        <!-- <option selected>Choose...</option> -->

                                        <?php

                                        $bahanOptions = $conn->query('SELECT * FROM bahan');

                                        while ($bahan = mysqli_fetch_array($bahanOptions)) :

                                        ?>
                                        <option class="capitalize" value="<?= $bahan['id'] ?>">
                                            <?= $bahan['nama_bahan'] ?></option>
                                        <?php endwhile; ?>

                                    </select>

                                </div>

                                <div class="col-md-4">
                                    <label for="inputWarna" class="form-label">Warna</label>
                                    <select id="inputWarna" class="form-select" name="warna" required>
                                        <!-- <option selected>Choose...</option> -->
                                        <?php

                                        $warnaOptions = $conn->query('SELECT * FROM warna');

                                        while ($warna = mysqli_fetch_array($warnaOptions)) :

                                        ?>
                                        <option class="capitalize" value="<?= $warna['id'] ?>">
                                            <?= $warna['jenis_warna'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 ">
                                    <label for="inputUkuran" class="form-label">Ukuran (cm)</label>
                                    <div class="input-wrapper w-full flex justify-between">

                                        <div class="col-md-4 pr-[5px]">
                                            <!-- <input type="number" class="form-control" id="inputPanjang"
                                                name="inputPanjang" placeholder="Panjang" required> -->

                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="inputPanjang"
                                                    name="inputPanjang" placeholder="Panjang" required>
                                                <label for="inputPanjang">Panjang</label>
                                            </div>
                                        </div>


                                        <div class="col-md-4 px-[5px]">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="inputLebar"
                                                    name="inputLebar" placeholder="Lebar" required>
                                                <label for="inputLebar">Lebar</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-[5px]">

                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="inputTinggi"
                                                    name="inputTinggi" placeholder="Tinggi" required>
                                                <label for="inputTinggi">Tinggi</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label for="inputQty" class="form-label">Quantity</label>
                                    <input type="number" min="500" class="form-control" id="inputQty" name="quantity"
                                        placeholder="500" required>
                                </div>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="inputLaminasi" class="form-label">Laminasi <span
                                        class='text-xs text-slate-500'>(opsional)</span></label>
                                <select id="inputLaminasi" class="form-select" name='laminasi'>
                                    <option selected>Choose...</option>
                                    <?php

                                    $laminasiOptions = $conn->query('SELECT * FROM laminasi');

                                    while ($laminasi = mysqli_fetch_array($laminasiOptions)) :

                                    ?>
                                    <option class="capitalize" value="<?= $laminasi['id'] ?>">
                                        <?= $laminasi['jenis_laminasi'] ?></option>
                                    <?php endwhile; ?>

                                </select>
                            </div>


                            <div class="col-12 mb-3  flex flex-row justify-between items-center">
                                <button type="button" class="btn btn-secondary bg-[#6c757d] h-fit"
                                    id='btn_cek_harga'>Cek Harga</button>
                                <div class="price-info-wrapper my-3 text-right" id="price_placeholder">



                                </div>
                            </div>
                            <div class="col-12">
                                <!-- https://api.whatsapp.com/send?phone=6288210787770 -->
                                <?php
                                if (isset($_SESSION["login"])) :
                                    if ($_SESSION["login"]) : ?>
                                <!-- <a class="btn  bg-[#9D4689] focus:bg-[#9D4689] hover:bg-[#c25caa] active:bg-[#d85ebc]  text-white block w-full" href='https://api.whatsapp.com/send?phone=6288210787770' name="btn-pesan" target="_blank">Pesan dan Konsultasi Desain
                                        </a> -->
                                <button
                                    class="btn  bg-[#9D4689] focus:bg-[#9D4689] hover:bg-[#c25caa] active:bg-[#d85ebc]  text-white block w-full"
                                    name="btn-pesan" type="submit">Pesan dan Konsultasi Desain
                                </button>
                                <?php
                                    endif; ?>

                                <?php else : ?>
                                <a class="btn  bg-[#9D4689] focus:bg-[#9D4689] hover:bg-[#c25caa] active:bg-[#d85ebc]  text-white block w-full"
                                    href='/login.php' name="btn-pesan">Pesan dan Konsultasi Desain
                                </a>
                                <?php endif;

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
    // Script for quantity input
    let inputQuantityField = document.querySelector('#inputQty');
    inputQuantityField.addEventListener('change', function(e) {
        setTimeout(() => {
            if (inputQuantityField.value <= 500) {
                inputQuantityField.value = 500;
            }
        }, 3000)
    })



    // Script for cek harga
    const buttonCek = document.querySelector('#btn_cek_harga')
    const formValidation = (name) => {
        const inputForm = $(`[name=${name}`)
        const inputValue = inputForm.val()
        if (inputValue.length == 0) {
            usernameError = false;
            inputForm.focus();
            return false
        } else {

            return true
        }

    }
    $('#btn_cek_harga').click(function() {
        // const quantity = $('[name=quantity').val() ? $('[name=quantity').val() : 500;
        const quantity = formValidation('quantity');
        const panjang = formValidation('inputPanjang');
        const lebar = formValidation('inputLebar');
        const tinggi = formValidation('inputTinggi');

        const data = {
            inputPanjang: $('[name=inputPanjang').val(),
            inputLebar: $('[name=inputLebar').val(),
            inputTinggi: $('[name=inputTinggi').val(),
            quantity: $('[name=quantity').val(),
            bahan: $('[name=bahan').val(),
            warna: $('[name=warna').val(),
            laminasi: $('[name=laminasi').val(),
        }
        if (panjang && lebar && tinggi && quantity) {
            $.ajax({
                url: './order/cek_harga.php',
                method: 'POST',
                data: data,
                success: function(data) {
                    // console.log(data);
                    $('#price_placeholder').html(data);
                }
            })
        }


    })
    </script>

    <!-- script for sweetalert -->
    <script>
    <?php
        if (isset($_GET['action'])) :
        ?>

    Swal.fire({
        icon: <?= $_GET['action'] ?>,
        title: <?= $_GET['message'] ?>,
    })
    <?php endif ?>
    </script>

</body>

</html>