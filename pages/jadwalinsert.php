<?php 
include_once('config.php');

// terima data dari halaman daftar.php
$kd_jadwal  = mysql_real_escape_string($_POST['kd_jadwal']);
$nama_matkul   = mysql_real_escape_string($_POST['nama_matkul']);
$hari   = mysql_real_escape_string($_POST['hari']);
$jam_awal    = mysql_real_escape_string($_POST['jam_awal']);
$jam_akhir    = mysql_real_escape_string($_POST['jam_akhir']);
$ruang   = mysql_real_escape_string($_POST['ruang']);
$kelas   = mysql_real_escape_string($_POST['kelas']);
$dosen_pengampu    = mysql_real_escape_string($_POST['dosen_pengampu']);
$asdos    = mysql_real_escape_string($_POST['asdos']);
$asdos2    = mysql_real_escape_string($_POST['asdos2']);

// simpan data ke database
$query = mysql_query("insert into jadwal_lab values('$kd_jadwal','$nama_matkul', '$hari', '$jam_awal', '$jam_akhir', '$ruang','$kelas','$dosen_pengampu','$asdos','$asdos2')");

if ($query) {
  // jika berhasil menyimpan
  header('location: jadwal.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: jadwal.php?msg=failed');
}
?>