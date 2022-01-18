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
    <title>List User Laundry</title>
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
                    Data User Laundry
                </h4>
            </div>
            <div class="card-body">
                <ul class="list=group">
                <form action="list-user.php" method="get">
                    <input type="text" name="search" 
                    class="form-control mb-2" 
                    placeholder="Search">
                </form>
                <ul class="list-group">
                    <?php 
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from user
                        where id_user like '%$search%' or
                        nama like '%$search%' or 
                        username like '%$search%' or role like '%$search%'";
                    } else{
                        $sql = "select * from user";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while ($user = mysqli_fetch_array($hasil)) {
                    ?>

                    <li class="list-group=item">
                        <div class="row">
                            <div class="col-lg-8 col-md-10">
                                <h6>ID User     : <?php echo $user["id_user"];?></h6>
                                <h6>Nama        : <?php echo $user["nama"];?></h6>
                                <h6>Username    : <?php echo $user["username"];?></h6>
                                <h6>Role        : <?php echo $user["role"];?></h6>
                            </div>
                            <div class="col-lg-4 col-md-2">
                                <a href="form-user.php?id_user=<?=$user["id_user"]?>">
                                    <button class="btn btn-info btn-block mb-2">
                                        Edit Data 
                                    </button>
                                </a>

                                <a href="delete-user.php?id_user=<?=$user["id_user"]?>"
                                onclick="return confirm('Apakah anda yakin?')">
                                    <button class="btn btn-danger btn-block mb-2">
                                        Hapus Data 
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    }    
                    ?>
                </ul>
                </ul>
            </div>
            <div class="card-footer">
                <a href="form-user.php">
                    <button class="btn btn-info">
                        Tambah Data User 
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>