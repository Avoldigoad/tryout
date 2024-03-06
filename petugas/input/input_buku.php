<?php 
include '../../koneksi.php';

$sql = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM  kategori_buku ";
$result1 = mysqli_query($koneksi, $sql1);

$sql2 = "SELECT * FROM buku";
$result2 = mysqli_query($koneksi, $sql2);

$sql3 = "SELECT * FROM  kategori_buku ";
$result3 = mysqli_query($koneksi, $sql3);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
        /* CSS untuk mengatur teks di tengah */
        .isi:hover{
            background-color: #525CEB;
            color:#FFf;
        }
        .brand-link {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-text {
            margin-left: 5px; /* Margin agar ada jarak antara ikon dan teks */
        }
        .navbar-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-item {
            display: flex;
            align-items: center;
        }

        .nav-link {
            margin-right: 1000px; /* Adjust the right margin as needed */
        }
    </style>
  <title>Buku</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../dashboard/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="overflow-x:hidden;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        <a class="nav-link" href="../logout.php" role="button" style="margin-left: 220px;"><i class="fa-solid fa-right-from-bracket"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Hi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                <li class="nav-item menu-open">
                <i class=" nav-icon fa-solid fa-house"></i>                  
                <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./buku.php" class="nav-link">
                <i class="nav-icon fa-solid fa-book"></i>
                  <p>Buku</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <?php if($result){
                $riw = mysqli_fetch_assoc($result1);
              ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Tambah Buku</h4>
                    <a href="../buku.php"><button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                <form action="../proses/proses_tambah_buku.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Isi formulir edit di sini -->
                    <?php
                    if ($result) {
                      echo "<label for='perpustakaan'>Perpustakaan :</label>";
                      echo "<select class='form-control' name='perpustakaan' required>";

                    while ($row = mysqli_fetch_assoc($result)) {
                      $nama_perpustakaan = $row['nama_perpus'];
                      $id_perpus = $row['id'];
                      echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                    }

                    echo "</select>";
                    } else {
                      echo "Gagal mengambil data";
                 }
              ?>
          <div class="form-grup">
            <label for="cover">Upload Cover :</label>
            <input type="file" name="cover" class="form-control" required style="height:45px;">
          </div>
          <div class="form-grup">
            <label for="pdf">Pdf :</label>
            <input type="file" name="pdf" class="form-control" required style="height:45px;">
        </div>
          <div class="form-grup">
            <label for="judul">Judul buku :</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="penulis">Penulis :</label>
            <input type="text" name="penulis" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="penerbit">Penerbit :</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="sinopsis">Sinopsis :</label>
            <textarea type="text" name="sinopsis" class="form-control" required></textarea>
        </div>
        <div class="form-grup">
            <label for="tahun_terbit">Tahun terbit :</label>
            <input type="date" name="tahun_terbit" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="stok">Stok Buku :</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <label>Kategori :</label>
        <select class='form-control' name='kategori' required>
          <option>pilih kategori</option>
          <?php
             while ($rew = mysqli_fetch_assoc($result3)):
          ?>  
            <option value="<?= $rew['id'] ?>"><?= $rew['nama_kategori'];?></option>
          <?php endwhile ?>
        </select>
        </div>
                      <div class="modal-footer">
                        <a href="../buku.php"><button type="submit"  class="btn btn-primary">Simpan Buku</button></a>
                  </div>
                  </form>
                <?php 
                    }  
                ?>
            </div>
        </div>
    </div>

    <div class="content-wrapper " style="height:91.6vh; background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#161A30;">Buku</h1>
            <a href="input/input_buku.php">
              <button type="button" class="btn btn-primary" style="margin-left:170%;margin-top:-30px;position:absolute;width:140px;">+Tambah Buku</button>
            </a>
          </div>            
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content d-flex flex-col">
      <div class="container-fluid">
    <table class="table" style="margin-top:30px;width:100%; position:relative;left:10px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result2)) :  $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class='d-flex'>
                    <img src="../../asset/<?= $row['foto']?>" alt="" style="width: 50px; height: 55px; border-radius: 3px; margin-right:10px;">
                      <div>
                        <b><?= $row['judul'] ?></b><br>
                        <?= $row['penulis'] ?>
                      </div>
                  </td>
                    <td><?= $row['penerbit'] ?></td>
                    <td><?= $row['tahun_terbit'] ?></td>
                    <td>
                        <a href="edit/edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete/delete_buku.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                        <a href="detail/detail_buku.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm" style="color: #fff;">Detail</a>                   
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>
    </section>
  </div>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../dashboard/plugins/moment/moment.min.js"></script>
<script src="../../dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dashboard/dist/js/pages/dashboard.js"></script>
<script>
        $(document).ready(function(){
            $('#editModal').modal('show');
        });
</script>
</body>
</html>