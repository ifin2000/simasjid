<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$header = $_POST['header'];
$footer = $_POST['footer'];
include ('../incl/koneksi.php');
$resukt = mysqli_query($db_link,"update format_surat set header='$header', footer='$footer'");
if ($resukt) {
    header("Location: ../dashboard.php?pages=formsurat&hasil=pesansukses2");
} else {
	 header("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal1");
}
?> 