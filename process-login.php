<?php
// session = tempat penyimpanan data di sisi server yang dapat diakses pada halaman web yang membutuhkan
session_start();
include './connection.php';

// mengecek apakah ada data yang sama dengan data yang ditampilkan
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $role = $_POST["role"];

    // mengambil data dari tabel user
    $sql = "select * from user where username='$username'";
    // untuk mengirim perintah query
    $hasil = mysqli_query($connect, $sql);

    // mengecek hasil query
    // mysqli_num_rows = jumlah baris
    if (mysqli_num_rows($hasil) > 0) {
        $user = mysqli_fetch_array($hasil);
        // session : untuk menampung data karyawan yang berupa username, password, dan role
        $_SESSION["user"] = $user;
        header("location:list-paketlaundry.php");
    } else{
        header("location:login.php");
    }
}
?>