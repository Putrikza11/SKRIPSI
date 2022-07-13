<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');
?>
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
            <span class="text-7xl font-thin mb-5"> Hello,
                <h6 class="inline font-normal"> <?php echo $_SESSION['nama']; ?> </h6>
            </span>

            <!-- <div style="width: 90vh;">
                <p>Lorem ipsum dolor sit amet.
                </p>
            </div> -->

            <!-- TABLE -->
            <div class="table-responsive">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="daftar-pesanan m-0 fw-semibold">DAFTAR PESANAN</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pesanan</th>
                                        <!-- <th>Quantity</th> -->
                                        <th>Total Harga</th>
                                        <th>Uang muka</th>
                                        <th>Lunas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 15px;">

                                    <?php
                                    $no = 1;
                                    $id_user = $_SESSION['id_user'];


                                    $query = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN bahan ON transaksi.id_bahan = bahan.id WHERE id_user='$id_user' ");

                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['tanggal']; ?></td>
                                            <td>
                                                18x11x5
                                                <br>
                                                <?php echo $data['nama_bahan']; ?>
                                            </td>
                                            <!-- <td>
                                                <?php echo $data['quantity']; ?>
                                            </td> -->
                                            <td><?php echo "Rp. " . number_format($data['total_harga']); ?>
                                            </td>
                                            <td>
                                                <i class="fa-solid fa-check"></i>
                                            </td>
                                            <td> </td>
                                            <td>
                                                <button class="btn btn-outline-secondary btn-sm">
                                                    Upload Pembayaran
                                                </button>

                                                <!-- Button trigger modal -->
                                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Detail Transaksi
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                                                                            <thead>
                                                                                Tanggal : <?php echo $data['tanggal']; ?>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Ukuran</th>
                                                                                    <th>Bahan</th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Harga satuan</th>
                                                                                    <th>Uang muka</th>
                                                                                    <th>Total Harga</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody style="font-size: 15px;">
                                                                                <?php 
                                                                                $nomor=1;
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $nomor++; ?></td>
                                                                                    <td>
                                                                                        18x11x5
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['nama_bahan']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $data['quantity']; ?>
                                                                                    </td>
                                                                                    <td><?php echo "Rp. " . number_format($data['harga_satuan']); ?>
                                                                                    </td>
                                                                                    <td><?php echo "Rp. " . number_format($data['total_harga']); ?>
                                                                                    </td>
                                                                                    <td><?php echo "Rp. " . number_format($data['total_harga']); ?>

                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <button class="btn btn-secondary btn-sm">Detail transaksi</button> -->
                                            </td>

                                        </tr>
                                    <?php } ?>





                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- <table class="table mt-3 align-middle">
                    <thead class="table-secondary ">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Uang muka (DP)</th>
                            <th scope="col">Lunas</th>
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
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary mb-3" style="border-radius: 5px;">Upload Pembayaran</button> <br>
                            <td>
                                <button type="button" class="btn btn-outline-primary mb-3" style="border-radius: 5px;">Detail transaksi</button>
                            </td>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                Selesai

                            </td>



                        </tr>
                    </tbody>
                </table> -->
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