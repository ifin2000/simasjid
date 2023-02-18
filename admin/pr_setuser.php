<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$id = $_POST['kode'];
$user = $_POST['user'];
$passw = md5($_POST['passw']);
$adminz = $_POST['adminz'];
$master1 = $_POST['master1'];
$master2 = $_POST['master2'];
$master3 = $_POST['master3'];
$master4 = $_POST['master4'];
$master5 = $_POST['master5'];
$dokumen1 = $_POST['dokumen1'];
$dokumen2 = $_POST['dokumen2'];
$dokumen3 = $_POST['dokumen3'];
$dokumen4 = $_POST['dokumen4']; // checklist ini tidak aktif --> utk pilihan daftar hadir rapat !
$dakwah1 = $_POST['dakwah1'];
$dakwah2 = $_POST['dakwah2'];
$dakwah3 = $_POST['dakwah3'];
$dakwah4 = $_POST['dakwah4'];
$kirim1 = $_POST['kirim1'];
$kirim2 = $_POST['kirim2'];
$finance1 = $_POST['finance1'];
$finance2 = $_POST['finance2'];
$akses = $master1.",".$master2.",".$master3.",".$master4.",".$master5.",".
		 $dokumen1.",".$dokumen2.",".$dokumen3.",".$dokumen4.",".
		 $dakwah1.",".$dakwah2.",".$dakwah3.",".$dakwah4.",".
		 $kirim1.",".$kirim2.",".
		 $finance1.",".$finance2.",";
if ($user==''){ 
    ("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    if ($_POST['passw']==''){ $ext = ""; } else { $ext = ",password='$passw'"; }
    $result = mysqli_query($db_link,"select count(*) as ada from users where id='$id'");
    $data = mysqli_fetch_array($result);
    if ($data['ada']>0){
        $kueri = "update users set user='$user',akses='$akses',tingkatan='$adminz' $ext where id='$id'";
    } else { $kueri = "insert into users values('$id','$user','$passw','$akses','$adminz','')"; }
    $resukt = mysqli_query($db_link, $kueri);
    if ($resukt) {
        header("Location: ../dashboard.php?pages=datapengurus&hasil=pesansukses2");
        //echo $kueri;
    } else {
    	 header("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal1");
    }
}
?> 