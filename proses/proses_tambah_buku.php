<?php
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $perpustakaan = $_POST['perpustakaan'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $cover = $_FILES["cover"];
    $pdf = $_FILES["pdf"];

    // Lakukan validasi dan penambahan buku
    if (!empty($judul) && !empty($penulis) && !empty($penerbit) && !empty($tahun_terbit) && !empty($kategori) && !empty($stok) && !empty($cover) && !empty($pdf)) {
        // Memeriksa ekstensi file cover
        $allowedImageExtensions = array("jpg", "jpeg", "png", "svg");
        $imageFileExtension = strtolower(pathinfo($cover["name"], PATHINFO_EXTENSION));

        // Memeriksa ekstensi file PDF
        $allowedPdfExtensions = array("pdf");
        $pdfFileExtension = strtolower(pathinfo($pdf["name"], PATHINFO_EXTENSION));

        if (in_array($imageFileExtension, $allowedImageExtensions) && in_array($pdfFileExtension, $allowedPdfExtensions)) {
            // Mengunggah foto dan file PDF jika ekstensinya valid
            $targetDir = "../asset/";
            $coverFileName = uniqid() . '.' . $imageFileExtension; // Menyimpan nama unik file cover untuk menghindari tumpang tindih nama
            $pdfFileName = uniqid() . '.' . $pdfFileExtension; // Menyimpan nama unik file PDF untuk menghindari tumpang tindih nama
            $coverTargetFile = $targetDir . $coverFileName;
            $pdfTargetFile = $targetDir . $pdfFileName;

            if (move_uploaded_file($cover["tmp_name"], $coverTargetFile) && move_uploaded_file($pdf["tmp_name"], $pdfTargetFile)) {
                // Query untuk menambahkan buku ke dalam database
                $add_book_query = "INSERT INTO buku (perpus_id, foto, judul, penulis, penerbit, tahun_terbit, sinopsis, kategori_id, stok, pdf)
                                   VALUES ('". mysqli_real_escape_string($koneksi, $perpustakaan) ."', '$coverFileName', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$sinopsis', '$kategori', '$stok', '$pdfFileName')";
                // Eksekusi query dan tampilkan pesan sukses atau error
                if (mysqli_query($koneksi, $add_book_query)) {
                    $success_message = "Buku berhasil ditambahkan.";
                    // Redirect to the desired page after successful insertion
                    header("location:../admin/buku.php");
                    exit; // Exit the script after redirection
                } else {
                    $error_message = "Error: " . mysqli_error($koneksi);
                }
            } else {
                $error_message = "Maaf, terjadi kesalahan saat mengunggah gambar atau file PDF.";
            }
        } else {
            $error_message = "Hanya file gambar dengan ekstensi .jpg, .jpeg, .png, atau .svg dan file PDF yang diperbolehkan.";
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
}
?>