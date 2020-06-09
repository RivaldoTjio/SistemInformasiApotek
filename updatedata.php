<?php
session_start();
$user = $_SESSION['username'];
$kode = $_POST['kodeobat'];
$namaobat = $_POST['namaobat'];
$deskripsi = $_POST['deskrip'];
$stok = $_POST['ttlstck'];
$hargabeli = $_POST['hargabeli'];
$hargajual = $_POST['hargajual'];
$conn;
require("koneksi.php");
$query = "update obat set namaobat = '$namaobat' ,username = '$user', deskripsi = '$deskripsi', stok = $stok, hargabeli = $hargabeli, hargajual = $hargajual where kodeobat = $kode";
try {
    if (mysqli_query($conn,$query)){
        header("location:admin.php?update=sukses");
    } 
} catch (Exception $e) {
    header("location:admin.php?update=$e");
}

mysqli_close($conn);
?>