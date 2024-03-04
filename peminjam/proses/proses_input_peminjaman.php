<?php
session_start();

include '../../koneksi.php';
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Tolong login terlebih dahulu'); window.location.href = '../login.php';</script>";
    exit();
}

// Mengonversi ID pengguna ke tipe data integer
$userId = (int)$_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $bookId = $_GET['id'];

    $perpustakaan = '1';
    // Masukkan tanggal peminjaman (hari ini)
    $tanggalPeminjaman = date('Y-m-d');

    // Tambahkan 2 hari ke tanggal peminjaman untuk mendapatkan tanggal pengembalian
    $tanggalPengembalian = date('Y-m-d', strtotime($tanggalPeminjaman . ' +2 days'));

    // Cek apakah buku sudah pernah dipinjam oleh pengguna sebelumnya
    $checkPeminjamanQuery = "SELECT * FROM peminjaman WHERE user = $userId AND buku = $bookId AND status_peminjaman = 'Dipinjam'";
    $checkPeminjamanResult = mysqli_query($koneksi, $checkPeminjamanQuery);

    if (mysqli_num_rows($checkPeminjamanResult) >= 2) {
        // Jika buku sudah dipinjam lebih dari dua kali oleh pengguna, beri pesan kesalahan
        echo "Anda sudah meminjam buku ini sebanyak tiga kali.";
        exit();
    }

    // Cek stok buku sebelum melakukan peminjaman
    $getBookQuery = "SELECT stok FROM buku WHERE id = $bookId";
    $getBookResult = mysqli_query($koneksi, $getBookQuery);

    if ($getBookResult) {
        $bookData = mysqli_fetch_assoc($getBookResult);
        $stok = $bookData['stok'];

        // Pastikan stok mencukupi sebelum melakukan peminjaman
        if ($stok > 0) {
            // Masukkan entri baru ke dalam tabel peminjaman
            $insertPeminjamanQuery = "INSERT INTO peminjaman (perpus_id, user, buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman, created_at) VALUES ('$perpustakaan','$userId', '$bookId', '$tanggalPeminjaman', '$tanggalPengembalian', 'Dipinjam', now())";
            $resultpeminjaman = mysqli_query($koneksi, $insertPeminjamanQuery);

            if ($resultpeminjaman) {
                // Kurangi stok buku karena peminjaman berhasil
                $updateStokQuery = "UPDATE buku SET stok = stok - 1 WHERE id = $bookId";
                mysqli_query($koneksi, $updateStokQuery);

                // Peminjaman berhasil
                header("Location: ../index.php");
                exit();
            } else {
                // Jika terjadi kesalahan saat melakukan peminjaman, tampilkan pesan kesalahan
                echo "Error: " . $insertPeminjamanQuery . "<br>" . mysqli_error($koneksi);
            }
        } else {
            // Jika stok buku tidak mencukupi
            echo "Stok buku tidak mencukupi.";
        }
    } else {
        // Jika gagal mengambil data buku
        echo "Gagal mengambil data buku.";
    }
}
?>