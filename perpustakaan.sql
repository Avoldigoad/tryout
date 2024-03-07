-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 02.39
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

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
  `pdf` varchar(255) NOT NULL,
  `hapus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `perpus_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `created_at`, `stok`, `foto`, `sinopsis`, `pdf`, `hapus`) VALUES
(16, 1, 'Algoritma Mechine Learning dengan Python', 'Dr. Joseph Teguh Santoso', 'YAYASAN PRIMA AGUS TEKNIK', 2022, 8, '2024-03-07 00:56:37', 6, '65e1e4d31a1e9.png', 'Buku ini dibagi menjadi 4 Bab, bab pertama menulis memaparkan bahwa penulis telah mempelajari banyak konsep yang berguna, beberapa konsep yang mungkin membuat Anda sedikit kebingungan. Pembelajaran mesin: ML mengacu pada membuat mesin bekerja lebih baik pada beberapa tugas, menggunakan data yang diberikan. Diantaranya pembelajaran mesin datang dalam berbagai jenis, seperti pembelajaran terawasi, batch, tanpa pengawasan, dan online. Untuk menjalankan proyek ML, mengumpulkan data dalam set pelatihan, lalu mengumpankan set tersebut ke algoritma pembelajaran untuk mendapatkan keluaran, “prediksi”. Jika ingin mendapatkan output yang tepat, sistem harus menggunakan data yang jelas, yang tidak terlalu kecil dan yang tidak memiliki fitur yang tidak relevan. Di bab kedua, mempelajari konsep baru yang berguna dan menerapkan banyak jenis algoritma klasifikasi. Juga konsep baru, seperti: ROC (karakteristik pengoperasian receiver, alat yang digunakan dengan pengklasifikasi biner); Analisis Kesalahan, Cara melatih pengklasifikasi acak menggunakan fungsi Scikit, Memahami Klasifikasi Multi-Output dan multi-Label. Bab ketiga, mempelajari konsep baru, dan mempelajari cara melatih model menggunakan berbagai jenis algoritma, mempelajari kapan harus menggunakan setiap algoritma, termasuk: Penurunan gradien batch, Penurunan gradien mini-batch, Regresi polynomial, Model linier teratur, Regresi punggungan, Regresi Lasso. Bab Terakhir akan membahas tentang algoritma pembelajaran mesin diantaranya regresi linier, kompleksitas komputasi, dan penurunan gradien.', '65e1e4d31a1ec.pdf', 0),
(17, 1, '101 Kisah Tabi’in', 'Hepi Andi Baston', 'PUSTAKA AL-KAUTSAR', 2006, 9, '2024-03-05 12:35:11', 3, '65e1e951ca630.png', 'Sejarah Islam mewariskan begitu banyak teladan bercahaya pada peradan manusia ini.Ada Muhammad Rasulullah SAW yang semakin dilecehkan ditimur maupun dibarat', '65e1e951ca632.pdf', 0),
(18, 1, 'Breaking Dawn (Awal yang Baru)', 'Stephenie Meyer', 'Gramedia', 2020, 10, '2024-03-05 23:44:12', 7, '65e1ea886247b.png', 'Bila kau mencintai orang yang akan membunuhmu, kau tak punya pilihan. Bila nyawamu satu-satunya yang harus kauberikan untuk orang yang kaucintai, bagaimana mungkin\r\nkau tidak memberikannya?', '65e1ea886247e.pdf', 0),
(19, 1, 'My Hero Academia', 'Kohei Horikoshi', 'M&C', 2020, 11, '2024-03-07 01:31:49', 6, '65e32d2b18ddc.png', 'Di suatu masa saat sebagian besar orang memiliki kekuatan super yang disebut dengan ÒQuirkÓ... Aku, Izuku Midoriya, seorang penggemar ÒHeroÓ yang bercita-cita mengikuti jejak Sang Hero Nomor 1 di Dunia, ÒAll MightÓ, malah divonis tidak bisa memiliki ÒQuirkÓ. Inilah awal ceritaku... menuju Hero nomor 1 di dunia!', '65e32d2b18ddf.pdf', 1),
(20, 1, 'Complete 1001 Bank Soal Matematika SMA IPA Kelas X,XI,XII', 'Komunitas Tentor Alumni UGM  UNY', 'Bintang Wahyu', 2014, 12, '2024-03-03 16:32:10', 12, '65e4888b7ece2.png', 'Di buku ini terdapat materi-materi singkat yang akan membantu kalian memahami matematika. Dan bank soal yang diambil dari berbagai sumber yang pastinya akan membantu kalian untuk mengerjakan soal-soal.', '65e4888b7ece6.pdf', 0),
(21, 1, 'All About Bioinformatics From Beginner to Expert', 'Yasha Hasija', 'AP', 2023, 13, '2024-03-05 12:56:50', 11, '65e7169288247.png', 'All About Bioinformatics: From Beginner to Expert provides readers with an overview of the fundamentals and advances in the _x001F_field of bioinformatics, as well as some future directions. Each chapter is didactically organized and includes introduction, applications, tools, and future directions to cover the topics thoroughly.', '65e716928824a.pdf', 0),
(22, 1, 'Pintar Matematika MA-SMA', 'Irene Putria', 'Bintang Cendekia Pustaka', 2024, 14, '2024-03-05 13:02:07', 20, '65e717cf59cca.png', 'Buku ini menceritakan tentang berbagai materi-materi Matematika yang sangat luas, dilengkapi dengan pembahasan soal-soal semester 1 dan 2, UASBN, OSN Matematika, tebak tokoh Matematika, ulangan harian, ragam soal dan pembahasan.', '65e717cf59ccd.pdf', 0),
(23, 1, 'Belajar Bahasa Jepang', 'Radio Japan', 'NHK WORLD-JAPAN', 2024, 15, '2024-03-06 00:44:33', 14, '65e719e23464a.png', 'Belajar bahasa jepang ', '65e719e23464d.pdf', 0),
(24, 1, 'Andai Sel-Sel Dalam Tubuhmu Berbicara ', 'Rizal Do', 'Bentang Pustaka', 2022, 16, '2024-03-05 13:18:26', 20, '65e71ba21d256.png', 'Rizal Do, seorang ners dan praktisi healthy lifestyle yang sangat aktif memberikan edukasi kesehatan via media sosial, menjelaskan kinerja tubuh dalam menghadapi berbagai tantangan penyakit lewat kisah kocak, heroik, bahkan pilu tentang perjuangan para sel. Kisah ini menyentil dan menampar, tetapi sangat berharga untuk investasi kesehatan pada masa mendatang. Buku ini siap menantangmu untuk lebih mengenal diri sendiri dan mencintai tubuh dengan pola hidup sehat. Berani mulai sekarang?\r\nAndai sel-sel dalam tubuh bisa bicara, telinga kita pasti menang akan segala kegaduhan dan perang yang terjadi di dalam. Untung saja mereka bekerja keras dalam senyap, sekuat tenaga membuat kita tetap hidup. Walau begitu, terkadang mereka memberi sinyal bahkan red flags jika ada sesuatu yang tak beres. Apakah kamu menyadari itu, atau justru sering abai?\r\nBuku ini dilengkapi juga dengan: Dasar pertolongan pertama, Panduan perawatan kesehatan keluarga, Mekanisme kerja tubuh dengan gaya storytelling unik yang menyentil, Informasi gaya hidup masa kini yang salah dan berbahaya serta solusi untuk mengatasinya, Merupakan buku panduan lengkap untuk lebih mengenali dan merawat tubuh dengan berbagai macam kondisi medis. Buku kesehatan dengan gaya bahasa yang ringan dan sangat mudah dipahami oleh semua kalangan pembaca, sehingga pembaca dapat semakin mengenal tubuhnya dan paham berbagai wawasan pertolongan pertama pada berbagai macam kondisi medis.', '65e71ba21d25a.pdf', 0),
(25, 1, 'Penulisan Karya Tulis Ilmiah', 'Agus Pratomo Andi Widodo, M.Pd', 'ULM', 2020, 17, '2024-03-07 01:36:01', 15, '65e71d63ce346.png', 'Buku pedoman penulisan karya ilmiah untuk lingkup Fakultas Keguruan dan Ilmu Pendidikan, Universitas Lambung Mangkurat Banjarmasin', '65e71d63ce34a.pdf', 1);

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
(13, 'Bioinformatics', '2024-03-05 12:49:45'),
(14, 'Buku Mapel', '2024-03-01 14:07:03'),
(15, 'Belajar Bahasa', '2024-03-05 12:50:03'),
(16, 'Kesehatan', '2024-03-05 12:50:23'),
(17, 'Penulisan Karya Ilmiah', '2024-03-05 13:14:26');

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

