<?php

$namaobat = $_POST['nmobat'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['ttlstck'];
$hargabeli = $_POST['hargabeli'];
$hargajual = $_POST['hargajual'];

$conn;
require("koneksi.php");
$query = "insert into obat (namaobat,deskripsi,stok,hargabeli,hargajual) values('$namaobat','$deskripsi','$stok','$hargabeli','$hargajual')";
if (mysqli_query($conn,$query)){
    header("location:admin.php?input=true");
} else {
    header("location:admin.php?input=gagal");
}
mysqli_close($conn);
?>