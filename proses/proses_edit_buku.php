<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    $updateSql = "UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', kategori_id = '$kategori' WHERE id = $user";

    if (mysqli_query($koneksi, $updateSql)) {
        echo "updated successfully!";
        header("Location: ../admin/buku.php");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($koneksi);
    }
} else {
    exit();
}
?>