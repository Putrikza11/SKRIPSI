<?php
include("./conn/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './component/head.php'; ?>

    <title>Edit Akun</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php require_once './component/navbar.php'; ?>

    <!-- END NAVBAR -->

    <div class="container-fluid pt-20" id="akun">
        <!-- FORM BOX-->
        <div class="row">
            <div class="d-block mx-auto w-fit">
                <div class="form-title mb-5">
                    <h2 class="font-medium">DETAIL AKUN</h2>
                    <p>Kamu dapat mengubah profile mu dengan data terbaru kamu.</p>
                </div>
                <?php
                $sesi = $_SESSION['id_user'];
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE id='$sesi' ");
                $data = mysqli_fetch_array($sql);
                ?>
                <!-- FORM INPUT -->
                <form class="row" method="" action="">
                    <div class="col-md-6">
                        <label for="Inputname" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-lg" name="Inputname" id="Inputname" value="<?php echo $data['nama']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="InputTlp" class="form-label">No Handphone</label>
                        <input type="text" class="form-control form-control-lg" name="InputTlp" id="InputTlp" value="<?php echo $data['nohp']; ?>">
                    </div>
                    <div class="col-12 pt-4">
                        <label for="InputUsername" class="form-label">Username atau Email</label>
                        <input type="text" class="form-control form-control-lg" name="InputUsername" id="InputUsername" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="col-12 pt-4">
                        <label for="InputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control form-control-lg" name="InputAlamat" id="InputAlamat" value="<?php echo $data['alamat']; ?>">
                    </div>
                    <div class="col-12 pt-4">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" name="InputPassword" id="inputPassword" value="<?php echo $data['password']; ?>">
                    </div>
                    <div class="d-grid gap-2 py-10">
                        <button class="btn btn-lg btn-custom text-white" style="background-color: #9D4689;" type="submit" name="submit">SIMPAN</button>
                    </div>
                </form>
                <!-- FORM END -->

            </div>
        </div>

    </div>

    <!-- FOOTER -->
    <?php require_once './component/footer.php'; ?>
    <!-- END FOOTER -->
</body>

</html>