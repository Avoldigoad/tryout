<?php
include '../koneksi.php';

$query = "SELECT buku.id as buku_id, buku.foto, buku.judul, buku.penulis, ulasan_buku.buku, ulasan_buku.rating,
          COUNT(ulasan_buku.id) as total,
          AVG(ulasan_buku.rating) as average_rating
        FROM buku
        LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
        GROUP BY buku.id
        ORDER BY average_rating DESC";
$result4 = mysqli_query($koneksi, $query);

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
  <title>Dashboard</title>
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
        <a class="nav-link" href="../logout.php" role="button" style="margin-left: 220px;"><i class="fa-solid fa-right-from-bracket"></i></a>
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
                <a href="./pengguna.php" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
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
  <div class="content-wraper p-3 mb-5 bg-body-tertiary" style="width:100%;margin-left:0%;padding:20px;background:#fff;border-radius:20px;margin-top: 30px;">
  <div class="container-fluid">
     <table class="table" style="margin: top 30px;">
    <thead>
      <tr>
       <th>No</th>
        <th>Buku</th>
        <th>Total Ulasan</th>
        <th>Rata-rata Rating</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $i = 0; while ($row = mysqli_fetch_assoc($result4)) : $i++; ?>
  <tr>
      <td><?= $i ?></td>
                    <td class='d-flex'>
                          <img src="../asset/<?= $row['foto'] ?>" alt="Cover Buku" style="height:50px; width:50px;margin-right:10px;border-radius:3px"> 
                          <div>
                            <b><?= $row['judul']; ?></b><br>
                            <p><?= $row['penulis']; ?></p>                            
                          </div>
                      </td>
                    <td><?= $row['total'] ?></td>
                    <td><?= number_format($row['average_rating'], 1) ?></td>
                    <td>
                    <a href="detail/detail_ulasan.php?id=<?= $row['buku_id']; ?>" class="btn btn-warning" style="color : #fff;">Detail</a>
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
