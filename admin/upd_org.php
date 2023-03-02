<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$kode = $_POST['kode'];
$koorg = $_POST['koorg'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$kota = explode(' # ',$_POST['kota']);
//$kota = $_POST['kota'];
$bank = $_POST['bank'];
$norek = $_POST['norek'];
$anrek = $_POST['anrek'];
if ($nama==''){ 
    ("Location: ../dashboard.php?pages=organisasi&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update organisasi set id='$kota[0]',nama='$nama',kode='$koorg',alamat='$alamat',kota='$kota[1]',telp='$telp',bank='$bank',norek='$norek',anrek='$anrek'");
    //$resukt = mysqli_query($db_link,"update organisasi set nama='$nama',kode='$koorg',alamat='$alamat',kota='$kota',telp='$telp',bank='$bank',norek='$norek',anrek='$anrek' where id='$kode'");
   if ($resukt) {
        header("Location: ../dashboard.php?pages=organisasi&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=organisasi&hasil=pesangagal1");
    }
}
?> 
