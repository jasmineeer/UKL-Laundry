<?php
session_start();
# jika saat load halaman ini, pastikan telah login
# sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang Laundry</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md bg-info navbar-dark mb-2">
            <!-- Brand -->
            <a class="navbar-brand" href="list-paketlaundry.php">Laundry</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="list-user.php">Data User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-member.php">Data Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-paket.php">Data Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-transaksi.php">Data Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    <div class="container">
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="text-white text-center">
                    Data Barang Laundry 
                </h4>
            </div>

            <div class="card-body">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <img src="image/kiloan.jpg" alt="Laundry Kiloan"
                            width="200" height="150"/>
                        </div>

                        <div class="col-lg-8 col-md-10">
                            <h4 class="text-black">
                                Laundry Kiloan 
                            </h4>
                            <h6 class="text-black">
                                Rp 5.000,- / kg
                            </h6>
                            <h6 class="text-black">
                                (Full cuci-kering-setrika)
                            </h6>
                        </div>


                        <div class="col-lg-4 col-md-6 mb-3">
                            <img src="image/kaos.jfif" alt="Laundry Kaos"
                            width="200" height="150"/>
                        </div>

                        <div class="col-lg-8 col-md-10">
                            <h4 class="text-black">
                                Laundry Kaos 
                            </h4>
                            <h6 class="text-black">
                                Rp 3.500,- / kg
                            </h6>
                            <h6 class="text-black">
                                (Full cuci-kering-setrika)
                            </h6>
                        </div>


                        <div class="col-lg-4 col-md-6 mb-3">
                            <img src="image/selimut.jpg" alt="Laundry Selimut"
                            width="200" height="150"/>
                        </div>

                        <div class="col-lg-8 col-md-10">
                            <h4 class="text-black">
                                Laundry Selimut 
                            </h4>
                            <h6 class="text-black">
                                Rp 7.000,- / kg 
                            </h6>
                            <h6 class="text-black">
                                (Full cuci-kering-setrika)
                            </h6>
                        </div>


                        <div class="col-lg-4 col-md-6 mb-3">
                            <img src="image/bedcover.jpg" alt="Laundry Bedcover"
                            width="200" height="150"/>
                        </div>

                        <div class="col-lg-8 col-md-10">
                            <h4 class="text-black">
                                Laundry Bed Cover 
                            </h4>
                            <h6 class="text-black">
                                Rp 8.000,- / kg 
                            </h6>
                            <h6 class="text-black">
                                (Full cuci-kering-setrika)
                            </h6>
                        </div>
                    </div>
                </li>
            </div>
            <div class="card-footer">
                <a href="form-transaksi.php">
                    <button class="btn btn-info">
                        + Form Laundry Baju 
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>