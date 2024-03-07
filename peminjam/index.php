<?php
include '../koneksi.php';

session_start();

if(!$_SESSION['id']){
    header("Location:../login.php");
  }
  
$query1 = isset($selectedCategory) && $selectedCategory != 'semua' ? 
    "SELECT buku.id as buku_id, buku.judul, buku.foto, buku.tahun_terbit, buku.penulis, buku.penerbit, buku.stok, ulasan_buku.buku, ulasan_buku.rating,
    AVG(ulasan_buku.rating) as rating_buku
    FROM buku
    LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
    WHERE buku.kategori_id = '$selectedCategory'
    GROUP BY buku.id" : 

    "SELECT buku.id as buku_id, buku.judul, buku.foto, buku.tahun_terbit, buku.penulis, buku.penerbit, buku.stok, ulasan_buku.buku, ulasan_buku.rating,
    AVG(ulasan_buku.rating) as rating_buku
    FROM buku
    LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
    GROUP BY buku.id";
$result2 = mysqli_query($koneksi, $query1);

$username = $_SESSION['username'];  

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Penanganan ketika buku ditambahkan atau dihapus dari koleksi pribadi
    if (isset($_GET['id']) && isset($_GET['action'])) {
        $bookId = $_GET['id'];
        $action = $_GET['action'];
        // Validasi action
        if ($action !== 'add' && $action !== 'delete') {
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
                $deleteQuery = "DELETE FROM koleksi_pribadi WHERE user = (SELECT id FROM user WHERE username = '$username') AND buku = $bukuid";
                mysqli_query($koneksi, $deleteQuery);
            }

            // Redirect kembali ke halaman utama setelah bookmark berhasil ditambahkan atau dihapus
            header("Location: index.php");
            exit();
        } else {
            // Jika buku dengan ID tertentu tidak ditemukan, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
            echo "Buku dengan ID $bukuid tidak ditemukan.";
            exit();
        }
    }
}
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
                <input class="form-control me-2" type="search" placeholder="Cari Buku.." aria-label="Search" id="searchInput" style="width: 500px;">
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
                    <?php while($rew=mysqli_fetch_assoc($result2)):?>
                    <div class="card searchable" style="width: 270px; margin-left: 50px; margin-top: 20px;">
                        <img src="../asset/<?= $rew['foto'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <b><h6><?= $rew['judul']; ?></h6></b>
                            <p>Penulis: <?= $rew['penulis']; ?></p>
                            <p>Stok Buku: <?= $rew['stok']; ?></p>
                            <?php 
                                $iduser = $_SESSION['id'];
                                $bukuid = $rew['buku_id'];
                                $sql = "SELECT * FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND user = '$iduser' AND buku='$bukuid' ";
                                $result = mysqli_query($koneksi,$sql);
                                if(mysqli_num_rows($result) > 0){
                            ?>
                            <a href="proses/proses_pengembalian_peminjaman.php?id=<?= $rew['buku_id'] ?>" class="btn btn-sm btn-secondary">
                                Pinjam
                            </a>
                            <?php }else{ ?>
                            <a href="proses/proses_input_peminjaman.php?id=<?= $rew['buku_id'] ?>" class="btn btn-sm btn-primary">
                                Pinjam
                            </a>
                            <?php } ?>
                            <?php
                            // Cek apakah buku sudah ada di koleksi pribadi user
                        $checkQuery = "SELECT * FROM koleksi_pribadi WHERE user = (SELECT id FROM user WHERE username = '$username') AND buku = {$rew['buku_id']}";
                        $checkResult = mysqli_query($koneksi, $checkQuery);

                        if (mysqli_num_rows($checkResult) > 0) :?>
                            <a  style="height:32px;" href="index.php?id=<?=$rew['buku_id'];?>&action=delete" class="btn" onclick="return confirmDelete()">
                            <i class="fa-solid fa-heart d-flex" style="align-items:center;"></i></a>
                        <?php else :?>
                            <a  style="height:32px;" href="index.php?id=<?=$rew['buku_id'];?>&action=add" class="btn">
                            <i class="fa-regular fa-heart d-flex" style="align-items:center;"></i></a>
                            <?php endif; ?>   
                            <a href="sinopsis.php?id=<?=$rew['buku_id'] ?>" class="btn btn-sm" style="background-color:#FE7A36; color:#fff; height:32px;">Detail</a>
                            <a href="ulasan.php?id=<?=$rew['buku_id'] ?>" class="btn btn-sm" style="background-color:green; color:#fff; height:32px;">Ulasan</a>                                        
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
<script>
  $(document).ready(function(){
        // Add an input event listener to the search input
        $("#searchInput").on("input", function() {
            let searchTerm = $(this).val().toLowerCase(); // Get the value of the input and convert to lowercase

            // Keep track if any results are found
            let resultsFound = false;

            // Loop through each searchable card
            $(".searchable").each(function() {
                let cardText = $(this).text().toLowerCase(); // Get the text content of the card and convert to lowercase

                // Check if the card text contains the search term
                if (cardText.includes(searchTerm)) {
                    $(this).show(); // If yes, show the card
                    resultsFound = true; // Mark that results are found
                } else {
                    $(this).hide(); // If no, hide the card
                }
            });

            // Show/hide the no results message based on resultsFound
            if (resultsFound) {
                $("#noResultsMessage").hide();
            } else {
                $("#noResultsMessage").show();
            }
      });
   });
</script>
</body>
</html>
