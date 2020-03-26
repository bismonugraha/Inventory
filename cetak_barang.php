<?php
@session_start();
include 'security.php';
require('phpfpdf/fpdf.php'); {
    date_default_timezone_set('Asia/Jakarta'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
}
require_once 'koneksi.php';


$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
// Header
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(19.5, 1, 'Laporan Stok Barang', 0, 'C');
$pdf->SetX(2.8);
$pdf->SetFont('Times', '', 10);
$pdf->MultiCell(15.5, 0.5, 'Jl Magelang Km 4,5 (Sebelah SPBU Sinduadi), Mlati Sleman, DI Yogyakarta 55284, Indonesia', 0, 'C');
$pdf->SetX(2.8);
$pdf->MultiCell(15.5, 0.3, 'Kontak: 081239982938', 0, 'C');

$pdf->Line(0.5, 3.8, 20.5, 3.8);
$pdf->SetLineWidth(0.1);
$pdf->Line(0.5, 3.9, 20.5, 3.9);
$pdf->SetLineWidth(0.1);
$pdf->Ln();
// End header
// Format Tanggal
$pdf->SetFont('Times', 'B', 8);
$pdf->SetLineWidth(0);
$pdf->Cell(1.5, 1, "Printed By : " . $_SESSION['nama_lengkap'], 0, 0, 'C');

$pdf->SetFont('Times', 'B', 8);
$pdf->SetLineWidth(0);
$pdf->Cell(31.5, 1, "Printed On : " . date("D-d/m/Y H:i:s"), 0, 0, 'C');
$pdf->Ln();

// Tabel
$pdf->SetFont('Times', 'B', 8);
$pdf->SetLineWidth(0);
$pdf->Cell(0.5, 1, '', 0, 1);
$pdf->Cell(0.8, 1, 'NO', 1, 0, 'C');
$pdf->Cell(5, 1, 'KODE BARANG', 1, 0, 'C');
$pdf->Cell(7, 1, 'NAMA BARANG', 1, 0, 'C');
$pdf->Cell(2.8, 1, 'JENIS BARANG', 1, 0, 'C');
$pdf->Cell(3.5, 1, 'STOK', 1, 1, 'C');

// Isi Data di tabel
$query = mysqli_query($koneksi, "SELECT * FROM barang");
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $pdf->SetFont('Times', '', 8);
    $pdf->Cell(0.8, 1, $no++, 1, 0, 'C');
    $pdf->Cell(5, 1, $row['kode_barang'], 1, 0, 'C');
    $pdf->Cell(7, 1, $row['nama_barang'], 1, 0, 'C');
    $pdf->Cell(2.8, 1, $row['jenis_barang'], 1, 0, 'C');
    $pdf->Cell(3.5, 1, $row['stok'], 1, 1, 'C');
}

$pdf->SetFont('Times', 'B', 8);
$pdf->SetLineWidth(0);
$pdf->Cell(32.5, 1, "Yogyakarta, ................................................", 0, 0, 'C');
$pdf->Ln();

$pdf->SetFont('Times', 'B', 8);
$pdf->SetLineWidth(0);
$pdf->Cell(32.5, 5, "(Admin)", 0, 0, 'C');
$pdf->Ln();
$pdf->Output();
