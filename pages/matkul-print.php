<?php
 
 
include"fpdf181/fpdf.php"; //panggil file fpdf
include('config.php');
 
 //Header untuk tabel simpan di array
$header = array( 
	array("label"=>"No", "length"=>10, "align"=>"C"), //C untuk posisi text (center)
	array("label"=>"Kode Mata Kuliah", "length"=>40, "align"=>"C"),
	array("label"=>"Nama Mata Kuliah", "length"=>88, "align"=>"C"),
	array("label"=>"Semester", "length"=>30, "align"=>"C"),
	array("label"=>"SKS", "length"=>20, "align"=>"C")
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
$pdf->Cell(0, 15, 'DATA MATA KULIAH', 0, '0', "C", false);

 
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

$matkul = mysql_query("SELECT * FROM mata_kuliah ORDER BY kd_matakuliah");
while( $data = mysql_fetch_array($matkul)){
	$i = 0; 
	$pdf->Cell($header[$i]['length'], 8, $no.'.', 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['kd_matakuliah'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['nama_matakuliah'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['semester'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['sks'], 1, '0','C', $fill); 
	$no++;

	
	$fill = !$fill; 
	$pdf->Ln();
}

$pdf->Ln(); 

$pdf->Output('Data Jadwal Lab Komputer.pdf','i'); // menampilkan di browser

 
?>
