<?php
include "../koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST["buku"];
    $id_user = $_POST["nama"];
    $rating = $_POST["rating"];
    $ulasan = $_POST["ulasan"];
    if ($rating > 5) {
        header("Location: input_ulasan.php?error=Rating tidak boleh melebihi 5");
        exit();
    }
    $query = "INSERT INTO ulasan_buku (buku, user, rating, ulasan) VALUES ('$id_buku', '$id_user', '$rating', '$ulasan')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../admin/ulasan.php");
        exit();
    } else {
        header("Location: index.php?error=Gagal menyimpan ulasan");
        exit();
    }
} else {
    header("Location: ../admin/ulasan.php");
    exit();
}