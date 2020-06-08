<?php
include_once 'User.php';
if (!isset($_SESSION)){
  session_start();
}
$user1 = new User();
if (isset($_GET['logoutt'])) {
 $user1->logout();
 header("location:beranda2.php");
}
if (isset($_GET['input'])) {
  alert("Input Sukses");
} elseif (isset($_GET['input'])=='gagal') {
  alert("Input Gagal");
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

}

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>Halaman Admin</title>
    <style>
    </style>
  </head>
  <body>
      <header>
        <nav class="navbar navbar-dark" style="background-color: #0fb400;">
            <a class="navbar-brand" href="#">Logo</a>
            <i class="far fa-h1    "><?php echo"Hai ".$_SESSION['username'].""; ?></i>
          </nav>
      </header>
      <main>
    <div class="row container" style="margin-top: 50px;">
        <div class="col-4" >
          
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="Input">Input data</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="Edit">Edit data</a>
            <a class="list-group-item list-group-item-action" id="list-kasir-list"  href="kasir.html">Kasir</a>
            <a class="list-group-item list-group-item-action" id="list-lapor-list" data-toggle="list" href="#list-lapor" role="tab" aria-controls="Edit">Laporan penjualan</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" value="logoutt" data-toggle="modal" href="admin.php?logoutt=true" role="tab" aria-controls="Keluar">Keluar</a>
          </div>
          
        </div>
        <div class="col-8">
          <div class="tab-content" id="nav-tabContent" >
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <form action="inputdata.php" method="post">
                    <div class="form-group" >
                        <h2>Input Data obat </h2>
                    </div>
                    <div class="form-group">
                      <label for="namaobat" style="text-align: center;">Nama Obat</label>
                      <input type="text" name="nmobat"  class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="Deskripsi" style="text-align: center;">Deskripsi</label>
                        <textarea id="deskkripsi" class="form-control" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="total" style="text-align: center;">Total Stock</label>
                        <input type="text" name="ttlstck"  class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="hargabeli" style="text-align: center;">Harga Beli</label>
                        <input type="number" name="hargabeli"  class="form-control"  />
                      </div>
                      <div class="form-group">
                        <label for="hargajual" style="text-align: center;">Harga Jual</label>
                        <input type="number" name="hargajual"  class="form-control"  />
                      </div>
                    <div class="text-center" style="padding-bottom: 10px;">
                      <button class="btn btn-success btn-block" type="submit">Input</button>
                    </div>
                    
                  </form>
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <table class="table table-hover table-responsive" >
            <thead style="background-color: #4da6ff;">
            <tr>
        <th>Gambar</th>
        <th>Kode Obat</th>
        <th>Nama Obat </th>
        <th>Deskripsi</th>
        <th>Stock</th>
        <th>Harga</th>
        <th>#</th>
        
          </tr>
        </thead>
    <?php 
    $sql = "SELECT * FROM validation";
    $qry=mysqli_query($conn, $sql) or die("Gagal");
    while($d = mysqli_fetch_array($qry)){
    ?> <!-- Ini Contoh -->
    <tbody>
    <tr>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['jkel']; ?></td>
        <td><?php echo $d['nisn']; ?></td>
        <td><?php echo $d['nik']; ?></td>
        <td><?php echo $d['temlahir']; ?></td>
        <td><a href="#">Edit</a></td>
    </tr>
    </tbody>
    <?php
    } 
     ?>
        </table>
            </div>
            <div class="tab-pane fade" id="list-lapor" role="tabpanel" aria-labelledby="list-lapor-list">
            <div>
            <table id="example" class="row-border hover order-column" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
           </tbody>
          </table>
          </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <form method="POST">    
<div id="modalkeluar" class="modal fade" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">
        Apakah Anda yakin untuk keluar 
      </div>
      <div class="modal-footer">
        <button type="button" name="batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" name="logout" class="btn btn-success">Ya</button>
      </div>
    </div>
  </div>
</div>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
    var table = $('#example').DataTable();
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
} );
    </script>
  </body>
</html>