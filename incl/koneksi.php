<?php
$dbName = 'db_almadinah'; // nama database
$dbUser = 'root';
$dbPass = 'Br0w34y0w15b3n';
$dst = ''; //Untuk folder simpan album
$db_link=mysqli_connect('localhost',$dbUser,$dbPass,$dbName);
if (!$db_link){
	echo 'Tidak dapat terhubung ke database';
}
?>