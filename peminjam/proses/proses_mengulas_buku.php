<?php 
include '../../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['user'];
    $buku = $_POST['buku'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    // Validasi rating di sisi server
    if ($rating < 1 || $rating > 5) {
        echo "<script>alert('Rating harus berada dalam kisaran 1 hingga 5.');</script>";
        exit; // Keluar dari skrip jika rating tidak valid
    }

    $sql = "INSERT INTO ulasan_buku (user, buku, ulasan, rating) VALUES ('$user', '$buku', '$ulasan', '$rating')";

    if (mysqli_query($koneksi, $sql)) {
        header("location:../peminjaman.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>