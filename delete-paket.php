<?php 
include("connection.php");

$id_paket = $_GET['id_paket'];
$sql = "delete from paket where id_paket ='".$id_paket."'";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:list-paket.php");
} else{
    printf('Gagal menghapus data!'.mysqli_error($connect));
    exit();
}
?>