<?php
include '../koneksi.php';
session_start();

$id_user = $_SESSION['id'];

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$id = $_GET['id'];

$query = "SELECT judul, penulis, penerbit, tahun_terbit, sinopsis, foto FROM buku WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$detail = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Library Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    /* Customize navbar style */
    .navbar {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
    .footer {
            margin-top: 20px;
        }
    .content-wraper {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: #fff;">PERPUS SMEA</a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php" style="color: #fff;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fav.php" style="color: #fff;">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="peminjaman.php" style="color: #fff;">Peminjaman</a>
                </li>
            </ul>
            <!-- Search Form -->
            <form class="d-flex mx-auto">
            </form>
        </div>
        <div class="navbar-nav">
            <a class="nav-link fa-solid fa-right-from-bracket" href="../logout.php" style="color: #fff;"> </a>
        </div>
    </div>
</nav>

    <div class="content-wrapper">
    <div class="content-wraper shadow p-3 mb-5 bg-body rounded " style="margin-top: 50px;">
            <div class="container-fluid d-flex">
            <img src="../asset/<?= $detail['foto']?>" style="width: 200px; height:320px">
            <div class="ml-4">
                <h3 for="" style="margin-left: 7px;"><?= $detail['judul'] ?></h4><br>
                <h5 for="" style="margin-left: 7px;">Penulis :<?= $detail['penulis'] ?></h4><br>
                <h5 for="" style="margin-left: 7px;">Penerbit : <?= $detail['penerbit'] ?></h5><br>
                <h5 for="" style="margin-left: 7px;">Tahun Terbit : <?= $detail['tahun_terbit'] ?></h5><br>
            </div>
            </div>
            <form action="proses/proses_mengulas_buku.php" method="post">
            <div class="form-grup">
            <input type="hidden" name="buku" value="<?= $id ?>">
            <input type="hidden" name="user" value="<?=$id_user ?>">
          </div>
            <div class="form-control ml-2 mt-2" >
                <label for="ulasan">Ulasan:</label>
                <textarea name="ulasan"  class="form-group" style="width: 100%; height: 100px"></textarea>
            </div>
            <div class="form-control ml-2 mt-2">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
                    <div class="footer text-center">
                        <a href="peminjaman.php" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
    </form>
        </div>
    </div>
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
