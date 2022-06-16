<!doctype html>
<html lang="en">

<head>
  <?php require_once './component/head.php'; ?>

  <title>login</title>

</head>

<body>

  <div class="container-fluid">
    <div class="row justify-content-center align-items-center inner-row">
      <div class="col-md-5">
        <div class="form-box p-5">
          <div class="form-title">
            <h2 class="text-center">Log in</h2>
          </div>
          <!-- FORM INPUT -->
          <form action="">
            <div class="mb-3">
              <label for="Email" class="form-label">Username atau Email</label>
              <input type="email" class="form-control form-control-lg" id="InputEmail" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              <label for="Password" class="form-label">Password</label>
              <input type="password" class="form-control form-control-lg" id="InputPassword">
            </div>

            <div class="mb-3">
              <span>Belum punya akun?</span> <button class="p-0 border-0 bg-transparent primarycolor">Daftar di sini</button>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-custom text-white" style="background-color: #9D4689;" type="button">LOGIN</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>