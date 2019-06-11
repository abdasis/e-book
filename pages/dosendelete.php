<?php 
include('config.php');

$nip = $_GET['nip'];

$query = mysql_query("delete from dosen where nip='$nip'") or die(mysql_error());

if ($query) {
	header('location:dosen.php?msg=success');
} else {
	header('location:dosen.php?msg=failed');
}
?>