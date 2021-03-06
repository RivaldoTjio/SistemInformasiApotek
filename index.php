<?php
if (!isset($_SESSION)){
    session_start();
}
include_once 'User.php';
$user1 = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if ($user1->login($username,$password)) {
    header("location:admin.php");
  }else {
   alert("Username atau Password Salah");
  }
}

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Apotek</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

  footer {
    margin-top: 30px;
    padding: 3px;
    color: white;
    background-color: #0fb400;
    text-align: right;
    font-weight: bold;
 }
</style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0fb400;">
      <div class="container">
        <a class="navbar-brand" href="#">Sistem Informasi Apotek</a>
        <div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              
              <a class="nav-link" href="#onphpidLogin" data-toggle="modal" ><svg class="bi bi-person-fill " width="2em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg></a>
            </li>
          </ul>
        </div>
      </div>   
  </nav>
       </header>
       <main style="margin-top: 50px;">

      <div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active" style="background-color: rgb(119, 104, 104);"></li>
            <li data-target="#carouselExampleControls" data-slide-to="1" style="background-color: rgb(119, 104, 104);" ></li>
            <li data-target="#carouselExampleControls" data-slide-to="2" style="background-color: rgb(119, 104, 104);"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000">
              <img src="assets/img/bufect.jpg" class="d-block w-100" alt="..."  height="350">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
            <div class="carousel-item" data-interval="2500">
              <img src="assets/img/enervon.jfif" class="d-block w-100" alt="..."  height="350"> 
            </div>
            <div class="carousel-item">
              <img src="assets/img/imboost.jpeg" class="d-block w-100" alt="..." height="350">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" ></span>
            <span class="sr-only" >Next</span>
          </a>
        </div>
      </div>
      <div id="content" >
        <hr>
        <h1></h1>
        <div class="tntg" style="background-color: #0fb400; padding-bottom: 20px; padding-top: 10px;">
        <article id="Home" class="container" > 
           <h2 style="color: white;">Tentang</h2>  
       <p style="color: white;">Menjaga kesehatan Anda adalah misi utama layanan kami. Kadang, padatnya kesibukan Anda sering menjadi
           kendala untuk menjaga kesehatan diri dan orang yang Anda kasihi. Jangan khawatir! Kami hadir untuk
           membantu Anda. Sebagai apotek online,Kami menyediakan kebutuhan obat-obatan rutin, obat
           dengan resep, vitamin dan suplemen, alat kesehatan serta produk-produk kesehatan lainnya secara aman dan terpercaya.
           <br><br>
           Kami memberikan kemudahan bagi Anda untuk tebus obat resep tanpa antre,secara online dengan adanya layanan upload resep dokter. 
           Tidak perlu antri menebus resep di Rumah Sakit, Klinik, atau Apotek, sekarang Anda bisa langsung upload resep dokter di Web ini
           Caranya mudah, dengan foto langsung resep obat menggunakan smartphone dan upload pada menu kirim resep yang tersedia tungu beberapa 
           menit lalu anda bisa mengambil obat.</p>
          
       </article>
      </div>
       <hr>
       <article id="product" class="container">
        <div>
          <table id="example" class="display" style="width:100%">
            <thead style="background-color: black;color: white;">
                <tr>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th> 
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
              <?php
                include "koneksi.php";
                $query = "select kodeobat, namaobat,deskripsi,stok,hargajual from obat";
                $result = mysqli_query($conn,$query);
                while($data = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                </tr>";
              }
              mysqli_close($conn);
                ?>
            </tbody>
           
        </table>
        </div>
      </article>
      </main>
      <footer>
        <p><i class="fa fa-copyright" aria-hidden="true">Created By Sandi & Rivaldo &#169; 2020</i> </p>
      </footer>
      <div id="onphpidLogin" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              
            </div>
            <!-- Gae login -->
            <div class="modal-body">
              <!-- form login -->
              <form method="POST" action="">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" />
                </div>
                <div class="text-right">
                  <button class="btn btn-danger" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript">$(document).ready(function() {
          $('#example').DataTable( {
              initComplete: function () {
                  this.api().columns().every( function () {
                      var column = this;
                      var select = $('<select><option value=""></option></select>')
                          .appendTo( $(column.footer()).empty() )
                          .on( 'change', function () {
                              var val = $.fn.dataTable.util.escapeRegex(
                                  $(this).val()
                              );
       
                              column
                                  .search( val ? '^'+val+'$' : '', true, false )
                                  .draw();
                          } );
       
                      column.data().unique().sort().each( function ( d, j ) {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      } );
                  } );
              }
          } );
      } );
     
      </script>
    </body>
</html>