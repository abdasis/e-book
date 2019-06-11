<?php
include('config.php');

//tangkap data dari form
$npmz = $_POST['npm'];
$namaasdosz = $_POST['nama_asdos'];
$semesterz = $_POST['semester'];
$nohpz = $_POST['no_hp'];

//update data di database sesuai npm
$query = mysql_query("update asdos set nama_asdos='$npmz', nama_asdos='$namaasdosz', semester='$semesterz', no_hp='$nohpz' where npm='$npmz'") or die(mysql_error());

if ($query) {
	header('location:asdos.php?msg=success');
} else {
	header('location:asdosedit.php?msg=failed');
}
?>