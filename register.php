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
  <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .login-link {
            color: #007bff;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">

<div class="card">
        <h1>Registrasi</h1>
        <form action="proses/proses_register.php" method="post">
            <?php
                if ($result) {
                    echo "<div class='form-group'>";
                    echo "<label for='perpustakaan'></label>";
                    echo "<select class='form-control' name='perpustakaan' required>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        $nama_perpustakaan = $row['nama_perpus'];
                        $id_perpus = $row['id'];
                        echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                    }

                    echo "</select>";
                    echo "</div>";
                } else {
                    echo "Gagal mengambil data";
                }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
            </div>
            <input type="text" name="role" value="peminjam" style="display: none;">
            <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
        </form>
        <div class="success-message">
            <!-- Tampilkan pesan berhasil di sini -->
        </div>
        <a href="login.php" class="login-link">Sudah punya akun? Login</a>
    </div>

<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>
