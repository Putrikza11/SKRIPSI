<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './component/head.php'; ?>

    <title>Document</title>

</head>

<body>
    <!-- NAVBAR -->
    <?php require_once './component/navbar.php'; ?>

    <!-- END NAVBAR -->

    <!-- JUMBOTRON -->
    <div class="container-fluid !bg-bottom" id="banner-material">
        <div class="row align-items-end h-full container mx-auto">
            <div class="col my-5 ">
                <h1 class="fw-semibold ">MATERIAL PRODUCT</h1>
            </div>
        </div>
    </div>
    <!-- END JUMBOTRON -->

    <!-- CONTENT 1 -->
    <div class="container mx-auto py-[130px]">
        <h5 class="text-[40px] font-medium pl-4 border-l-4 border-l-[#7D1D64]">Bahan utama</h5>

        <div id="content-bahan">

            <div class="left">
                <img src="./asset/img/ivory.jpg" alt="">
            </div>
            <div class="right ">
                <div class="deskripsi py-3">
                    <div class="text-center pb-2 font-bold">
                        <h5>BAHAN IVORY</h5>
                    </div>
                    <p class="sub-title">Ketebalan (gramasi)</p>
                    <p>350gr 300gr</p>

                    <p class="sub-title">Food grade </p>
                    <p> aman untuk jenis makanan</p>

                    <p class="sub-title">Warna</p>
                    <p>dapat cetak warna sisi luar dan dalam </p>

                    <p class="sub-title">Rekomendasi Penggunaan </p>
                    <p>Kemasan Makanan berminyak</p>
                    <p>Kemasan Kosmetik</p>
                    <p> Paperbag</p>
                </div>
            </div>
        </div>

    </div>
    <!-- END CONTENT 1 -->

    <!-- CONTENT 2 -->
    <div class="container">
        <div class="row flex justify-end ">
            <div class="col-6 relative">
                <div class="left-duplex absolute mt-20 -left-15">
                    <div class="deskripsi py-3">
                        <div class="text-center pb-2 font-bold">
                            <h5>BAHAN DUPLEX</h5>
                        </div>
                        <p class="sub-title"> Ketebalan (gramasi)</p>
                        <p>
                            310gr 350gr
                        </p>

                        <p class="sub-title"> kemasan sekunder</p>
                        <p>
                            menjadi kemasan yang tidak bersentuhan langsung dengan makanan
                        </p>
                        <p class="sub-title">Warna</p>
                        <p>
                            hanya dapat cetak sisi luar
                        </p>
                        <p class="sub-title">Rekomendasi Penggunaan</p>
                        <p>
                            Kemasan snack
                        </p>
                        <p>
                            Kemasan obat
                        </p>
                        <p>
                            kemasan pakaian atau kain
                        </p>
                    </div>
                </div>
                <div class="right-duplex ml-auto">
                    <img src="./asset/img/duplex.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT 2 -->

    <!-- CONTENT-LAMINASI -->
    <div class="container mx-auto py-[130px] ">
        <h5 class="text-[40px] font-medium pl-4 border-l-4 border-l-[#7D1D64]">Laminasi</h5>
        <div class="row justify-center pt-14">
            <div class="col-6 box">
                <div class="box glossy">
                    <div class="text">
                        <h2>LAMINASI GLOSSY</h2>
                    </div>
                </div>
            </div>
            <div class="col-6 box">
                <div class="box doff">
                    <div class="text">
                        <h2>LAMINASI DOFF</h2>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- END CONTENT LAMINASI -->

    <!-- CONTENT-MODEL -->
    <section>
        <div class="container mx-auto py-14">
            <h5 class="text-[40px] font-medium pl-4 border-l-4 border-l-[#7D1D64]">Model Kemasan</h5>
        </div>

        <div id="carouselExampleControls" class="carousel slide pb-5" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="image-model ">
                                <img src="./asset/img/bone.jpeg" loading='lazy' alt="">
                            </div>
                            <div class="content-model p-5">
                                <h6>Spesifikasi</h6>
                                <p> <strong>Model Sambung full body</strong> yang di mana
                                    bagian tutup depan menutup sama ke bawah. Menggunakan <strong>Bahan Ivory 350gr</strong> dengan
                                    <strong>Laminasi glossy dalam </strong> yang dapat menahan
                                    minyak dari makanan dan <strong>Laminasi doff luar </strong> yang
                                    memberikan warna menjadi lebih kuat serta
                                    penggunaan <strong>warna full</strong> pada semua sisi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="d-flex  align-items-center">
                            <div class="image-model ">
                                <img src="./asset/img/aikoya.jpeg" loading='lazy' alt="">
                            </div>
                            <div class="content-model p-5">
                                <h6>Spesifikasi</h6>
                                <p> <strong>Model Sambung non full body</strong> yang di mana
                                    bagian tutup depan tidak menutup sampai ke bawah. Menggunakan <strong>Bahan Ivory 300gr</strong>
                                    menggunakan <strong>Laminasi doff luar </strong> yang
                                    memberikan warna menjadi lebih kuat serta
                                    penggunaan <strong>warna full</strong> pada semua sisi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="image-model ">
                                <img src="./asset/img/amora.jpeg" loading='lazy' alt="">
                            </div>
                            <div class="content-model p-5">
                                <h6>Spesifikasi</h6>
                                <p> <strong>Model Sambung non full body</strong> yang di mana
                                    bagian tutup depan tidak menutup sampai ke bawah. Menggunakan <strong>Bahan Ivory 300gr</strong> dengan
                                    <strong>Laminasi glossy luar </strong> yang memberikan kilauan dari kemasan tersebut.
                                    menggunakan
                                    <strong>warna full</strong> pada semua sisi luar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <i class="fa-solid fa-circle-chevron-left mx-auto w-fit text-7xl" style="color: #A25E91;"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <i class="fa-solid fa-circle-chevron-right mx-auto w-fit text-7xl" style=" color: #A25E91;"></i>
            </button>
        </div>
    </section>
    <!-- END CONTENT MODEL -->
    </div>
    <hr>
    <!-- FOOTER -->
    <?php require_once './component/footer.php'; ?>

    <!-- END FOOTER -->




</body>

</html>