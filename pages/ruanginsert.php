<?php 
include_once('config.php');

// terima data dari halaman daftar.php
$id_lab   = mysql_real_escape_string($_POST['id_lab']);
$nama_lab   = mysql_real_escape_string($_POST['nama_lab']);

// simpan data ke database
$query = mysql_query("insert into ruang_lab values('$id_lab ', '$nama_lab')");

if ($query) {
  // jika berhasil menyimpan
  header('location: ruang.php?msg=success');
} else {
  // jika gagal menyimpan
  header('location: tambah.php?msg=failed');
}
?>