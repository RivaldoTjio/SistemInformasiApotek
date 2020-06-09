<?php
session_start();
$kode = $_POST['kodeobat'];
$query = "delete from obat where kodeobat = $kode";
$conn;
require("koneksi.php");
try {
    if (mysqli_query($conn,$query)){
        header("location:admin.php?delete=sukses");
    } 
} catch (Exception $e) {
    header("location:admin.php?delete=$e");
}
mysqli_close($conn);
?>