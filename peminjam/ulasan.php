<?php
include '../koneksi.php';

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

        .content-wraper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .isi-ulasan {
            border-top: 1px solid #dee2e6;
            margin-top: 20px;
            padding-top: 20px;
        }

        .isi {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .footer {
            margin-top: 20px;
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
        <div class="content-wraper shadow p-3 mb-5 bg-body rounded" style="margin-top: 50px;">
            <div class="container-fluid">
                <h2><?= $detail['judul'] ?></h2>
                <label for="">Penulis : <?= $detail['penulis'] ?></label><br>
                <label for="">Penerbit : <?= $detail['penerbit'] ?></label>
                <form action="" method="post">
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label for="ulasan">Ulasan :</label>
                        <div class="isi-ulasan" style="overflow-y: scroll;">
                            <?php while ($row = mysqli_fetch_assoc($review)) : ?>
                                <div class="isi p-2">
                                    <p><?= $row['nama_lengkap'] ?></p>
                                    <p>Rating : <?= $row['rating'] ?></p>
                                    <p><?= $row['ulasan'] ?></p>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a href="index.php"><button type="button" class="btn btn-secondary">Close</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
