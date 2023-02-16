<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$folder = "files/";
$tgl = $_POST['tgl'];
$nobuk = $_POST['nobuk'];
$jenis = explode(' # ',$_POST['kategori']);
$nama = $jenis[1];
$jnstr = $jenis[0];
$notes = $_POST['keterangan'];
$nilai = $_POST['nilai'];
$photnam = date('YmdHi');
if (($nama=='') || ($nilai==0)){ 
    ("Location: ../dashboard.php?pages=entrydana&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"insert into dat_trans values('0','$tgl','$nobuk','$nama','$notes','$nilai','$jnstr','','')");
    // upload file
    $namfile = "tr-".$photnam.".jpg";
    $lokasi_file = $_FILES['filephotr']['tmp_name'];
    $tipe_file   = $_FILES['filephotr']['type'];
    $direktori   = $folder.$namfile;
    $move = move_uploaded_file($lokasi_file,$direktori);
    if ($move) {  
        mysqli_query($db_link,"update dat_trans set bukti='$namfile' where kode='$nobuk'");
    } else {
        //
    }
    if ($resukt) {
        header("Location: ../dashboard.php?pages=entrydana&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=entrydana&hasil=pesangagal1");
    }
}
?> 