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
    <title>Form Transaksi Laundry</title>
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
                <div class="card-header bg-success mb-2">
                    <h4 class="text-white">
                        Form Transaksi Laundry 
                    </h4>
                </div>

                <div class="alert alert-danger mx-2">
                Form hanya bisa diisi satu kali, tidak bisa diedit!
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_GET["id_transaksi"])) {
                        include "connection.php";

                        $id_transaksi = $_GET["id_transaksi"];
                        $sql = "select * from transaksi where id_transaksi='$id_transaksi'";
                        $hasil = mysqli_query($connect, $sql);
                        $transaksi = mysqli_fetch_array($hasil);
                    ?>

                <form action="process-kembali.php" method="post">

                        ID Transaksi
                        <input type="number" name="id_transaksi"
                        class="form-control mb-2" readonly
                        value="<?=($transaksi["id_transaksi"])?>">

                        ID Member 
                        <select name="id_member"
                        class="form-control mb-2" readonly
                        value="<?=($transaksi["id_member"])?>">
                        <?php 
                        include "connection.php";
                        $sql = "select * from member";
                        $hasil = mysqli_query($connect, $sql);
                        while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($member["id_member"])?>">
                                <?=($member["id_member"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        <?php 
                        date_default_timezone_set('Asia/Jakarta');
                        ?>

                        Tanggal Laundry 
                        <input type="date" name="tgl"
                        class="form-control mb-2" readonly
                        value="<?=($transaksi["tgl"])?>">

                        Batas Waktu Laundry 
                        <input type="date" name="batas_waktu"
                        class="form-control mb-2" readonly 
                        value="<?=($transaksi["batas_waktu"])?>">

                        Tanggal Bayar
                        <input type="date" name="tgl_bayar"
                        class="form-control mb-2" required
                        value="<?=($transaksi["tgl_bayar"])?>">

                        Status Paket 
                        <select name="status" class="form-control mb-2"
                        required
                        value="<?=($transaksi["status"])?>">
                            <option value="baru">Baru Masuk</option>
                            <option value="proses">Proses Laundry</option>
                            <option value="selesai">Selesai Laundry</option>
                            <option value="diambil">Sudah Diambil</option>    
                        </select>

                        Pembayaran Laundry 
                        <select name="dibayar" class="form-control mb-2"
                        required
                        value="<?=($transaksi["dibayar"])?>">
                            <option value="dibayar">Lunas</option>
                            <option value="belum_dibayar">Belum Lunas</option>
                        </select>

                        ID User 
                        <select name="id_user"
                        class="form-control mb-2" readonly 
                        value="<?=($transaksi["id_user"])?>">
                        <?php 
                        include "connection.php";
                        $sql = "select * from user";
                        $hasil = mysqli_query($connect, $sql);
                        while ($user = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($user["id_user"])?>">
                                <?=($user["id_user"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        ID Paket  
                        <select name="id_paket"
                        class="form-control mb-2" readonly 
                        value="<?=($transaksi["id_paket"])?>">
                        <?php 
                        include "connection.php";
                        $sql = "select * from paket";
                        $hasil = mysqli_query($connect, $sql);
                        while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($paket["id_paket"])?>">
                                <?=($paket["id_paket"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        Jumlah Laundry (kg) 
                        <input type="number" name="qty"
                        class="form-control mb-2" readonly>

                    <button type="submit" class="btn btn-success btn-block"
                    name="update_transaksi">
                        Simpan Data 
                    </button>
                </form>
                <?php 
                } else{
                ?>
                    <form action="process-transaksi.php" method="post">
                        ID Transaksi
                        <input type="number" name="id_transaksi"
                        class="form-control mb-2" required>

                        ID Member 
                        <select name="id_member"
                        class="form-control mb-2" required>
                        <?php 
                        include "connection.php";
                        $sql = "select * from member";
                        $hasil = mysqli_query($connect, $sql);
                        while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($member["id_member"])?>">
                                <?=($member["id_member"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        <?php 
                        date_default_timezone_set('Asia/Jakarta');
                        ?>

                        Tanggal Laundry 
                        <input type="date" name="tgl"
                        class="form-control mb-2" required>

                        Batas Waktu Laundry 
                        <input type="date" name="batas_waktu"
                        class="form-control mb-2" required>

                        Tanggal Bayar
                        <input type="date" name="tgl_bayar"
                        class="form-control mb-2">

                        Status Paket 
                        <select name="status" class="form-control mb-2"
                        required>
                            <option value="baru">Baru Masuk</option>
                            <option value="proses">Proses Laundry</option>
                            <option value="selesai">Selesai Laundry</option>
                            <option value="diambil">Sudah Diambil</option>    
                        </select>

                        Pembayaran Laundry 
                        <select name="dibayar" class="form-control mb-2"
                        required>
                            <option value="dibayar">Lunas</option>
                            <option value="belum_dibayar">Belum Lunas</option>
                        </select>

                        ID User 
                        <select name="id_user"
                        class="form-control mb-2" required>
                        <?php 
                        include "connection.php";
                        $sql = "select * from user";
                        $hasil = mysqli_query($connect, $sql);
                        while ($user = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($user["id_user"])?>">
                                <?=($user["id_user"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        ID Paket  
                        <select name="id_paket"
                        class="form-control mb-2" required>
                        <?php 
                        include "connection.php";
                        $sql = "select * from paket";
                        $hasil = mysqli_query($connect, $sql);
                        while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($paket["id_paket"])?>">
                                <?=($paket["id_paket"])?>    
                        </option>
                        <?php 
                        }
                        ?>
                        </select>

                        Jumlah Laundry (kg) 
                        <input type="number" name="qty"
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-info btn-block"
                        name="simpan_transaksi">
                            Simpan Data Transaksi 
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