<?php
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kategori = $_POST['kategori'];

    $sql = "INSERT INTO kategori_buku (nama_kategori) VALUES ('$kategori')";

    if(mysqli_query($koneksi, $sql)){
        header("location:../admin/kategori.php");
    }else{
        echo "ERROR: ". $query . "<br>" . mysqli_error(($koneksi));
    }
    mysqli_close($koneksi);
}
?>  