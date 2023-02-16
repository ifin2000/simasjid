<?php 
session_start();
include('incl/koneksi.php');
$login = $_GET['log'];
$kini = date('Y-m-d H:i:s');
$asal = $_SERVER["REMOTE_ADDR"];
mysqli_query($db_link,"insert into log values('$login','$kini','$asal','keluar')");	
//mysqli_query($db_link,"update user set notes='' where login='$login'");	
session_unset(); session_destroy(); 
header ("Location: index.php?hasil=sukseslogout");
?>