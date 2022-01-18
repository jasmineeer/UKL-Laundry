<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User Laundry</title>
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
                    Data User 
                </h4>
            </div>

            <div class="card-body">
                <?php 
                if (isset($_GET["id_user"])) {
                    include "connection.php";

                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";
                    $hasil = mysqli_query($connect, $sql);
                    $user = mysqli_fetch_array($hasil);
                ?>

                <form action="process-user.php" method="post">

                    ID User
                    <input type="text" name="id_user"
                    class="form-control mb-2" required
                    value="<?=($user["id_user"])?>">

                    Nama User  
                    <input type="text" name="nama"
                    class="form-control mb-2" required
                    value="<?=($user["nama"])?>">

                    Username 
                    <input type="text" name="username"
                    class="form-control mb-2" required
                    value="<?=($user["username"])?>">

                    Password 
                    <input type="password" name="password"
                    class="form-control mb-2" placeholder="Jangan diisi apabila tidak ingin mengganti password">

                    Role
                    <select name="role" class="form-control mb-2" readonly>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-info btn-block"
                    name="update_user">
                        Simpan Data 
                    </button>
                </form>
                <?php 
                } else{
                ?>

                <form action="process-user.php" method="post">

                    ID User 
                    <input type="number" name="id_user" 
                    class="form-control mb-2" required>

                    Nama User 
                    <input type="text" name="nama" 
                    class="form-control mb-2" required>

                    Username 
                    <input type="text" name="username" 
                    class="form-control mb-2" required>

                    Password 
                    <input type="password" name="password" 
                    class="form-control mb-2" required>

                    Role
                    <select name="role" class="form-control mb-2" required>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-info btn-block"
                    name="simpan_user">
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