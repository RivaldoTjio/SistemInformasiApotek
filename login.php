<?php
include'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "select username from users where username = '$username' and password = '$password'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) == 1)
{
    $data = mysqli_fetch_array($result);
    session_start();
    $_SESSION['login']= true;
    $_SESSION['username'] = $data['username'];
    header("location:admin.php");
    return true;
} else {
    return false;
}
mysqli_close($conn);
?>