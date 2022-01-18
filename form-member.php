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
    <title>Formulir Member</title>
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
                    Formulir Member Laundry 
                </h4>
            </div>

            <div class="card-body">
                <?php 
                if (isset($_GET["id"])) {
                    include("connection.php");
                    $id_member = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";

                    $hasil = mysqli_query($connect, $sql);
                    $member = mysqli_fetch_array($hasil);
                ?>
                <form action="process-member.php" method="post">
                    ID Member 
                    <input type="text" name="id_member" 
                    class="form-control mb-2" required
                    value="<?=$member["id_member"];?>" readonly />

                    Nama Member 
                    <input type="text" name="nama" 
                    class="form-control mb-2" required
                    value="<?=$member["nama"];?>"/>

                    Alamat Member 
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required
                    value="<?=$member["alamat"];?>"/>

                    Jenis Kelamin  
                    <input type="text" name="jenis_kelamin" 
                    class="form-control mb-2" required
                    value="<?=$member["jenis_kelamin"];?>" readonly/>

                    Kontak Member 
                    <input type="text" name="tlp" 
                    class="form-control mb-2" required
                    value="<?=$member["tlp"];?>"/>

                    <button type="submit" class="btn btn-info btn-block"
                    name="edit_member">
                        Simpan Data 
                    </button>
                </form>
                <?php 
                } else{
                    ?>
                    <form action="process-member.php" method="post">
                    ID Member 
                    <input type="number" name="id_member" 
                    class="form-control mb-2" required>

                    Nama Member
                    <input type="text" name="nama" 
                    class="form-control mb-2" required>

                    Alamat Member 
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required>

                    Jenis Kelamin
                    <select name="jenis_kelamin" class="form-control mb-2">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    Nomor Telepon
                    <input type="number" name="tlp" 
                    class="form-control mb-2" required>

                    <button type="submit" class="btn btn-info btn-block"
                    name="simpan_member">
                        Simpan Data 
                    </button>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>