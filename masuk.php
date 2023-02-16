<?php
date_default_timezone_set('asia/jakarta');
// akses ke login database
$login = $_POST['login'];
$password = $_POST['password'];
include ('incl/koneksi.php');
$login = mysqli_real_escape_string($db_link,$login);
$password = mysqli_real_escape_string($db_link,$password);
$password = md5($password);
$recordSet ="select count(*) as ada from users where user='$login' and password='$password'";
$data =  mysqli_query($db_link,$recordSet);
$datarst = mysqli_fetch_array($data);
//$recordSer = "select user,akses from users where notes='masuk'";
//$datarsr = mysqli_query($db_link,$recordSer);
if ($datarst["ada"]!=0){
    aktif($login);
}
/*elseif ($warn=='expired'){
        header ("Location: ../index.php?message=$pesan1");
}
elseif ($recordSet->fields["notes"]=='masuk'){
    header ("Location: ../index.php?message=user ini sudah aktif/login di komputer lain<br/><a href=out_force.php>PAKSA LOGOUT</a>");
}
elseif ($recordSer->fields["alamat"]==$_SERVER["REMOTE_ADDR"]){
    $user_masuk = $recordSer->fields["login"];
    header ("Location: ../index.php?message=komputer ini sudah dipakai <b>$user_masuk</b>, 1 komputer hanya bisa dipakai 1 user login!");
}*/
else {
    header ("Location: index.php?hasil=pesangagal1");
}
//$db->Close();

function aktif($login)
{
  $kini = date('Y-m-d H:i:s');
  $asal = $_SERVER["REMOTE_ADDR"];
  session_start();
  $_SESSION["sesi"] = session_id();
  $_SESSION['nama'] = $login;
  include ('incl/koneksi.php');
  mysqli_query($db_link,"insert into log values('$login','$kini','$asal','masuk')");  
  header ("Location: dashboard.php");
}
?>