<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $nama_kategori = $_POST['kategori'];

    $updateSql = "UPDATE kategori_buku SET nama_kategori = '$nama_kategori' WHERE id = $user";

    if (mysqli_query($koneksi, $updateSql)) {
        echo "updated successfully!";
        header("Location: ../admin/kategori.php");
        exit(); 
    } else {
        echo "Error updating: " . mysqli_error($koneksi);
    }
} else {
    exit();
}
?>  