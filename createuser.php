<?php
session_start();
$usernamee = $_POST['username'];
$passwordd = md5($_POST['password']);
$conn;
require("koneksi.php");
$query = "insert into users (username,password) values('$usernamee','$passwordd')";
if (mysqli_query($conn,$query)){
    header("location:admin.php?create=sukses");
} else {
    header("location:admin.php?create=gagal");
}
mysqli_close($conn);
?>