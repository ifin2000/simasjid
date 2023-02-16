<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$var = $_POST['kode'];
$tgl = $_POST['tgl'];
$lokasi = $_POST['lokasi'];
$pengundang = $_POST['pengundang'];
$hadir = $_POST['hadir'];
$konten = $_POST['konten'];
if (empty($tgl) && ($konten=='')){ 
    ("Location: ../dashboard.php?pages=notulen&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update notulen_rapat set waktu='$tgl',lokasi='$lokasi',pengundang='$pengundang',kehadiran='$hadir',bahasan='$konten' where id='$var'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=notulen&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=notulen&hasil=pesangagal1");
    }
}
?> 