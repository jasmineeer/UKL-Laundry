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
    <title>Formulir Paket Laundry</title>
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
            <div class="card-header bg-info mb-2">
                <h4 class="text-white">
                    Form Paket Laundry 
                </h4>
            </div>

            <div class="alert alert-danger mx-2">
                Form hanya bisa diisi satu kali, tidak bisa diedit!
            </div>

            <div class="card-body">
                <form action="process-paket.php" method="post">
                    ID Paket 
                    <input type="number" name="id_paket"
                    class="form-control mb-2" required>

                    Jenis Paket 
                    <select name="jenis" class="form-control mb-2" required>
                        <option value="kiloan">Kiloan (Rp 5.000,- /kg)</option>
                        <option value="selimut">Selimut (Rp 7.000,- /kg)</option>
                        <option value="bed_cover">Bedcover (Rp 8.000,- /kg)</option>
                        <option value="kaos">Kaos (Rp 3.500,- /kg)</option>
                    </select>

                    Harga Paket 
                    <input type="number" name="harga"
                    class="form-control mb-2" required>

                    <button type="submit" class="btn btn-info btn-block">
                        Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>