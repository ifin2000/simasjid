<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
$login = $_SESSION['nama'];
$tgl = date('Y-m-d H:i:s');
$notes = $_POST['keterangan'];
$jenis = "Surat ".$_POST['jenis'];
$jabatan = $_POST['jabat'];
$nosur = $_POST['nosur1'].'/'.$_POST['nosur3'].'/'.$_POST['nosur4'].'/'.$_POST['nosur5'].'/'.$_POST['nosur6'];
$konten = $_POST['header'].'\n\r\n\r'.$_POST['konten'].'\n\r\n\r'.$_POST['footer'];
if (($notes=='') || ($_POST['konten']=='')){ 
    ("Location: ../dashboard.php?pages=buatsurat&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resolt = mysqli_query($db_link,"select a.nama from pengurus a,users b where b.user='$login' and a.id=b.id");
    $dato = mysqli_fetch_array($resolt);
    $owner = $dato['nama'];
    $resukt = mysqli_query($db_link,"insert into persuratan values('0','$tgl','$notes','$jenis','$nosur','$konten','$owner','')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=buatsurat&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=buatsurat&hasil=pesangagal1");
    }
}
?> 