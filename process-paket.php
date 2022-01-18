<?php
include "connection.php";
$id_paket = $_POST["id_paket"];
$jenis = $_POST["jenis"];
$harga = $_POST["harga"];

$sql = "insert into paket values
('$id_paket', '$jenis', '$harga')";

mysqli_query($connect, $sql);
header("location:list-paket.php");
?>