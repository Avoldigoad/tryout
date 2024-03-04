<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori = $_POST['kategori'];
    $cover = $_FILES['cover'];
    $pdf = $_FILES['pdf'];
    $stok = $_POST['stok'];

    // Query Untuk mengambil data lama
    $sql = "SELECT * FROM buku WHERE id = $user";
    $result = mysqli_query($koneksi, $sql);
    $fetchData = mysqli_fetch_assoc($result);
    $gambarLama = $fetchData['foto'];
    $pdfLama = $fetchData['pdf'];

    if (!empty($judul) && !empty($penulis) && !empty($penerbit) && !empty($tahun_terbit) && !empty($sinopsis) && !empty($kategori) && !empty($stok)) {

        // Jika ada file cover yang diunggah
    if (!empty($cover['name'])) {
    // Mengunggah foto baru
        $targetDirCover = "../asset/"; // Direktori penyimpanan foto baru
        $targetFileCover = $targetDirCover . basename($_FILES["cover"]["name"]);
        move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFileCover);
        $fotoBaru = basename($_FILES["cover"]["name"]); // Hanya menyimpan nama file
    } else {
    // Jika tidak ada file cover yang diunggah, gunakan gambar lama
        $fotoBaru = $gambarLama;
    }

    // Jika ada file PDF yang diunggah
    if (!empty($pdf['name'])) {
    // Mengunggah file PDF baru
        $targetDirPdf = "../asset/"; // Direktori penyimpanan file PDF baru
        $targetFilePdf = $targetDirPdf . basename($_FILES["pdf"]["name"]);
        move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetFilePdf);
        $pdfBaru = basename($_FILES["pdf"]["name"]); // Hanya menyimpan nama file
    } else {
    // Jika tidak ada file PDF yang diunggah, gunakan PDF lama
        $pdfBaru = $pdfLama;
    }

        // Mengupdate data buku
        $updateSql = "UPDATE buku SET foto = '$fotoBaru', pdf = '$pdfBaru', judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', sinopsis = '$sinopsis', kategori_id = '$kategori', stok = '$stok' WHERE id = $user";

        if (mysqli_query($koneksi, $updateSql)) {
            echo "updated successfully!";
            header("Location: ../buku.php");
            exit();
        } else {
            echo "Error updating: " . mysqli_error($koneksi);
        }
    } else {
        echo "Semua field harus diisi";
    }
} else {
    exit();
}
?>