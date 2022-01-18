<?php 
include("connection.php");
if (isset ($_POST["simpan_member"])) {
    $id_member = $_POST["id_member"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];

    $sql = "insert into member values
    ('$id_member','$nama','$alamat','$jenis_kelamin','$tlp')";

    mysqli_query($connect, $sql);

    header("location:list-member.php");
}

if (isset ($_POST["edit_member"])) {
    $id_member = $_POST["id_member"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];

    $sql = "update member set nama='$nama', 
    alamat='$alamat', tlp='$tlp' where id_member='$id_member'";

    mysqli_query($connect, $sql);

    header("location:list-member.php");
}
?>