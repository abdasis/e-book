<?php
// host yang digunakan
$host = 'localhost'; 
 
// username untuk login ke host
$user = 'root'; 
 
// secara default password dikosongkan
$pass = 'abdasis';
 
// isikan nama database sesuai database yang akan digunakan
$dbname = 'siplab';
 
// mengubung ke host
$connect = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error());
 
// memilih database yang akan digunakan
?>