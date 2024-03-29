<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');

if (isset($_POST['uploadFoto'])) {
  var_dump($_POST['uploadFoto']);
  die();
}
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
                    <th>Total Harga</th>
                    <th>Uang muka</th>
                    <th>Lunas</th>
                    <th></th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody style="font-size: 15px;">

                  <?php
                  $no = 1;
                  $id_user = $_SESSION['id_user'];


                  $query = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN
                                                bahan ON transaksi.id_bahan=bahan.id
                                                WHERE id_user='$id_user' ");
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td style="width: 100pc;">
                      <?= $data['ukuran_panjang'] . " x " . $data['ukuran_lebar'] . " x " . $data['ukuran_tinggi'] ?>
                      <br>
                      <?php echo $data['nama_bahan']; ?>
                    </td>
                    <td style="width: 20rem;"><?php echo "Rp. " . number_format($data['total_harga']); ?>
                    </td>
                    <td>
                      <?php if ($data['dp']) : ?>
                      <i class="fa-solid fa-check text-success"></i>
                      <?php else : ?>
                      <i class="fa-solid fa-minus"></i>
                      <?php endif; ?>

                    </td>
                    <td>
                      <?php if ($data['lunas']) : ?>
                      <i class="fa-solid fa-check text-success"></i>
                      <?php else : ?>
                      <i class="fa-solid fa-minus"></i>
                      <?php endif; ?>
                    </td>
                    <td class="!w-1/12">
                      <form action="./order/uploadBukti.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">
                        <input type="file" name="foto" class="custom-file-input w-fit" id="input-foto"
                          aria-describedby="input-foto" accept="image/*">
                        <button class="btn btn-outline-secondary btn-sm mt-2" type="submit" name="uploadFoto">
                          Upload Pembayaran
                        </button>
                      </form>

                    <td>
                      <button class="btn btn-secondary btn-sm h-12" data-bs-toggle="modal"
                        data-bs-target="#modal-<?= $data['id_transaksi'] ?>">
                        Detail Transaksi
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="modal-<?= $data['id_transaksi'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail transaksi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered align-middle" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                      <p class="mb-2">Tanggal : <?php echo $data['tanggal']; ?></p>
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
                                        $nomor = 1;
                                        // $dp=$data['total_harga']/2; 
                                        ?>
                                      <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td>
                                          <?= $data['ukuran_panjang'] . " x " . $data['ukuran_lebar'] . " x " . $data['ukuran_tinggi'] ?>
                                        </td>
                                        <td>
                                          <?= $data['nama_bahan']; ?>
                                        </td>
                                        <td>
                                          <?php echo $data['quantity']; ?>
                                        </td>
                                        <td><?php echo "Rp. " . number_format($data['harga_satuan']); ?>
                                        </td>
                                        <td><?php echo "Rp. " . number_format($data['total_harga'] / 2); ?>
                                        </td>
                                        <td><?php echo "Rp. " . number_format($data['total_harga']); ?>

                                      </tr>

                                    </tbody>

                                  </table>

                                  <p class="mt-10 !text-sm"><strong>Note:</strong> Pembayaran ke BCA 6030742166 A/N
                                    Aldy
                                    Akbar
                                  </p>


                                </div>

                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <?php
                      $transaksi = mysqli_query($conn, "SELECT lunas FROM transaksi WHERE id_transaksi=$data[id_transaksi]");

                      $trans = mysqli_fetch_assoc($transaksi);

                      $_SESSION['lunas'] = $trans['lunas'];

                      if ($_SESSION['lunas']) : ?>
                    <td>
                      <button class="btn btn-outline-secondary btn-sm h-12" data-bs-toggle="modal"
                        data-bs-target="#nota-<?= $data['id_transaksi'] ?>">
                        Nota
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="nota-<?= $data['id_transaksi'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Nota</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="card-body">
                                <div class="w-36 h-32">
                                  <img src="./asset/img/logo-ungu.png" alt="">
                                  <p class="w-48">Jl.Raya Kebayoran Lama No.17</p>
                                </div>

                                <div>
                                  <strong class="ms-100%"> <?php echo $data['tanggal']; ?></strong> <br>
                                  <span class="badge bg-success mb-3">Lunas</span>
                                </div>


                                <div class="table-responsive">
                                  <table class="table table-bordered align-middle" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>

                                      <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Quantity</th>
                                        <th>Harga satuan</th>
                                        <th>Total Harga</th>
                                      </tr>
                                    </thead>
                                    <tbody style="font-size: 15px;">
                                      <?php
                                          $nomor = 1;
                                          $nota = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN
                      warna ON transaksi.id_warna = warna.id INNER JOIN
                      laminasi ON transaksi.id_laminasi = laminasi.id INNER JOIN
                      bahan ON transaksi.id_bahan=bahan.id
                      WHERE id_user='$id_user' ");
                                          $data_nota = mysqli_fetch_array($nota)
                                          ?>
                                      <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td>Box
                                          <?= $data_nota['ukuran_panjang'] . " x " . $data_nota['ukuran_lebar'] . " x " . $data_nota['ukuran_tinggi'] ?>
                                          <br> <?= $data_nota['nama_bahan']; ?>
                                          <br>
                                          <?= $data_nota['jenis_warna']; ?>
                                          <br>
                                          <?= $data_nota['jenis_laminasi']; ?>
                                        </td>
                                        <td>
                                          <?php echo $data_nota['quantity']; ?>
                                        </td>
                                        <td><?php echo "Rp. " . number_format($data_nota['harga_satuan']); ?>
                                        </td>
                                        <td><?php echo "Rp. " . number_format($data_nota['total_harga']); ?>

                                      </tr>

                                    </tbody>
                                  </table>
                                  <div class="d-block ml-auto w-40 h-32 pt-3">
                                    <img src="./asset/img/ttd.jpg" alt="">
                                    <span style="padding: 10px 0 0 50px ;">Syahrani</span>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class=" modal-footer">
                              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <?php endif; ?>
                    </td>

                  </tr>
                  <?php } ?>





                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- END TABLE -->
    </div>
    <hr>
    <!-- FOOTER -->
    <?php require_once './component/footer.php'; ?>

    <script>
    <?php
      if (isset($_GET['status'])) :
      ?>
    Swal.fire({
      icon: <?= $_GET['status'] ?>,
      title: <?= $_GET['message'] ?>,
    })
    <?php endif ?>
    </script>
    <!-- END FOOTER -->
  </div>
  <!-- END CONTENT -->
</body>

</html>