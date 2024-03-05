<?php
include '../koneksi.php';

session_start();

if (!$_SESSION["id"]) {
    header("Location:../login.php");
}

// Query untuk mengambil data buku yang dipinjam oleh pengguna dengan tanggal pengembalian yang masih 0
$id = $_SESSION['id'];

$query = "SELECT b.* 
          FROM buku b
          JOIN peminjaman p ON b.id = p.buku
          JOIN user u ON p.user = u.id
          WHERE u.id = '$id'
          AND p.status_peminjaman = 'dipinjam'";
$result = mysqli_query($koneksi, $query);

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
    <div class="container">
        <div class="table-container d-flex">
            <div class="container-content d-flex flex-wrap">
                <?php while ($rew = mysqli_fetch_assoc($result)) : ?>
                    <div class="card" style="width: 250px; margin-left: 28px; margin-top: 20px;">
                        <img src="../asset/<?= $rew['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b><h6><?= $rew['judul']; ?></h6></b>
                            <p>Penulis: <?= $rew['penulis']; ?></p>
                            <p>Stok Buku: <?= $rew['stok']; ?></p>
                            <?php
                            $iduser = $_SESSION['id'];
                            $bukuid = $rew['id'];
                            $sql1 = "SELECT * FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND user = '$iduser' AND buku='$bukuid' ";
                            $result1 = mysqli_query($koneksi, $sql1);
                            if (mysqli_num_rows($result1) > 0) :
                            ?>
                                <a href="proses/proses_pengembalian_peminjaman.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-danger">
                                    Kembalikan
                                </a>
                            <?php else : ?>
                                <a href="proses/proses_input_peminjaman.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-primary">
                                    Pinjam
                                </a>
                            <?php endif; ?>
                            <!-- Tautan untuk membaca PDF -->
                            <a href="buku/baca_buku.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-primary">
                                Baca
                            </a>
                            <a href="mengulas.php?id=<?= $rew['id'] ?>" class="btn btn-sm" style="background-color:green; color:#fff; height:32px; margin-top:5px">Mengulas</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
