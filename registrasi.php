<?php
$conn = mysqli_connect("localhost", "root", "", "db_company");
if (isset($_POST["submit"])) {
  // ngambil data dari tiap input dan masukin ke variabel
  $nama = $_POST["Inputname"];
  $username = $_POST["InputUsername"];
  $password = $_POST["InputPassword"];
  $alamat = $_POST["InputAlamat"];
  $nohp = $_POST["InputTlp"];

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // query insert data
  $query = ("INSERT INTO user (nama,username,password,alamat,nohp) 
  VALUES ('$nama','$username','$password','$alamat','$nohp')
  ");
  mysqli_query($conn, $query);

   $last_id = $conn->insert_id;
   
  $_SESSION['id_user'] = $last_id;
  $_SESSION['nama'] = $nama;
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['alamat'] =$alamat;
  $_SESSION['nohp'] = $nohp; 
  $_SESSION['login'] = true;

  header("Location:login.php?status='success'&message='Berhasil Registrasi'");
  }
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once './component/head.php'; ?>

  <title>Registrasi</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <img src="./asset/img/Mobile login-amico.png" alt="image" width="800" loading='lazy'>
      </div>
      <!-- FORM BOX -->
      <div class="col p-5">
        <div class="form-box p-5">
          <div class="row">
            <div class="col text-end">
              <a href="index.php"><i class="fa-solid fa-circle-xmark fa-2x"></i></a>
            </div>
          </div>
          <div class="form-title">

            <div class="row">
              <div class="col">
                <h2 class="title text-center text-4xl pb-7	">REGISTRASI</h2>
              </div>
            </div>
          </div>

          <!-- FORM INPUT -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-6">
              <label for="Inputname" class="form-label">Nama</label>
              <input type="text" class="form-control form-control-lg" name="Inputname" id="Inputname" required>
            </div>
            <div class="col-md-6">
              <label for="InputTlp" class="form-label">No Handphone</label>
              <input type="text" class="form-control form-control-lg" name="InputTlp" id="InputTlp" required>
            </div>
            <div class="col-12">
              <label for="InputUsername" class="form-label">Username atau Email</label>
              <input type="text" class="form-control form-control-lg" name="InputUsername" id="InputUsername" required>
            </div>
            <div class="col-12">
              <label for="InputAlamat" class="form-label">Alamat</label>
              <input type="text" class="form-control form-control-lg" name="InputAlamat" id="InputAlamat" required>
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg" name="InputPassword" id="inputPassword"
                required>
            </div>
            <div class="mb-3">
              <span>Sudah punya akun?</span> <a href="login.php"
                class="p-0 border-0 bg-transparent primarycolor">Login</a>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-custom text-white" style="background-color: #9D4689;" type="submit"
                name="submit">DAFTAR</button>
            </div>
          </form>
          <!-- FORM END -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>