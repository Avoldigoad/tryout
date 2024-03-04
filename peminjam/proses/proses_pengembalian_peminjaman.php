<?php
session_start();

include '../../koneksi.php';

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Tolong login terlebih dahulu'); window.location.href = '../login.php';</script>";
    exit();
}

$userId = (int)$_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Periksa apakah buku sudah dipinjam sebelumnya dan masih dalam status 'Dipinjam' oleh pengguna yang sedang login
    $checkPeminjamanQuery = "SELECT * FROM peminjaman WHERE user = $userId AND buku = $bookId AND status_peminjaman = 'Dipinjam'";
    $checkPeminjamanResult = mysqli_query($koneksi, $checkPeminjamanQuery);

    if (mysqli_num_rows($checkPeminjamanResult) > 0) {
        // Jika buku sudah dipinjam oleh pengguna yang sedang login, lanjutkan dengan proses pengembalian
        $tanggalPengembalian = date('Y-m-d');

        // Perbarui status peminjaman menjadi 'Dikembalikan' dan tambahkan tanggal pengembalian
        $updatePeminjamanQuery = "UPDATE peminjaman SET tanggal_pengembalian = '$tanggalPengembalian', status_peminjaman = 'Dikembalikan' WHERE user = $userId AND buku = $bookId AND status_peminjaman = 'Dipinjam'";
        
        if (mysqli_query($koneksi, $updatePeminjamanQuery)) {
            // Jika proses pengembalian berhasil, tambahkan stok buku dengan satu
            $updateStokQuery = "UPDATE buku SET stok = stok + 1 WHERE id = $bookId";
            mysqli_query($koneksi, $updateStokQuery);

            // Pengembalian berhasil, alihkan kembali pengguna ke halaman utama atau berikan pesan konfirmasi
            header("Location: ../index.php");
            exit();
        } else {
            // Jika terjadi kesalahan saat melakukan pengembalian, berikan pesan kesalahan atau tangani sesuai kebutuhan
            echo "Error: " . $updatePeminjamanQuery . "<br>" . mysqli_error($koneksi);
        }
    } else {
        // Jika buku belum dipinjam oleh pengguna yang sedang login, berikan pesan kesalahan atau tangani sesuai kebutuhan
        echo "Buku belum dipinjam oleh Anda.";
        exit();
    }
} else {
    // Jika tidak ada parameter ID buku yang diberikan, alihkan pengguna kembali ke halaman utama atau berikan pesan kesalahan
    header("Location: index.php");
    exit();
}

?>