<?php
include('config.php');

//tangkap data dari form
$kd_jadwalz = $_POST['kd_jadwal'];
$nama_matkulz = $_POST['nama_matkul'];
$hariz = $_POST['hari'];
$jam_awalz = $_POST['jam_awal'];
$jam_akhirz = $_POST['jam_akhir'];
$ruangz = $_POST['ruang'];
$kelasz = $_POST['kelas'];
$dosen_pengampuz = $_POST['dosen_pengampu'];
$asdosz = $_POST['asdos'];
$asdos2z = $_POST['asdos2'];

//update data di database sesuai kd_jadwal
$query = mysql_query("update jadwal_lab set kd_jadwal='$kd_jadwalz', nama_matkul='$nama_matkulz', hari='$hariz', jam_awal='$jam_awalz', jam_akhir='$jam_akhirz', ruang='$ruangz', kelas='$kelasz', dosen_pengampu='$dosen_pengampuz', asdos='$asdosz', asdos2='$asdos2z' where kd_jadwal='$kd_jadwalz'") or die(mysql_error());

if ($query) {
	header('location:jadwal.php?msg=success');
} else {
	header('location:jadwaledit.php?msg=failed');
}
?>