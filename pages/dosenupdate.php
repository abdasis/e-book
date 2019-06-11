<?php
include('config.php');

//tangkap data dari form
$nipz = $_POST['nip'];
$namadosenz = $_POST['nama_dosen'];
$alamatdosenz = $_POST['alamat_dosen'];
$statusdosenz = $_POST['status_dosen'];

//update data di database sesuai nip
$query = mysql_query("update dosen set nama_dosen='$nipz', nama_dosen='$namadosenz', alamat_dosen='$alamatdosenz', status_dosen='$statusdosenz' where nip='$nipz'") or die(mysql_error());

if ($query) {
	header('location:dosen.php?msg=success');
} else {
	header('location:dosenedit.php?msg=failed');
}
?>