<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$gender = $_POST['gender'];
$tgllhr = explode('-',$_POST['tgllhr']);
$wrgrt = explode('/',$_POST['rt']);
$tgllahir = $tgllhr[2].'-'. $tgllhr[1].'-'. $tgllhr[0];
if (($nama=='') OR ($_POST['rt']=='') OR ($telp=='')){ 
    ("Location: ../dashboard.php?pages=datajamaah&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"insert into warga_muslim (id,nama_lengkap,tgl_lahir,gender,agama,alamat,rt,rw,kelurahan,nohp) values('0','$nama','$tgllahir','$gender','Islam','$alamat','$wrgrt[0]','$wrgrt[1]','Situsari','$telp')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=datajamaah&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=datajamaah&hasil=pesangagal1");
    }
}
?> 