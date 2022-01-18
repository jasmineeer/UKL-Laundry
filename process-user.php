<?php 
include "connection.php";
if (isset($_POST["simpan_user"])) {
    $id_user = $_POST["id_user"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $role = $_POST["role"];

    $sql = "insert into user values ('$id_user','$nama',
    '$username','$password','$role')";

    if (mysqli_query($connect, $sql)) {
        header("location:list-user.php");
    } else{
        echo mysqli_error($connect);
    }
}

elseif (isset($_POST["update_user"])) {
    $id_user = $_POST["id_user"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    if (empty($_POST["password"])) {
        $sql = "update user set
        nama='$nama', username='$username', role='$role'
        where id_user='$id_user'";
    } else{
        $password = sha1($_POST["password"]);
        $sql = "update user set 
        nama='$nama', username='$username',
        password='$password', role='$role' where id_user='$id_user'";
    }

    if (mysqli_query($connect, $sql)) {
        header("location:list-user.php");
    } else{
        echo mysqli_error($connect);
    }
}
?>