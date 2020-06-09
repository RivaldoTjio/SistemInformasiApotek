<?php
session_start();
$user = $_SESSION['username'];
$namaobat = $_POST['nmobat'];
$deskripsi = $_POST['deskrip'];
$stok = $_POST['ttlstck'];
$hargabeli = $_POST['hargabeli'];
$hargajual = $_POST['hargajual'];

$conn;
require("koneksi.php");
$query = "insert into obat (namaobat,username,deskripsi,stok,hargabeli,hargajual) values('$namaobat','$user','$deskripsi','$stok','$hargabeli','$hargajual')";
if (mysqli_query($conn,$query)){
    header("location:admin.php?input=sukses");
} else {
    header("location:admin.php?input=gagal");
}
mysqli_close($conn);
?>