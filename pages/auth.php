<?php
include('config.php');

session_start();

// terima data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = $username;
$password = $password;

// cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	// kalau username dan password kosong
	header('location:login.php?error=1');
} else if (empty($username)) {
	// kalau username saja yang kosong
	header('location:login.php?error=2');
} else if (empty($password)) {
	// kalau password saja yang kosong
	header('location:login.php?error=3');
}

$query = mysqli_query("select * from users where username='$username' and password='$password'");

$data = mysql_fetch_array($query);

if(mysql_num_rows($query)==1){//jika berhasil akan bernilai 1

$_SESSION['username'] = $data['username'];
$_SESSION['role'] = $data['role'];

if($data['role']=='admin'){
		header('location:index.php');
}
	else if($data['role']=='member'){
		header('location:index.php');
	}
}
 else {
	// kalau username ataupun password tidak terdaftar di database
	header('location:login.php?error=4');
}
?>