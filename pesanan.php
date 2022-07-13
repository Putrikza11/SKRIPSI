<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './component/head.php'; ?>
    <title>Pesanan</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php require_once './component/navbar.php';
    ?>
    <!-- END NAVBAR -->

    <!-- CONTENT -->
    <div class="container-fluid" id="pesanan">
        <div class="row row-content ">
            <h6>Hello!
                <?php echo $_SESSION['nama']; ?>
            </h6>
            <!-- <div style="width: 90vh;">
                <p>Lorem ipsum dolor sit amet.
                </p>
            </div> -->
            <h5 class="daftar-pesanan mt-3 fw-semibold">DAFTAR PESANAN</h5>
            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-striped mt-3 ">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary"
                                    style="border-radius: 20px;">Upload Bukti Pembayaran</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- END TABLE -->
        </div>
        <hr>
        <!-- FOOTER -->
        <?php require_once './component/footer.php'; ?>

        <!-- END FOOTER -->
    </div>
    <!-- END CONTENT -->
</body>

</html>