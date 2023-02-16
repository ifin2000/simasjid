<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
$login = $_SESSION['nama'];
$tgl = $_POST['tgl'];
$lokasi = $_POST['lokasi'];
$pengundang = $_POST['pengundang'];
$hadir = $_POST['hadir'];
$konten = $_POST['konten'];
if (empty($tgl) && ($konten=='')){ 
    ("Location: ../dashboard.php?pages=notulen&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resolt = mysqli_query($db_link,"select a.nama from pengurus a,users b where b.user='$login' and a.id=b.id");
    $dato = mysqli_fetch_array($resolt);
    $owner = $dato['nama'];
    $resukt = mysqli_query($db_link,"insert into notulen_rapat values('0','$tgl','$lokasi','$pengundang','$hadir','$konten','$owner')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=notulen&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=notulen&hasil=pesangagal1");
    }
}
?> 