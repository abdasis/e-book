<?php 
include('config.php');

$idlab = $_GET['idlab'];

$query = mysql_query("delete from ruang_lab where id_lab ='$idlab'") or die(mysql_error());

if ($query) {
	header('location:ruang.php?msg=success');
} else {
	header('location:ruang.php?msg=failed');
}
?>