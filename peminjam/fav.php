<?php
include '../koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && isset($_GET['action'])) {
        $bookId = $_GET['id'];
        $action = $_GET['action'];

        // Validasi action
        if ($action !== 'add' && $action !== 'delete') {
            // Jika action tidak valid, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
            echo "Action tidak valid.";
            exit();
        }

        // Validasi apakah buku dengan ID tertentu ada di database
        $checkBookQuery = "SELECT * FROM buku WHERE id = $bookId";
        $checkBookResult = mysqli_query($koneksi, $checkBookQuery);

        if (mysqli_num_rows($checkBookResult) > 0) {
            // Buku ditemukan, lanjutkan proses bookmark
            if ($action == 'add') {
                // Jika action=add, tambahkan buku ke koleksi pribadi
                $insertQuery = "INSERT INTO koleksi_pribadi (user, buku) VALUES ((SELECT id FROM user WHERE username = '$username'), $bookId)";
                mysqli_query($koneksi, $insertQuery);
            } elseif ($action == 'delete') {
                // Jika action=delete, hapus buku dari koleksi pribadi
                $deleteQuery = "DELETE FROM koleksi_pribadi WHERE user = (SELECT id FROM user WHERE username = '$username') AND buku = $bookId";
                mysqli_query($koneksi, $deleteQuery);
            }

            // Redirect kembali ke halaman utama setelah bookmark berhasil ditambahkan atau dihapus
            header("Location: fav.php");
            exit();
        } else {
            // Jika buku dengan ID tertentu tidak ditemukan, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
            echo "Buku dengan ID $bookId tidak ditemukan.";
            exit();
        }
    }
} else {
    // Jika bukan metode GET, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
    echo "Metode yang diterima hanya GET.";
    exit();
}
// Query untuk mengambil data buku yang di-bookmark oleh user
$query = "SELECT buku.* FROM buku
          INNER JOIN koleksi_pribadi ON buku.id = koleksi_pribadi.buku
          INNER JOIN user ON koleksi_pribadi.user = user.id
          WHERE user.username = '$username'";

$result = mysqli_query($koneksi , $query);

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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PERPUS SMEA</a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fav.php">Favorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="peminjaman.php">Peminjaman</a>
                </li>
            </ul>
            <!-- Search Form -->
            <form class="d-flex mx-auto">
            </form>
        </div>
        <div class="navbar-nav">
            <a class="nav-link fa-solid fa-right-from-bracket" href="../logout.php"> </a>
        </div>
    </div>
</nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="table-container d-flex">
                <div class="container-content d-flex flex-wrap">
                    <?php while($rew=mysqli_fetch_assoc($result)):?>
                    <div class="card" style="width: 250px; margin-left: 28px; margin-top: 20px;">
                        <img src="../asset/<?= $rew['foto'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b><h6><?= $rew['judul']; ?></h6></b>
                            <p>Penulis: <?= $rew['penulis']; ?></p>
                            <p>Stok Buku: <?= $rew['stok']; ?></p>
                            <a href="fav.php?id=<?= $rew['id'] ?>&action=delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus buku ini dari favorit')">
                            <i class="fa-solid fa-heart"></i></a>   
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
