<?php 
include_once('config.php');

// terima data dari halaman daftar.php
$nip   = mysql_real_escape_string($_POST['nip']);
$nama_dosen   = mysql_real_escape_string($_POST['nama_dosen']);
$alamat_dosen    = mysql_real_escape_string($_POST['alamat_dosen']);
$status_dosen = mysql_real_escape_string($_POST['status_dosen']);

// simpan data ke database
$query = mysql_query("insert into dosen values('$nip', '$nama_dosen', '$alamat_dosen', '$status_dosen')");

if ($query) {
  // jika berhasil menyimpan
  header('location: dosen.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: dosen.php?msg=failed');
}
?>