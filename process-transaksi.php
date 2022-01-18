<?php 
include "connection.php";
if (isset($_POST["simpan_transaksi"])) {
$id_transaksi = $_POST["id_transaksi"];
$id_member = $_POST["id_member"];
$tgl = $_POST["tgl"];
$batas_waktu = $_POST["batas_waktu"];
$tgl_bayar = $_POST["tgl_bayar"];
$status = $_POST["status"];
$dibayar = $_POST["dibayar"];
$id_user = $_POST["id_user"];
$id_paket = $_POST["id_paket"];
$qty = $_POST["qty"];

$sql = "insert into transaksi values ('$id_transaksi', '$id_member',
'$tgl', '$batas_waktu', '$tgl_bayar', '$status', '$dibayar', '$id_user')";

    if (mysqli_query($connect, $sql)) {
        $sql = "insert into detail_transaksi values 
        ('', '$id_transaksi', '$id_paket', '$qty')";
        if (mysqli_query($connect, $sql)) {   
        } else{
            echo mysqli_error($connect);
            exit();
        }
        header("location:list-transaksi.php");
    } else {
        echo mysqli_error($connect);
    }
}
?>