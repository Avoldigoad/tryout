<?php 
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perpustakaan = $_POST['perpustakaan'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    // Lakukan validasi dan penambahan buku
    if (!empty($judul) && !empty($penulis) && !empty($penerbit) && !empty($tahun_terbit) && !empty($kategori)) {

            $add_book_query = "INSERT INTO buku (perpus_id, judul, penulis, penerbit, tahun_terbit, kategori_id)
                               VALUES ('$perpustakaan', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$kategori')";

            // Eksekusi query dan tampilkan pesan sukses atau error
            if (mysqli_query($koneksi, $add_book_query)) {
                $success_message = "Buku berhasil ditambahkan.";
                // Redirect to the desired page after successful insertion
                header("location:../admin/buku.php");
                
                exit; // Exit the script after redirection
            } else {
                $error_message = "Error: " . mysqli_error($koneksi);
            }
        }
    } else {
        $error_message = "Semua kolom harus diisi.";
    }
    // Display error message if any
    if (isset($error_message)) {
        echo $error_message;
    }

    // Close the database connection
    mysqli_close($koneksi);

?>