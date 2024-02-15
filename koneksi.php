<?php
$dbhost= 'localhost';
$dbuser= 'root';
$dbpass= '';
$dbname= 'perpustakaan';
$koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($koneksi->connect_error)
{
die( 'koneksi gagal : '. $koneksi->connect_error );
}
?>