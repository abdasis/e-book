<?php
include('config.php');

//tangkap data dari form
$kd_matakuliah = $_POST['kd_matakuliah'];
$nama_matakuliah = $_POST['nama_matakuliah'];
$semester = $_POST['semester'];
$sks = $_POST['sks'];

//update data di database sesuai kd_matakuliah
$query = mysql_query("update mata_kuliah set kd_matakuliah ='$kd_matakuliah', nama_matakuliah='$nama_matakuliah', semester='$semester', sks='$sks' where kd_matakuliah='$kd_matakuliah'") or die(mysql_error());

if ($query) {
	header('location:matkul.php?msg=success');
} else {
	header('location:matkul.php?msg=failed');
}
?>