<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <?php require_once './component/head.php'; ?>


    <title>Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php require_once './component/navbar.php'; ?>
    <!-- END NAVBAR -->

    <main class="mt-16">

        <!-- JUMBOTRON banner-->
        <div class="image-wrapper relative banner overflow-hidden	">
            <img src="./asset/img/alfabel.jpeg" alt="usni_image_hero" class="w-full  object-cover object-bottom h-100 " loading='lazy'>

            <div class=" bg-gradient-custom bg-gradient-to-r from-white opacity-90"></div>

            <div class="bg-gradient-custom  search-bar-wrapper  h-full w-full flex flex-wrap flex-col justify-center p-0">
                <div class="col-md-6 my-auto container tagline">
                    <h1 class="fw-semibold !leading-normal !text-slate-800">BUAT PRODUKMU TERLIHAT EKSLUSIF</h1>
                    <p class="fw-medium">
                        Customize produkmu dengan Bahan, Ukuran, dan Desain yang
                        kamu mau untuk meningkatkan citra produkmu dan menjadi jalan
                        pintas untuk Branding.
                    </p>
                    <a href="registrasi.html" class="btn text-white bg-gradient-to-tr from-[#A25E91] to-[#D26ECF]" role="button" data-bs-toggle="button">DAFTAR SEKARANG</a>
                </div>
            </div>
        </div>

        <!-- END JUMBOTRON -->

        <!-- ABOUT US -->
        <div class="container-fluid-about bg-white mx-[100px]">
            <div class="row features w-fit mx-auto py-[130px]">
                <div class="col-md-4 my-auto">
                    <h4>ABOUT US</h4>
                </div>
                <div class="col-md-8">
                    <P>"<strong>Kahtapack</strong>
                        berdiri pada tahun 2017 dengan produk
                        custom pertama yaitu blabla dan kemudian
                        berkembang memberikan layanan jasa cetak untuk
                        kemasan custom berbahan kertas. Produk dengan
                        berbahan kertas menjadi bahan utama kami."
                    </P>
                </div>
            </div>
        </div>
        <!-- END ABOUT -->

        <!-- OUR SERVICE -->
        <div class="container">
            <div class="row text-center mt-5">
                <div class="title-service">
                    <h4>OUR SERVICE</h4>
                </div>
                <div class="content-service">
                    <p>Kami menyediakan apa yang kamu butuhkan</p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="card-group">
                    <div class="col-md-3">
                        <div class="card shadow !rounded-none border-2 border-t-[#7D1D64] h-full p-3 ">
                            <img src="./asset/image/bahan.png" class="card-img-top w-20 object-fit-cover block mx-auto" alt="..." loading='lazy'>
                            <h5 class="title-card text-center">Bahan utama</h5>
                            <div class="card-body">
                                <p class="card-text text-center">
                                    Bahan utama yang digunakan terdiri dari 3 bahan yaitu Bahan
                                    Ivory, Bahan Duplex, dan Bahan
                                    Kraft. kamu dapat menyesuaikan
                                    bahan yang kamu inginkan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow !rounded-none border-2 border-t-[#7D1D64] h-full p-3 ">
                            <img src="./asset/image/laminasi.png" class="card-img-top w-20 object-fit-cover block mx-auto" alt="..." loading='lazy'>
                            <h5 class="title-card text-center">Laminasi</h5>
                            <div class="card-body">
                                <p class="card-text text-center">Membuat tampilan kertas
                                    menjadi lebih menarik dengan
                                    menggunakan laminasi glossy
                                    dan laminasi doff di sisi luar
                                    maupun dalam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow !rounded-none border-2 border-t-[#7D1D64] h-full p-3 ">
                            <img src="./asset/image/model.png" class="card-img-top w-20 object-fit-cover block mx-auto" alt="..." loading='lazy'>
                            <h5 class="title-card text-center">Model Kemasan</h5>
                            <div class="card-body">
                                <p class="card-text text-center">Berbagai bentuk yang kamu ingin
                                    dan sesuaikan dengan kebutuhan
                                    mulai dari Model sambung
                                    ataupun Model terpisah antara
                                    penutup dan wadah.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow !rounded-none border-2 border-t-[#7D1D64] h-full p-3 ">
                            <img src="./asset/image/gambar.png" class="card-img-top w-20 object-fit-cover block mx-auto" alt="..." loading='lazy'>
                            <h5 class="title-card text-center">Contoh Produk</h5>
                            <div class="card-body">
                                <p class="card-text text-center">Beberapa contoh produk yang di custom
                                    oleh customer dengan spesifikasi yang bisa kamu jadikan
                                    inspirasi dan modifikasi kembali sesuai kebutuhanmu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center link-service">
                <a href="">
                    <h5>View More <i class="bi bi-chevron-compact-right"></i></h5>

                </a>
            </div>
        </div>
        <!-- END SERVICE -->

        <!-- ORDER -->

        <!-- component -->
        <div class="my-40 px-5">
            <div class="mx-4 p-4">
                <div class="flex items-center">
                    <div class="flex items-center text-fuchsia-700 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-20 w-20 py-3 border-2 border-fuchsia-700">
                            <i class="fa-solid fa-file-lines block mx-auto w-fit text-4xl"></i>
                        </div>
                        <div class="absolute top-0 -ml-6 text-center mt-[5.5rem] w-32 text-sm font-medium uppercase text-fuchsia-700">1. Mengisi form sesuai pesanan</div>
                    </div>

                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-fuchsia-700"></div>

                    <div class="flex items-center text-fuchsia-700 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-20 w-20 py-3 border-2  border-fuchsia-700">
                            <i class="fa-solid fa-headset block mx-auto w-fit text-4xl"></i>
                        </div>
                        <div class="absolute top-0 -ml-6 text-center mt-[5.5rem] w-32 text-sm font-medium uppercase text-fuchsia-700">2. Konsultasi Desain</div>
                    </div>

                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-fuchsia-700"></div>

                    <div class="flex items-center text-fuchsia-700 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-20 w-20 py-3 border-2 border-fuchsia-700">
                            <i class="fa-solid fa-money-bill-transfer  block mx-auto w-fit text-4xl"></i>
                        </div>
                        <div class="absolute top-0 -ml-6 text-center mt-[5.5rem] w-32 text-sm font-medium uppercase text-fuchsia-700">3. Pembayaran Uang Muka</div>
                    </div>

                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-fuchsia-700"></div>

                    <div class="flex items-center text-fuchsia-700 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-20 w-20 py-3 border-2 border-fuchsia-700">
                            <i class="fa-solid fa-pen-ruler block mx-auto w-fit text-4xl"></i>
                        </div>
                        <div class="absolute top-0 -ml-6 text-center mt-[5.5rem] w-32 text-sm font-medium uppercase text-fuchsia-700">4. Proses Produksi</div>
                    </div>

                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-fuchsia-700"></div>
                    <div class="flex items-center text-fuchsia-700 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-20 w-20 py-3 border-2 border-fuchsia-700">
                            <i class="fa-solid fa-truck-fast block mx-auto w-fit text-4xl"></i>
                        </div>
                        <div class="absolute top-0 -ml-6 text-center mt-[5.5rem] w-32 text-sm font-medium uppercase text-fuchsia-700">5.Produk siap dikirim</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- END ORDER -->
        <!-- CTA -->
        <div class="container pb-5">
            <div class="row CTA mt-5 text-center">
                <h5 class="content-CTA px-5">Siap untuk mewujudkan kemasan yang sesuai
                    dengan keinginan dan kebutuhan kamu? </h5>

                <div class="col text-center">
                    <a href="">
                        <button class="btn btn-CTA btn-light fs-4 border border-2 bg-white
                         border-secondary text-slate-800" style="border-radius: 20px; font-weight: bold;" type="submit">Cek Harga</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- END CTA -->
        <hr>
    </main>

    <!-- FOOTER -->

    <?php require_once './component/footer.php'; ?>


    <!-- END FOOTER -->


</body>

</html>