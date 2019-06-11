<?php 
include('config.php');

$kdmatkul = $_GET['kdmatkul'];

$query = mysql_query("delete from mata_kuliah where kd_matakuliah ='$kdmatkul'") or die(mysql_error());

if ($query) {
	header('location:matkul.php?msg=success');
} else {
	header('location:matkul.php?msg=failed');
}
?>