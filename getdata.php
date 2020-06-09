<?php
include'koneksi.php';
$kode = $_GET['kode'];
$query = "Select * From obat where kodeobat = $kode";
$result = mysqli_query($conn,$query);
$encode = array();
while($row = mysqli_fetch_array($result)) {
    $encode[] = $row;
}

echo json_encode($encode);
mysqli_close($conn);
?>