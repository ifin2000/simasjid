<?php
$dbName = 'db_yayasan'; // nama database
$dbUser = 'user';
$dbPass = 'password';
$dst = ''; //Untuk folder simpan album
$db_link=mysqli_connect('localhost',$dbUser,$dbPass,$dbName);
if (!$db_link){
	echo 'Tidak dapat terhubung ke database';
}
?>
