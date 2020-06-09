<?php
include_once 'User.php';
if (!isset($_SESSION)){
  session_start();
}
$user1 = new User();
if (isset($_GET['logoutt'])) {
 $user1->logout();
 header("location:index.php");
}
if (isset($_GET['input'])) {
  if ($_GET['input']=='sukses') {
    alert("Input Sukses");
    unset($_GET['input']);  
  } elseif (isset($_GET['input'])=='gagal') {
  alert("Input Gagal");
  unset($_GET['input']);
}
}
if (isset($_GET['update'])) {
  if ($_GET['update']=='sukses') {
    alert("Update Sukses");
  unset($_GET['update']);
  } elseif (isset($_GET['update'])=='gagal') {
  alert("Update Gagal");
  unset($_GET['update']);
} else{
  alert($_GET['update']);
}
}

if (isset($_GET['delete'])) {
  if ($_GET['delete']=='sukses') {
    alert("Hapus Sukses");
  unset($_GET['delete']);
  } elseif (isset($_GET['delete'])=='gagal') {
  alert("Hapus Gagal");
  unset($_GET['delete']);
} else{
  alert($_GET['delete']);
}

}
if (isset($_GET['create'])) {
  if ($_GET['create']=='sukses') {
    alert("Buat User Sukses");
  unset($_GET['create']);
  } elseif (isset($_GET['create'])=='gagal') {
  alert("Buat User Gagal");
  unset($_GET['create']);
} else{
  alert($_GET['create']);
}

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['logout']== "Ya") {
      $user1->logout();
      header("location:index.php");
    }
}

function logoutuser() {
  $this->user1->logout();
  header("location:index.php");
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
            <a class="navbar-brand" href="#">Sistem Informasi Apotek</a>
            <i class="far fa-h1    "><?php echo"Hai ".$_SESSION['username'].""; ?></i>
          </nav>
      </header>
      <main>
    <div class="row container" style="margin-top: 50px;">
        <div class="col-4" >
          
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="Input">Input data</a>
            <a class="list-group-item list-group-item-action" id="list-lapor-list" data-toggle="list" href="#list-edit" role="tab" aria-controls="Input">Edit Data</a>
            <a class="list-group-item list-group-item-action" id="list-delete-list" data-toggle="list" href="#list-delete" role="tab" aria-controls="Input">Delete Data</a>
            <a class="list-group-item list-group-item-action" id="list-create-list" data-toggle="list" href="#create-user" role="tab" aria-controls="Input">Buat User</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" value="logoutt" data-toggle="modal" href="#modalkeluar" role="tab" aria-controls="Keluar">Keluar</a>
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
                        <textarea id="deskkripsi" name="deskrip" class="form-control" rows="3"></textarea>
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
            
          <div class="tab-pane fade" id="list-edit" role="tabpanel" aria-labelledby="list-edit-list">
                <form action="updatedata.php" method="post">
                    <div class="form-group" >
                        <h2>Edit Data obat </h2>
                    </div>
                    <div class="form-group">
                      <label for="kodeobat" style="text-align: center;">Kode Obat</label>
                      <select class="form-control" id="kodeobat" name="kodeobat">
                      <option>-</option>
                        <?php
                        include "koneksi.php";
                        $query = "SELECT `KODEOBAT` FROM `obat` WHERE 1";
                        $result = mysqli_query($conn,$query); 
                        while ($data = mysqli_fetch_array($result)){
                          echo "<option value='$data[0]'>$data[0]</option>";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="namaobat" style="text-align: center;">Nama Obat</label>
                        <input type="text" name="namaobat" class="form-control" />
                      </div>
                    <div class="form-group">
                        <label for="Deskripsi" style="text-align: center;">Deskripsi</label>
                        <textarea id="deskripsi" name="dekskrip" class="form-control" rows="3"></textarea>
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
                      <button class="btn btn-success btn-block" type="submit">Edit</button>
                    </div>
                    
                  </form>
              </div>
              <div class="tab-pane fade" id="create-user" role="tabpanel" aria-labelledby="list-delete-list">
                <form method="post" action="createuser.php">
                <div class="form-group" >
                        <h2>Buat User Baru</h2>
                    </div> 
                    <div class="form-group">
                        <label for="username" style="text-align: center;">Username</label>
                        <input type="text" name="username" class="form-control" />
                      </div> 
                      <div class="form-group">
                        <label for="password" style="text-align: center;">Password</label>
                        <input type="password" name="password" class="form-control" />
                      </div>
                      <div class="form-group">
                      <div class="text-center" style="padding-bottom: 10px;">
                      <button class="btn btn-success btn-block" type="submit">Buat User</button>
                    </div>
                      </div>
                </form>
                <div class="form-group">
                <table id="example" class="display" style="width:100%">
            <thead style="background-color: black;color: white;">
                <tr>
                    <th>Username</th>
                  
                </tr>
            </thead>
            <tbody>
              <?php
                include "koneksi.php";
                $query = "select username from users";
                $result = mysqli_query($conn,$query);
                while($data = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>$data[0]</td>
                </tr>";
              }
                ?>
            </tbody>
        </table> 
        </div>

              </div>
            
            <div class="tab-pane fade" id="list-delete" role="tabpanel" aria-labelledby="list-delete-list">
                <form method="post" action="delete.php">
                <div class="form-group" >
                        <h2>Hapus Data obat </h2>
                    </div> 
                    <div class="form-group">
                      <label for="kodeobat" style="text-align: center;">Kode Obat</label>
                      <select class="form-control" id="kodeobat" name="kodeobat">
                      <option>-</option>
                        <?php
                        include "koneksi.php";
                        $query = "SELECT `KODEOBAT` FROM `obat` WHERE 1";
                        $result = mysqli_query($conn,$query); 
                        while ($data = mysqli_fetch_array($result)){
                          echo "<option value='$data[0]'>$data[0]</option>";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <div class="text-center" style="padding-bottom: 10px;">
                      <button class="btn btn-danger btn-block" type="submit">Delete</button>
                    </div>
                    </div>
                </form>
                <div class="form-group">   
          <table id="dataobat" class="display" style="width:100%">
            <thead style="background-color: black;color: white;">
                <tr>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th> 
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Di Edit Oleh</th>
                </tr>
            </thead>
            <tbody>
              <?php
                include "koneksi.php";
                $query = "select kodeobat, namaobat,deskripsi,stok,hargabeli,hargajual,username from obat";
                $result = mysqli_query($conn,$query);
                while($data = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                    <td>$data[5]</td>
                    <td>$data[6]</td>
                </tr>";
              }
                ?>
            </tbody>
           
        </table> 
                </div>
      </div>
      </div>
        </div>
      </div>
    </main>
    
      
<div id="modalkeluar" class="modal fade" tabindex="-1" role="dialog" >
<form method="POST">  
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
        <input type="submit" name="logout" onclick="logoutuser()" class="btn btn-success" value="Ya"></i>
      </div>
    </div>
  </div>
  </form>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
    var table = $('#example').DataTable();
    $('#dataobat').DataTable({
    pageLength: 10,
    filter: true,
});
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