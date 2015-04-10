<?php

$this->fpdf->FPDF("L","cm","A4");
$this->fpdf->SetMargins(1,1,1);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(0,0.7,'Laporan Data Barang',0,0,'C');
$this->fpdf->ln(1);
$this->fpdf->Cell(1, 1, 'NO', 1, 0, 'C');
$this->fpdf->Cell(5, 1, 'Kode Barang', 1, 0, 'C');
$this->fpdf->Cell(6, 1, 'Nama Barang', 1, 0, 'C');
$this->fpdf->Cell(4.5, 1, 'Bahan', 1, 0, 'C');
$this->fpdf->Cell(3, 1, 'Ukuran', 1, 0, 'C');
$this->fpdf->Cell(4.5, 1, 'Harga', 1, 0, 'C');
$this->fpdf->Cell(3, 1, 'Stok', 1, 1, 'C');
$this->fpdf->SetFont('Times','',12);
$i = 1;
foreach($lap as $lapo){
	$this->fpdf->Cell(1, 1, $i, 1, 0, 'C');
$this->fpdf->Cell(5, 1, $lapo->kd_brg, 1, 0, 'C');
$this->fpdf->Cell(6, 1, $lapo->nm_brg, 1, 0, 'C');
$this->fpdf->Cell(4.5, 1, $lapo->bahan, 1, 0, 'C');
$this->fpdf->Cell(3, 1, $lapo->ukuran, 1, 0, 'C');
$this->fpdf->Cell(4.5, 1, $lapo->harga, 1, 0, 'C');
$this->fpdf->Cell(3, 1, $lapo->stok, 1, 1, 'C');
$this->fpdf->SetFont('Times','',12);
$i++;
}

$this->fpdf->Output("laporan_seleksi_calok_atm.pdf","I");