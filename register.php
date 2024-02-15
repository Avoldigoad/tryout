<?php
include 'koneksi.php';

$sql="SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"></p>
     <div class="scrollable-form">
    <form action="proses/proses_register.php" method="post">
      <h1 style="text-align:center; ">Registrasi</h1>
        <?php
            if ($result) {
                echo "<label for='perpustakaan'></label>";
                echo "<select class='form-control mb-2' name='perpustakaan' required>";

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
        <input class="form-grup mb-2" type="text" name="username" placeholder="Username" required>
        <input class="form-grup mb-2" type="password" name="password" placeholder="Password" required>
        <input class="form-grup mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-grup mb-2" type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
        <textarea class="form-grup mb-2" type="textarea" name="alamat" placeholder="Alamat" required></textarea>
        <input class="form-grup mb-2" type="text" name="role" value="peminjam" style="display: none;">
        <button class="form-grup mb-2 btn btn-primary " type="submit" name="daftar">Daftar   </button>
    </form>
    </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>
