<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$ide = $_POST['kode'];
$nama = $_POST['judul'];
$jenis = $_POST['jenis'];
$konten = $_POST['konten'];
$owner = $_POST['owner'];
if (($nama=='') OR ($jenis=='') OR ($konten=='')){ 
    ("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update template_surat set nama='$nama',jenis='$jenis',konten='$konten' where id='$ide'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=formsurat&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal1");
    }
}
?> 