<?php
 
 
include"fpdf181/fpdf.php"; //panggil file fpdf
include('config.php');
 
 //Header untuk tabel simpan di array
$header = array( 
	array("label"=>"No", "length"=>10, "align"=>"C"), //C untuk posisi text (center)
	array("label"=>"Hari", "length"=>20, "align"=>"C"),
	array("label"=>"Praktikum", "length"=>65, "align"=>"C"),
	array("label"=>"Jam Awal", "length"=>25, "align"=>"C"),
	array("label"=>"Jam Akhir", "length"=>25, "align"=>"C"),
	array("label"=>"Ruang", "length"=>44, "align"=>"C")

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
$pdf->Cell(0, 0, 'JADWAL MENGAJAR MATAKULIAH PRAKTIKUM', 0, '0', "C", false);
$pdf->Ln(); 
$pdf->Cell(0, 15, 'PROGRAM STUDI TEKNIK INFORMATIKA dan SISTEM INFORMASI', 0, '0', "C", false);
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

$jadwal = mysql_query("SELECT * FROM jadwal_lab ORDER BY kd_jadwal");
while( $data = mysql_fetch_array($jadwal)){
	$i = 0; 
	$pdf->Cell($header[$i]['length'], 8, $no.'.', 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['hari'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['nama_matkul'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['jam_awal'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['jam_akhir'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['ruang'], 1, '0','C', $fill); 
	$no++;

	
	$fill = !$fill; 
	$pdf->Ln();
}

$pdf->Ln(); 
 
$header = array( 
	array("label"=>"Kelas", "length"=>15, "align"=>"C"),
	array("label"=>"Dosen Pengampu", "length"=>60, "align"=>"C"),
	array("label"=>"Asdos 1", "length"=>40, "align"=>"C"),
	array("label"=>"Asdos 2", "length"=>40, "align"=>"C")

);

$pdf2 = new FPDF;
 
// Menambahkan halaman baru
$pdf2->AddPage(); 
 
// set margin top
$pdf->SetLeftMargin(27);
 
// set font
$pdf->SetFont('Arial','B','10'); 
 
// set background tabel
$pdf->SetFillColor(207,223,233);
 
// set warna text
$pdf->SetTextColor(000); 
 
// Set warna garis
$pdf->SetDrawColor(000);
 
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

$jadwal = mysql_query("SELECT * FROM jadwal_lab ORDER BY kd_jadwal");
while( $data = mysql_fetch_array($jadwal)){
	$i = 0; 
	$pdf->Cell($header[$i]['length'], 8, $data['kelas'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['dosen_pengampu'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['asdos'], 1, '0','C', $fill); 
	$i++;
	$pdf->Cell($header[$i]['length'], 8, $data['asdos2'], 1, '0','C', $fill); 
	$no++;

	
	$fill = !$fill; 
	$pdf->Ln();
}

$pdf->Output('Data Jadwal Lab Komputer.pdf','i'); // menampilkan di browser

 
?>
