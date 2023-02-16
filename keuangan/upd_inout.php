<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$fileTypes = array('jpg', 'jpeg', 'png', 'pdf'); // Allowed file extensions
$folder = "files/";
$nobuk = $_POST['kode'];
$tgl = $_POST['tgl'];
$jenis = explode(' # ',$_POST['kategori']);
$nama = $jenis[1];
$jnstr = $jenis[0];
$notes = $_POST['keterangan'];
$nilai = $_POST['nilai'];
$photnam = date('YmdHi');
//$uploader = $_POST['uploader'];
if (($nama=='') || ($nilai==0)){ 
    ("Location: ../dashboard.php?pages=entrydana&hasil=pesangagal2");
} else {
    // upload file
    $lokasi_file = $_FILES['filephotr']['tmp_name'];
    $namfile = $_FILES['filephotr']['name'];
    $direktori   = $folder.$namfile;
    // Validate the filetype
    $fileParts = pathinfo($namfile);
    if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
        $move = move_uploaded_file($lokasi_file,$direktori);
    }
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update dat_trans set nama='$nama',uraian='$notes',tgl='$tgl',jenis='$jnstr',nilai='$nilai' where kode='$nobuk'");
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