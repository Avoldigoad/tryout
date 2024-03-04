-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2024 pada 13.08
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `perpus_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `created_at`, `stok`, `foto`, `sinopsis`, `pdf`) VALUES
(16, 1, 'Algoritma Mechine Learning dengan Python', 'Dr. Joseph Teguh Santoso', 'YAYASAN PRIMA AGUS TEKNIK', 2022, 8, '2024-03-02 13:45:36', 9, '65e1e4d31a1e9.png', 'Buku ini dibagi menjadi 4 Bab, bab pertama menulis memaparkan bahwa penulis telah mempelajari banyak konsep yang berguna, beberapa konsep yang mungkin membuat Anda sedikit kebingungan. Pembelajaran mesin: ML mengacu pada membuat mesin bekerja lebih baik pada beberapa tugas, menggunakan data yang diberikan. Diantaranya pembelajaran mesin datang dalam berbagai jenis, seperti pembelajaran terawasi, batch, tanpa pengawasan, dan online. Untuk menjalankan proyek ML, mengumpulkan data dalam set pelatihan, lalu mengumpankan set tersebut ke algoritma pembelajaran untuk mendapatkan keluaran, “prediksi”. Jika ingin mendapatkan output yang tepat, sistem harus menggunakan data yang jelas, yang tidak terlalu kecil dan yang tidak memiliki fitur yang tidak relevan. Di bab kedua, mempelajari konsep baru yang berguna dan menerapkan banyak jenis algoritma klasifikasi. Juga konsep baru, seperti: ROC (karakteristik pengoperasian receiver, alat yang digunakan dengan pengklasifikasi biner); Analisis Kesalahan, Cara melatih pengklasifikasi acak menggunakan fungsi Scikit, Memahami Klasifikasi Multi-Output dan multi-Label. Bab ketiga, mempelajari konsep baru, dan mempelajari cara melatih model menggunakan berbagai jenis algoritma, mempelajari kapan harus menggunakan setiap algoritma, termasuk: Penurunan gradien batch, Penurunan gradien mini-batch, Regresi polynomial, Model linier teratur, Regresi punggungan, Regresi Lasso. Bab Terakhir akan membahas tentang algoritma pembelajaran mesin diantaranya regresi linier, kompleksitas komputasi, dan penurunan gradien.', '65e1e4d31a1ec.pdf'),
(17, 1, '101 Kisah Tabi’in ', 'Hepi Andi Baston', 'PUSTAKA AL-KAUTSAR', 2006, 9, '2024-03-02 13:42:50', 5, '65e1e951ca630.png', 'Sejarah Islam mewariskan begitu banyak teladan bercahaya pada peradan manusia ini.Ada Muhammad Rasulullah SAW yang semakin dilecehkan ditimur maupun dibarat', '65e1e951ca632.pdf'),
(18, 1, 'Breaking Dawn (Awal yang Baru)', 'Stephenie Meyer', 'Gramedia', 2020, 10, '2024-03-02 13:42:56', 7, '65e1ea886247b.png', 'Bila kau mencintai orang yang akan membunuhmu, kau tak punya pilihan. Bila nyawamu satu-satunya yang harus kauberikan untuk orang yang kaucintai, bagaimana mungkin\r\nkau tidak memberikannya?', '65e1ea886247e.pdf'),
(19, 1, 'My Hero Academia', 'Kohei Horikoshi', 'M&C', 2020, 11, '2024-03-02 13:44:11', 7, '65e32d2b18ddc.png', 'Di suatu masa saat sebagian besar orang memiliki kekuatan super yang disebut dengan ÒQuirkÓ... Aku, Izuku Midoriya, seorang penggemar ÒHeroÓ yang bercita-cita mengikuti jejak Sang Hero Nomor 1 di Dunia, ÒAll MightÓ, malah divonis tidak bisa memiliki ÒQuirkÓ. Inilah awal ceritaku... menuju Hero nomor 1 di dunia!', '65e32d2b18ddf.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `nama_kategori`, `created_at`) VALUES
(8, 'IT', '2024-03-02 13:46:24'),
(9, 'Islami', '2024-03-01 14:12:53'),
(10, 'Novel', '2024-03-01 14:06:07'),
(11, 'Manga', '2024-03-01 14:06:13'),
(12, 'Bank Soal', '2024-03-01 14:06:30'),
(13, 'Bio Informatis', '2024-03-01 14:06:44'),
(14, 'Buku Mapel', '2024-03-01 14:07:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `perpus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user`, `buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `created_at`, `perpus_id`) VALUES
(12, 32, 16, '2024-02-20', '2024-02-21', 'Dikembalikan', '2024-03-01 15:56:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id` int(11) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perpustakaan`
--

INSERT INTO `perpustakaan` (`id`, `nama_perpus`, `alamat`, `no_tlp`, `created_at`) VALUES
(1, 'Perpus SMKN 1 Banjar', 'SMKN 1 Banjar', '0999022332', '2024-02-12 06:09:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_buku`
--

CREATE TABLE `ulasan_buku` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan_buku`
--

INSERT INTO `ulasan_buku` (`id`, `user`, `buku`, `ulasan`, `rating`, `created_at`) VALUES
(4, 32, 16, 'bagus', 4, '2024-03-02 12:53:39'),
(5, 32, 16, 'bagus', 3, '2024-03-02 12:53:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','petugas','peminjam','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `perpus_id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`, `created_at`) VALUES
(1, 0, 'idon', '$2y$10$lq1QcKRSj.nCNl0fXoh4dO6Wni19p3SSzqmXJMekq/quIkjRD8K22', 'ridwanbanjar1122@gmail.com', 'Ridwan ', 'Pintusinga Banjar', 'admin', '2024-02-23 11:53:52'),
(31, 1, 'cipung', '$2y$10$K9SU4eI8DQ9u69/zQEUW.e1353BYj.iFCLSLS4U3MnKNdPC9wZEtS', 'capung@gmail.com', 'Cipung', 'Banjar', 'petugas', '2024-03-02 12:52:41'),
(32, 1, 'uji', '$2y$10$2FjTJ2u77RFtsw7Xy5KPK.GIVEWOc8jxEwxzO6/P5/e.yWnT12WOe', 'uji@gmail.com', 'Fauzi danar abdul karim', 'Beber', 'peminjam', '2024-03-02 12:52:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
