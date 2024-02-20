<?php
require('../fpdf186/fpdf.php');

class LaporanPDF extends FPDF
{
    // Fungsi untuk membuat header
    function Header()
    {
        // Set font
        $this->SetFont('Arial','B',17);
        // Move to the right
        $this->Cell(80);
        // Title
        $text = "Perpustakaan SMKN 1 BANJAR";
        
        $x = ($this->GetPageWidth() - $this->GetStringWidth($text)) / 2;
        $this->Text($x,20,$text);
        
        $this->SetFont('Arial','B',8);
        
        // Move to the right
        $this->Cell(80);
        $jalan = "JL.KH. Mustofa, Lingk. Parunglesang RT 05 RW 10";
        $jalan1 =  "Kec. Banjar Kel. Banjar Kota Banjar";
        $pos = "46311";

        $y = ($this->GetPageWidth() - $this->GetStringWidth($jalan)) / 2;
        $this->Text($y,26,$jalan);

        $y = ($this->GetPageWidth() - $this->GetStringWidth($jalan1)) / 2;
        $this->Text($y,30,$jalan1);

        $y = ($this->GetPageWidth() - $this->GetStringWidth($pos)) / 2;
        $this->Text($y,34,$pos);

        // Line break
        $this->Ln(30);
    }
    
    // Fungsi untuk membuat footer
    
    
    
    // Fungsi untuk membuat isi laporan
    function IsiLaporan($data)
    {
        // Set font
        $this->SetFont('Arial','',12);
        // Loop through data and add to PDF
        foreach($data as $row) {

            //tabel perpustakaan
            $this->Cell(0, 10, 'Perpustakaan ' . "                : ". $row['perpus_id'], 0, 1);
            
            // tabel pelanggan
            $this->Cell(0, 10, 'Nama Lengkap ' . "              : ". $row['user'], 0, 1);

            // tabel Buku
            $this->Cell(0, 10, 'Buku ' . "                              : ". $row['buku'], 0, 1);

            // tabel tanggal pinjam
            $this->Cell(0, 10, 'Tanggal Peminjaman' . "     : ". $row['tanggal_peminjaman'], 0, 1);

            // tabel tanggal kembali
            $this->Cell(0, 10, 'Tanggal Pengembalian ' . " : ". $row['tanggal_pengembalian'], 0, 1);
            
            // tabel status
            $this->Cell(0, 10, 'Status ' . "                            : ". $row['status_peminjaman'], 0, 1);

        }
    }

    
}
?>