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
        <img src="./asset/image/Mobile login-amico.png" alt="image" width="800" loading='lazy'>
      </div>
      <!-- FORM BOX -->
      <div class="col p-5">
        <div class="form-box p-5">
          <div class="form-title">
            <h2 class="title text-center">REGISTRASI</h2>
          </div>
          <!-- FORM INPUT -->
          <form class="row g-3">
            <div class="col-md-6">
              <label for="Inputname" class="form-label">Nama</label>
              <input type="text" class="form-control form-control-lg" id="inputEmail4">
            </div>
            <div class="col-md-6">
              <label for="InputTlp" class="form-label">No Handphone</label>
              <input type="text" class="form-control form-control-lg" id="inputEmail4">
            </div>
            <div class="col-12">
              <label for="InputUsername" class="form-label">Username atau Email</label>
              <input type="text" class="form-control form-control-lg" id="inputAddress">
            </div>
            <div class="col-12">
              <label for="InputAlamat" class="form-label">Alamat</label>
              <input type="text" class="form-control form-control-lg" id="inputAddress2">
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg" id="inputPassword4">
            </div>
            <div class="mb-3">
              <span>Sudah punya akun?</span> <button class="p-0 border-0 bg-transparent primarycolor">Login</button>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-custom text-white" style="background-color: #9D4689;" type="button">DAFTAR</button>
            </div>
          </form>
          <!-- FORM END -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>