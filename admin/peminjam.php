<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$sql = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM user WHERE role='peminjam'";
$result1= mysqli_query($koneksi, $sql1);

$sql2 = "SELECT * FROM buku";
$result2 = mysqli_query($koneksi, $sql2);

$sql3 = "SELECT peminjaman.*, user.nama_lengkap,buku.judul, perpustakaan.nama_perpus 
         FROM peminjaman
        INNER JOIN user ON peminjaman.user =user.id
        INNER JOIN buku ON peminjaman.buku =buku.id
        INNER JOIN perpustakaan ON peminjaman.perpus_id =perpustakaan.id";
$result3 = mysqli_query($koneksi, $sql3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
        /* CSS untuk mengatur teks di tengah */
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
  <link rel="stylesheet" href="../dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../dashboard/plugins/summernote/summernote-bs4.min.css">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="overflow-x: hidden;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        <!-- Tombol Logout -->
        <a class="nav-link" href="../logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Hi Administrator</span>
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
          <!-- Menu Dashboard -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                <li class="nav-item menu-open">
                <i class="nav-icon fa-solid fa-house"></i>                  
                <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Pengguna -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./pengguna.php" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Peminjaman -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./peminjam.php" class="nav-link">
                <i class="nav-icon fa-solid fa-pen-to-square"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Buku -->
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
          <!-- Menu Ulasan Buku -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./ulasan.php" class="nav-link">
                <i class="nav-icon fa-solid fa-comments"></i>
                  <p>Ulasan Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Kategori -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Kategori.php" class="nav-link">
                <i class=" nav-icon fa-solid fa-table-list"></i>
                  <p>Kategori</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height:91.6vh; background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <div class="content-header"></div>
    <!-- Main content -->
    <section class="content d-flex flex-col">
    <div class="container-fluid">
        <form method="GET" class="form-inline">
          <div class="form-group">
            <label for="start_date" class="mr-2">Tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" class="form-control mr-2">
          </div>
          <div class="form-group">
            <label for="end_date" class="mr-2">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" class="form-control mr-2">
          </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <table class="table" style="margin-top:30px;width:97%; position:relative;left:20px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perpustakaan</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal peminjaman</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                while ($row = mysqli_fetch_assoc($result3)) :
                    $tanggal_peminjaman = $row['tanggal_peminjaman'];
                    if(isset($_GET['start_date']) && isset($_GET['end_date'])) {
                        $start_date = $_GET['start_date'];
                        $end_date = $_GET['end_date'];
                        if($tanggal_peminjaman >= $start_date && $tanggal_peminjaman <= $end_date) {
                            $i++;
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['nama_perpus'] ?></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?= $row['judul'] ?></td>
                                <td><?= $tanggal_peminjaman ?></td>
                                <td><?= $row['status_peminjaman']?></td>
                                <td>
                                    <a href="../proses/download.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm" style="color: #fff;">Download</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['nama_perpus'] ?></td>
                            <td><?= $row['nama_lengkap'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $tanggal_peminjaman ?></td>
                            <td><?= $row['status_peminjaman']?></td>
                            <td>
                                <a href="../proses/download.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm" style="color: #fff;">Download</a>
                            </td>
                        </tr>
                    <?php
                    }
                endwhile;
                ?>
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
<script src="../dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../dashboard/plugins/moment/moment.min.js"></script>
<script src="../dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dashboard/dist/js/pages/dashboard.js"></script>
</body>
</html>
