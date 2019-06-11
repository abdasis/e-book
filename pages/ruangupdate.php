<?php
include('config.php');

//tangkap data dari form
$id_lab = $_POST['id_lab'];
$nama_lab = $_POST['nama_lab'];

//update data di database sesuai id_lab
$query = mysql_query("update ruang_lab set id_lab='$id_lab', nama_lab='$nama_lab' where id_lab='$id_lab'") or die(mysql_error());

if ($query) {
	header('location:ruang.php?msg=success');
} else {
	header('location:ruang.php?msg=failed');
}
?>