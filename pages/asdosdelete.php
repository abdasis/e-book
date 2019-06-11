<?php 
include('config.php');

$npm = $_GET['npm'];

$query = mysql_query("delete from asdos where npm='$npm'") or die(mysql_error());

if ($query) {
	header('location:asdos.php?msg=success');
} else {
	header('location:asdos.php?msg=failed');
}
?>