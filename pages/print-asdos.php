<?php
 
 
include"fpdf181/fpdf.php"; //panggil file fpdf
include('config.php');
 
 //Header untuk tabel simpan di array
$header = array( 
	array("label"=>"No", "length"=>10, "align"=>"C"), //C untuk posisi text (center)
	array("label"=>"NPM", "length"=>40, "align"=>"C"),
	array("label"=>"Nama Asdos", "length"=>68, "align"=>"C"),
	array("label"=>"Semester", "length"=>30, "align"=>"C"),
	array("label"=>"NO. HP", "length"=>40, "align"=>"C")
);
 
$pdf = new FPDF;
 
// Menambahkan halaman baru
$pdf->AddPage(); 
 
// set margin top
$pdf->SetLeftMargin(10);
 
// set font
$pdf->SetFont('Arial','B','10'); 
 
// set background tabel
$pdf->SetFillColor(207,223,233);
 
// set warna text
$pdf->SetTextColor(000); 
 
// Set warna garis
$pdf->SetDrawColor(000);
 
// Judul Dokumen Tulis Disini
$pdf->Cell(0, 15, 'DATA ASISTEN DOSEN', 0, '0', "C", false);

 
// turun kebawah
$pdf->Ln(); 
 
//Header 
foreach ($header as $kolom) { 
	$pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true); 
} 
 
 
$pdf->Ln();
 
//tampilkan datanya
$pdf->SetFillColor(224,235,255);
$pdf->SetFont('Arial','','10'); 
 
$fill 	= false; 
$no		= 1;
 
# Query ke Database, ambil data dan sesuaikan dengan header

$dosen = mysql_query("SELECT * FROM asdos ORDER BY npm");
while( $data = mysql_fetch_array($dosen)){
	$i = 0; 
	$pdf->Cell($header[$i]['length'], 8, $no.'.', 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['npm'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['nama_asdos'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['semester'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['no_hp'], 1, '0','C', $fill); 
	$no++;

	
	$fill = !$fill; 
	$pdf->Ln();
}

$pdf->Ln(); 

$pdf->Output('Data Jadwal Lab Komputer.pdf','i'); // menampilkan di browser

 
?>
