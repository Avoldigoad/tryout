<?php 
include '../../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}

$id = $_GET['id'];

$query = "SELECT judul, penulis, penerbit FROM buku WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$detail = mysqli_fetch_assoc($result);

$view = "SELECT user.nama_lengkap, ulasan_buku.ulasan, ulasan_buku.rating
         FROM ulasan_buku
         INNER JOIN user ON ulasan_buku.user = user.id
         WHERE ulasan_buku.buku = '$id'";
$review = mysqli_query($koneksi, $view);

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
        .content {
            margin-top: 35px;
        }

        .content-wraper {
            width: 50%;
            margin-left: 25%;
            padding: 10px;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
        }

        h2 {
            color: #161A30;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
        }

        .isi-ulasan {
            border: 2px solid #eee;
            height: 250px;
            border-radius: 6px;
            overflow-y: scroll;
        }

        .isi {
            border-bottom: 1px solid #eee;
            padding: 10px;
        }

        .footer {
            margin-top: 20px;
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
        <a class="nav-link" href="../../logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i></a>
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
      <nav class="mt-2" style="overflow-x: hidden;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
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
                <a href="../pengguna.php" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../peminjam.php" class="nav-link">
                <i class="nav-icon fa-solid fa-pen-to-square"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../buku.php" class="nav-link">
                <i class="nav-icon fa-solid fa-book"></i>
                  <p>Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../ulasan.php" class="nav-link">
                <i class="nav-icon fa-solid fa-comments"></i>
                  <p>Ulasan Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Kategori.php" class="nav-link">
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
  <div class="content-wrapper " style="height:91.6vh; background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ulasan Buku</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="content-wraper shadow p-3 mb-5 bg-body rounded">
            <div class="container-fluid">
                <h2><?= $detail['judul'] ?></h2>
                <label for="">Penulis : <?= $detail['penulis'] ?></label><br>
                <label for="">Penerbit : <?= $detail['penerbit'] ?></label>
                <form action="" method="post">
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label for="ulasan">Ulasan :</label>
                        <div class="isi-ulasan">
                            <?php while ($row = mysqli_fetch_assoc($review)) : ?>
                                <div class="isi p-2">
                                    <p><?= $row ['nama_lengkap'] ?></p>
                                    <p>Rating : <?= $row ['rating'] ?></p>
                                    <p><?= $row ['ulasan'] ?></p>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a href="../ulasan.php"><button type="button" class="btn btn-secondary">Close</button></a>
                    </div>
                </form>
            </div>
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
</body>
</html>
