<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$folder_photo = "../incl/assets/images/ustadz";
$kode=$_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
//$filephoto = $_POST['filephoust'];
$photnam = date('YmdHi');
if ($nama==''){ 
    ("Location: ../dashboard.php?pages=dataustd&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update data_aktivis set nama='$nama',alamat='$alamat',telp='$telp' where id='$kode'");
    // upload file
    $namfile = "ust-".$photnam.".jpg";
    $lokasi_file = $_FILES['filephoust']['tmp_name'];
    $tipe_file   = $_FILES['filephoust']['type'];
    $direktori   = $folder_photo."/".$namfile;
    $move = move_uploaded_file($lokasi_file,$direktori);
    if ($move) {  
        mysqli_query($db_link,"update data_aktivis set photo='$namfile' where id='$kode'");
    } else {
        //
    }
    if ($resukt) {
        header("Location: ../dashboard.php?pages=dataustd&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=dataustd&hasil=pesangagal1");
    }
}
?> 