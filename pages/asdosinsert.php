<?php 
include_once('config.php');

// terima data dari halaman daftar.php
$npm   = mysql_real_escape_string($_POST['npm']);
$nama_asdos   = mysql_real_escape_string($_POST['nama_asdos']);
$semester    = mysql_real_escape_string($_POST['semester']);
$no_hp    = mysql_real_escape_string($_POST['no_hp']);

// simpan data ke database
$query = mysql_query("insert into asdos values('$npm', '$nama_asdos','$semester', '$no_hp')");

if ($query) {
  // jika berhasil menyimpan
  header('location: asdos.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: asdos.php?msg=failed');
}
?>