--
-- Dumping data untuk tabel `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`id`, `user`, `buku`, `created_at`) VALUES
(16, 32, 23, '2024-03-05 13:35:30'),
(17, 32, 22, '2024-03-05 23:43:59'),
(18, 32, 18, '2024-03-05 23:44:03'),
(20, 32, 16, '2024-03-07 00:57:58'),
(21, 32, 17, '2024-03-07 00:59:38'),
(22, 32, 19, '2024-03-07 00:59:54'),
(23, 32, 21, '2024-03-07 01:00:15');

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
(34, 32, 16, '2024-03-03', '2024-03-05', 'Dikembalikan', '2024-03-03 16:48:42', 1),
(35, 32, 16, '2024-03-03', '2024-03-05', 'Dikembalikan', '2024-03-06 06:36:53', 1),
(36, 32, 17, '2024-03-03', '2024-03-05', 'Dipinjam', '2024-03-03 16:59:00', 1),
(37, 32, 18, '2024-03-05', '2024-03-06', 'Dikembalikan', '2024-03-05 23:44:11', 1),
(38, 32, 19, '2024-03-05', '2024-03-07', 'Dipinjam', '2024-03-05 13:30:05', 1),
(39, 32, 23, '2024-03-05', '2024-03-05', 'Dikembalikan', '2024-03-05 13:35:53', 1),
(40, 32, 23, '2024-03-06', '2024-03-08', 'Dikembalikan', '2024-03-06 06:37:25', 1),
(41, 32, 16, '2024-03-07', '2024-03-09', 'Dipinjam', '2024-03-07 00:56:37', 1);

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
(5, 32, 16, 'bagus', 3, '2024-03-02 12:53:48'),
(8, 0, 0, 'sangat bagus', 5, '2024-03-04 01:38:15'),
(9, 32, 17, 'bagus', 5, '2024-03-04 01:39:44'),
(10, 32, 23, 'Saya sangat suka buku ini', 5, '2024-03-05 13:34:02'),
(11, 32, 16, 'bagus', 5, '2024-03-07 00:57:01');

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
(31, 1, 'adit', '$2y$10$b2Vxci/ECwelqUUe0FIyOOu/39cf8C6wmL4Iq798FMlv7DpMGzJoq', 'Aditkur@gmail.com', 'Adit', 'Banjar', 'petugas', '2024-03-06 01:05:44'),
(32, 1, 'uji', '$2y$10$PXG6hzcmDdM289vMm.aB5et2oXAQaUOucY.z/qX/VyIC/Uzib6DZm', 'uji@gmail.com', 'Fauzi danar ', 'Beber', 'peminjam', '2024-03-06 07:24:24'),
(33, 1, 'nal', '$2y$10$.ExQ5w2GzIofhXR9IkEyLu5/I.IFxFBcmZZjb0d/F4NOF/JwpjdK6', 'jenal23@gmail.com', 'jenal abidin', 'Neglasari', 'peminjam', '2024-03-05 07:04:13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
