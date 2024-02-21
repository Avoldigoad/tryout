<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $nama_peminjam = $_POST['nama_lengkap'];
    $buku = $_POST['judul'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status = $_POST['status_peminjaman'];


    // Query untuk mengambil data "Nama Lengkap"
    $sql = "SELECT * FROM user WHERE nama_lengkap='$nama_peminjam'";
    $result = mysqli_query($koneksi, $sql);

    $query = mysqli_fetch_assoc($result);
    $nama_lengkap = $query['id'];


    // Query untuk mengambil data "Judul Buku"
    $sql1 = "SELECT * FROM buku WHERE judul='$buku'";
    $result1 = mysqli_query($koneksi, $sql1);

    $query1 = mysqli_fetch_assoc($result1);
    $buku = $query1['id'];
     

    $updateSql = "UPDATE peminjaman SET user = '$nama_lengkap', buku = '$buku' , tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status' WHERE id = '$user'";

    if (mysqli_query($koneksi, $updateSql)) {
        echo "updated successfully!";
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($koneksi);
    }
} else {
    exit();
}
?>