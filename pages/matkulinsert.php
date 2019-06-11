<?php 
include_once('config.php');

// terima data dari halaman daftar.php
$kd_matakuliah   = mysql_real_escape_string($_POST['kd_matakuliah']);
$nama_matakuliah   = mysql_real_escape_string($_POST['nama_matakuliah']);
$semester   = mysql_real_escape_string($_POST['semester']);
$sks    = mysql_real_escape_string($_POST['sks']);

// simpan data ke database
$query = mysql_query("insert into mata_kuliah values('$kd_matakuliah ', '$nama_matakuliah', '$semester', '$sks')");

if ($query) {
  // jika berhasil menyimpan
  header('location: matkul.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: matkul.php?msg=failed');
}
?>