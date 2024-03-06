# Perpustakaan Digital

Perpustakaan digital ini adalah aplikasi sederhana yang memungkinkan pengguna untuk melakukan peminjaman dan pengembalian buku secara online, bukunya pun digital. Aplikasi ini dibangun menggunakan PHP dan MySQL.

## Fitur

- Peminjaman buku
- Pengembalian buku
- Favorit Buku
- Ulasan Buku
- Baca Buku
- Generate Laporan peminjam
- Manajemen data buku, pengguna, dan peminjaman
- Hak akses berbeda untuk admin,petugas dan peminjam

## Instalasi

1. Clone repositori ini ke dalam direktori.
2. Impor file `database.sql` ke dalam database MySQL.
3. Edit file `koneksi.php` dan sesuaikan konfigurasi database.
4. Buka aplikasi melalui browser Anda.

## Penggunaan

1. Login sebagai admin (username: idon, password: 123) atau petugas atau sebagai peminjam.
2. Telusuri katalog buku dan temukan buku yang ingin Anda pinjam.
3. Lakukan peminjaman buku.
4. Pengembalian buku bisa dilakukan melalui admin,petugas maupun peminjam itu sendiri.

## Kelebihan
- Filter pertanggal untuk mencari peminjam
- Search Buku melalui judul

## Kekurangan
- Tidak ada reset password
- Pengembalian buku secara manual tidak otomatis ketika masa pinjam buku sudah habis
- Tampilan kurang menarik

