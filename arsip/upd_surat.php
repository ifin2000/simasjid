<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$var = $_POST['kode'];
$tgl = date('Y-m-d H:i:s');
$notes = $_POST['keterangan'];
$konten = $_POST['konten'];
if (($notes=='') || ($konten=='')){ 
    ("Location: ../dashboard.php?pages=datasurat&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update persuratan set keterangan='$notes',isi_surat='$konten' where id='$var'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=datasurat&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=datasurat&hasil=pesangagal1");
    }
}
?> 