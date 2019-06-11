<?php 
include('config.php');

$kd_jadwal = $_GET['kd_jadwal'];

$query = mysql_query("delete from jadwal_lab where kd_jadwal ='$kd_jadwal'") or die(mysql_error());

if ($query) {
	header('location:dashboard.php?msg=success');
} else {
	header('location:dashboard.php?msg=failed');
}
?>