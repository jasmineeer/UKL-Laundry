<?php 
include("connection.php");

$id_user = $_GET['id_user'];
$sql = "delete from user where id_user ='".$id_user."'";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:list-user.php");
} else{
    printf('Gagal menghapus data!'.mysqli_error($connect));
    exit();
}
?>