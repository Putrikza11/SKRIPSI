<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Pesanan</title>
</head>
<body>
     <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " >
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./asset/image/logo-putih.png" alt="kahta" width="auto" height="30px" >
            </a>
           
       <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="material.html">Material Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="order.html">Custom Order</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun Saya
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="pesanan.html">Pesanan Saya</a></li>
                        <li><a class="dropdown-item" href="EditAkun.html">Detail Akun</a></li>
                    </ul>
                </li>
            </ul>
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                      <form class="d-flex">
                        <button class="btn btn-light" style="color: #A25E91;" type="submit">Logout</button>
                        </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- CONTENT -->
    <div class="container-fluid" id="pesanan">
        <div class="row row-content ">
           <h6>Hello! username </h6>
            <div style="width: 90vh;">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quos quibusdam animi earum 
                temporibus molestiae perspiciatis. Consequuntur alias obcaecati explicabo consequatur, reprehenderit, 
                rerum placeat distinctio aspernatur minima quibusdam ea porro.
                </p>
            </div>
             <h5 class="daftar-pesanan">DAFTAR PESANAN</h5>
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
                        <button type="button" class="btn btn-outline-primary" style="border-radius: 20px;">Upload Bukti Pembayaran</button>
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>