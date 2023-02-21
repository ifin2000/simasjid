<?php
$dbName = 'db_simasjid'; // nama database
$dbUser = 'root';
$dbPass = '123456';
$dst = ''; //Untuk folder simpan album
$db_link=mysqli_connect('localhost',$dbUser,$dbPass,$dbName);
if (!$db_link){
	echo 'Tidak dapat terhubung ke database';
}
?>
