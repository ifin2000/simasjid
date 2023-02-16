<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
$login = $_SESSION['nama'];
$fileTypes = array('jpg', 'jpeg', 'png', 'zip', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'odt', 'xls', 'xlsx' ); // Allowed file extensions
$folder_file = "../dokumen";
$tgl = $_POST['tgl'];
$nama = $_POST['nama'];
$notes = $_POST['keterangan'];
$hakakses = $_POST['hakakses1']."#";
$hakakses .= $_POST['hakakses2']."#";
$hakakses .= $_POST['hakakses3']."#";
$hakakses .= $_POST['hakakses4']."#";
$hakakses .= $_POST['hakakses5']."#";
$hakakses .= $_POST['hakakses6']."#";
$hakakses .= $_POST['hakakses7']."#";
$hakakses .= $_POST['hakakses8']."#";
if (empty($_FILES) && ($nama=='')){ 
    ("Location: ../dashboard.php?pages=usedokumen&hasil=pesangagal2");
} else {
    // ambil nama asli user
    include ('../incl/koneksi.php');
    $resolt = mysqli_query($db_link,"select a.nama from pengurus a,users b where b.user='$login' and a.id=b.id");
    $dato = mysqli_fetch_array($resolt);
    $owner = $dato['nama'];
    // upload file
    $lokasi_file = $_FILES['filedok']['tmp_name'];
    $namfile = $_FILES['filedok']['name'];
    $direktori   = $folder_file."/".$namfile;
    // Validate the filetype
    $fileParts = pathinfo($namfile);
    if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
        $move = move_uploaded_file($lokasi_file,$direktori);
    }
    $resukt = mysqli_query($db_link,"insert into dokumen values('0','$nama','$notes','$hakakses','$owner','$tgl','','')");
    if ($move) {  
        mysqli_query($db_link,"update dokumen set lokasi_file='$namfile' where nama_dokumen='$nama' and waktu_upload='$tgl'");
    } else {
        //
    }
    if ($resukt) {
        header("Location: ../dashboard.php?pages=usedokumen&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=usedokumen&hasil=pesangagal1");
    }
}
?> 