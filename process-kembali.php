<?php 
include "connection.php";
if (isset($_POST["update_transaksi"])) {
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

    $sql = "update transaksi set id_transaksi='$id_transaksi',
    id_member='$id_member', tgl='$tgl', batas_waktu='$batas_waktu',
    tgl_bayar='$tgl_bayar', status='$status', dibayar='$dibayar',
    id_user='$id_user' where id_transaksi='$id_transaksi'";

    if (mysqli_query($connect, $sql)) {
        header("location:list-transaksi.php");
    } else{
        echo mysqli_error($connect);
    }
}
?>