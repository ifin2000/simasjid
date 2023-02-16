<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$judul = $_POST['judul'];
$jenis = $_POST['jenis'];
$konten = $_POST['konten'];
$owner = "Sekretaris";
//echo "insert into template_surat values('0','$judul','$jenis','$konten','$owner')";
if (($judul=='') OR ($jenis=='') OR ($konten=='')){ 
    ("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"insert into template_surat values('0','$judul','$jenis','$konten','$owner')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=formsurat&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal1");
    }
}
?> 