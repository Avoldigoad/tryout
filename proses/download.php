<?php
require('laporan.php');

require("../koneksi.php");

$id = $_GET['id'];

$sql = "SELECT peminjaman.*, user.nama_lengkap, buku.judul, perpustakaan.nama_perpus 
        FROM `peminjaman`  
        INNER JOIN user ON peminjaman.user=user.id 
        INNER JOIN buku ON peminjaman.buku=buku.id 
        INNER JOIN perpustakaan ON peminjaman.perpus_id=perpustakaan.id 
        WHERE peminjaman.id=$id";

$result = mysqli_query($koneksi,$sql);

$data_peminjaman = mysqli_fetch_assoc($result);

// Buat instance dari class LaporanPDF
$pdf = new LaporanPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$heeader = ['adam'];

// Buat data yang akan ditampilkan di laporan

$data = array(
    array(
    'perpus_id' => $data_peminjaman['nama_perpus'],
    'user' => $data_peminjaman['nama_lengkap'],
    'buku' => $data_peminjaman['judul'],
    'tanggal_peminjaman' => $data_peminjaman["tanggal_peminjaman"],
    'tanggal_pengembalian' => $data_peminjaman['tanggal_pengembalian'],
    'status_peminjaman' => $data_peminjaman['status_peminjaman'],
),

);
// Tambahkan isi laporan dengan memanggil fungsi IsiLaporan
$pdf->IsiLaporan($data);

// Output laporan dalam format PDF
$pdf->Output();
?>