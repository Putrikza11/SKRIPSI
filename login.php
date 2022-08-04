<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/conn/koneksi.php');


require_once './conn/validasi.php';


if (isset($_POST["login"]) || isset($_POST["Username"])) {
  // ngambil data dari form input trs dimasukin ke variabel
  $username = $_POST["Username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' ");
 
  // cek username
  if (mysqli_num_rows($result) >= 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    
       
    if (password_verify($password, $row["password"])) {
      //buat session untuk cek apakah sudah login atau belum dengan nama "login"
      //buat query untuk ngambil data
      if ($row > 0) {
        $_SESSION["login"] = true;
        //buat session untuk nyimpan data
        $_SESSION['id_user'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['nohp'] = $row['nohp'];
     
        header("Location: pesanan.php");
      } else {
        echo "<script>alert('Gagal Login, coba kembali');document.location='login.php'</script>";
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <?php require_once './component/head.php'; ?>

  <title>login</title>

</head>

<body>

  <!-- NAVBAR -->
  <?php require_once './component/navbar.php';  ?>
  <!-- END NAVBAR -->
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center inner-row">
      <div class="col-md-5">
        <div class="form-box p-5">
          <div class="form-title">
            <h2 class="text-center text-4xl pb-7">Log in</h2>
          </div>
          <!-- FORM INPUT -->
          <form method="POST">
            <div class="mb-3">
              <label for="Username" class="form-label">Username atau Email</label>
              <input type="text" class="form-control form-control-lg" id="Username" name="Username"
                aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg" id="password" name="password">
            </div>

            <div class="mb-3">
              <span>Belum punya akun?</span> <button class="p-0 border-0 bg-transparent primarycolor"><a
                  href="registrasi.php">Daftar disini</a></button>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-custom text-white" style="background-color: #9D4689;" type="submit"
                name="login">LOGIN</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>