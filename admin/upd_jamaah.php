<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$tgllhr = $_POST['tgllhr'];
$gender = $_POST['gender'];
//$wrgrt = explode('/',$_POST['rt']);
$wrgrt = $_POST['rt'];
if (($nama=='') OR ($_POST['rt']=='') OR ($telp=='')){ 
    ("Location: ../dashboard.php?pages=datajamaah&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update warga_muslim set nama_lengkap='$nama',alamat='$alamat',nohp='$telp',gender='$gender',tgl_lahir='$tgllhr',rt='$wrgrt' where id='$kode'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=datajamaah&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=datajamaah&hasil=pesangagal1");
    }
}
?> 