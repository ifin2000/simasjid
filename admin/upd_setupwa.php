<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$nowa = $_POST['nowa'];
//$ipsrv = $_POST['ipsrv'];
//$apikey = $_POST['apikey'];
$header = $_POST['header'];
$footer = $_POST['footer'];

include ('../incl/koneksi.php');
$resukt = mysqli_query($db_link,"update setup_wablast set header='$header',footer='$footer' where nomor='$nowa'");
if ($resukt) {
    header("Location: ../dashboard.php?pages=setwablast&hasil=pesansukses2");
} else {
	 header("Location: ../dashboard.php?pages=setwablast&hasil=pesangagal1");
}
?> 