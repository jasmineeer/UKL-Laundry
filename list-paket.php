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
    <title>List Paket Laundry</title>
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
                <h4 class="text-white">
                    Data Paket Laundry 
                </h4>
            </div>

            <div class="card-body">
                <ul class="list=group">
                    <form action="list-paket.php" method="get">
                        <input type="text" name="search" 
                        class="form-control mb-2" 
                        placeholder="Search">
                    </form>
                </ul>
                <ul class="list-group">
                    <?php 
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from paket where id_paket like '%$id_paket%'
                        or jenis like '%$jenis%' or harga like '%$harga%'";
                    } else{
                        $sql = "select * from paket";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while ($paket = mysqli_fetch_array($hasil)) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-8">
                                <h6>ID Paket : <?=($paket["id_paket"])?></h6>
                                <h6>Jenis Paket : <?=($paket["jenis"])?></h6>
                                <h6>Harga Paket : <?=($paket["harga"])?></h6>
                            </div>
                            <div class="col-lg-4">
                                <a href="delete-paket.php?id_paket=<?=$paket["id_paket"]?>"
                                onclick="return confirm('Apakah anda yakin?')">
                                    <button class="btn btn-danger btn-block">
                                        Hapus data 
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-paket.php">
                    <button class="btn btn-info">
                        + Form Paket 
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>