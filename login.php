<?php 
include 'koneksi.php';

session_start();    

if(isset($_POST['login'])){

var_dump ($_POST);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

if($data = mysqli_fetch_assoc($admin)){
if(password_verify($password, $data['password'])){
$_SESSION['username'] = $data['username'];

if($data['role'] == 'admin'){
$_SESSION['id'] = $data['id'];
$_SESSION['role'] = $data['role'];
header('location: admin/index.php');
}
elseif($data['role'] == 'petugas'){
$_SESSION['id'] = $data['id'];
$_SESSION['role'] = $data['role'];
header('location: petugas/index.php');
//echo"Masuk ke petugas";
}
elseif($data['role'] == 'peminjam'){
$_SESSION['role'] = $data['role'];
header('location: peminjam/index.php');
//echo"Masuk ke peminjam"; 
}
//header('location: admin/index.php');
} else {
echo "username dan password salah";
}
} else {
echo "akun tidak ada";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

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
            background-image: url('background.jpg');
            background-size: cover;
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
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group-text {
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        .form-control {
            border-radius: 0 5px 5px 0;
        }

        .btn-primary {
            background: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <div class="error-message">
            <!-- Tampilkan pesan error di sini -->
        </div>
        <div class="success-message">
            <!-- Tampilkan pesan berhasil di sini -->
        </div>
        <p class="mb-0">
            <a href="register.php">Register</a>
        </p>
    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
</body>
</html>

