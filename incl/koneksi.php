<?php
$dbName = 'db_simasjid'; // nama database
$dbUser = 'user_anda';
$dbPass = 'password_anda';
$dst = ''; //Untuk folder simpan album
$db_link=mysqli_connect('localhost',$dbUser,$dbPass,$dbName);
if (!$db_link){
	echo 'Tidak dapat terhubung ke database';
}
?>
