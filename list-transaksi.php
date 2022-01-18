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
    <title>List Transaksi Laundry</title>
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
                    List Transaksi Laundry 
                </h4>
            </div>

            <div class="card-body">
                <ul class="list=group">
                    <?php 
                    include "connection.php";
                    $sql = "select transaksi.*, 
                    member.*,user.*,transaksi.id_transaksi,
                    transaksi.tgl,transaksi.batas_waktu,transaksi.tgl_bayar
                    from
                    transaksi inner join member
                    on member.id_member=transaksi.id_member
                    inner join user
                    on transaksi.id_user=user.id_user
                    order by tgl desc";

                    $hasil = mysqli_query($connect, $sql);
                    while ($transaksi = mysqli_fetch_array($hasil)) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">ID Transaksi</small>
                                <h5><?=($transaksi["id_transaksi"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Member</small>
                                <h5><?=($transaksi["id_member"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Tanggal Laundry</small>
                                <h5><?=($transaksi["tgl"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Batas Waktu Laundry</small>
                                <h5><?=($transaksi["batas_waktu"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Tanggal Bayar</small>
                                <h5><?=($transaksi["tgl_bayar"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Status Paket</small>
                                <h5><?=($transaksi["status"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Status Pembayaran</small>
                                <h5><?=($transaksi["dibayar"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">User</small>
                                <h5><?=($transaksi["id_user"])?></h5>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <small class="text-info">Paket & Harga Laundry</small>
                                <?php 
                                $id_transaksi = $transaksi["id_transaksi"];
                                $sql = "select * from detail_transaksi
                                inner join paket
                                on detail_transaksi.id_paket = paket.id_paket
                                where id_transaksi = '$id_transaksi'";

                                $hasil_paket = mysqli_query($connect, $sql);
                                while ($paket = mysqli_fetch_array($hasil_paket)) {
                                ?>
                                    <h5><?=($paket["jenis"])?> | Rp <?=(number_format($paket["harga"],2))?></h5>
                                    <?php 
                                }
                                    ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <h6>
                                    Status Bayar :
                                    <?php if ($transaksi["tgl_bayar"] == "0000-00-00") {?> 
                                    <div class="badge badge-danger mb-2">
                                        Belum Lunas 
                                    </div>
                                    <?php } else{?>
                                        <div class="badge badge-success">
                                            Sudah Lunas 
                                        </div>
                                </h6>
                                <?php 
                                    }
                                ?>
                                <h6>
                                        Status Paket :
                                        <?php 
                                        if ($transaksi["status"] == "baru") {?>
                                        <div class="badge badge-primary mb-2">
                                            Baru Masuk 
                                        </div>
                                        <br>
                                        <a href="form-transaksi.php?id_transaksi=<?=$transaksi["id_transaksi"]?>">
                                            <button class="btn btn-info mb-2">
                                                Ubah Status 
                                            </button>
                                        </a>
                                        <?php } if ($transaksi["status"] == "proses") {?>
                                            <div class="badge badge-warning mb-2">
                                                Proses Laundry 
                                            </div>
                                            <br>
                                            <a href="form-transaksi.php?id_transaksi=<?=$transaksi["id_transaksi"]?>">
                                            <button class="btn btn-info mb-2">
                                                Ubah Status 
                                            </button>
                                        </a>
                                        <?php } if ($transaksi["status"] == "selesai") {?>
                                            <div class="badge badge-info mb-2">
                                                Selesai Laundry 
                                            </div>
                                            <br>
                                            <a href="form-transaksi.php?id_transaksi=<?=$transaksi["id_transaksi"]?>">
                                            <button class="btn btn-info mb-2">
                                                Ubah Status 
                                            </button>
                                        </a>
                                        <?php } if ($transaksi["status"] == "diambil") {?>
                                            <div class="badge badge-success mb-2">
                                                Sudah Diambil  
                                            </div>
                                            <br>
                                            <a href="form-transaksi.php?id_transaksi=<?=$transaksi["id_transaksi"]?>">
                                            <button class="btn btn-outline-info mb-2">
                                                Ubah Status 
                                            </button>
                                        </a>
                                </h6>
                                <?php 
                                        }
                                ?>
                                <a href="delete-transaksi.php?id_transaksi=<?=$transaksi["id_transaksi"]?>"
                                onclick="return confirm('Apakah anda yakin?')">
                                    <button class="btn btn-danger">
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
                <a href="form-transaksi.php">
                    <button class="btn btn-info">
                        Tambah Data Transaksi 
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>