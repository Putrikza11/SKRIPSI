<?php

session_start();



?>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../asset/image/logo-putih.png" alt="kahta" width="100" height="30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?> " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/material.php' ? 'active' : '' ?> " href="material.php">Material Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $_SERVER['REQUEST_URI'] == '/order.php' ? 'active' : '' ?>" href="order.php">Custom Order</a>
                </li>
                <?php
                if (isset($_SESSION['login'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pesanan.php">Pesanan</a></li>
                            <li><a class="dropdown-item" href="/EditAkun.php">Detail Akun</a></li>

                        </ul>
                    </li>
                <?php } ?>
            </ul>

            <?php
            if (isset($_SESSION['login'])) { ?>
                <a class="btn text-[#A25E91] bg-white" href="/conn/logout.php">Logout</a>

            <?php } else { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="d-flex">
                            <a class="nav-link me-3" href="login.php">Login</a>
                            <a class="nav-link me-3 btn hover:text-fuchsia-900 text-[#A25E91] bg-white " href="registrasi.php">Registrasi</a>

                        </form>
                    </li>
                </ul>
            <?php }
            ?>
        </div>
    </div>
</nav>