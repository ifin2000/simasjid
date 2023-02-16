<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$kini = date('Y-m-d H:i:s');
$isi = $_POST['isi'];
$gbr = $_POST['pilgam'];
$tgl1 = $_POST['senddate'];
$tgl2 = $_POST['enddate'];
$rt = $_POST['sel_rt'];
$sex = $_POST['sel_gender'];
$umur1 = $_POST['inp_beg_umur'];
$umur2 = $_POST['inp_end_umur'];
$asal = $_POST['sel_null'];
//$urus = $_POST['pengurus'];
$pengurus = isset($_POST['pengurus']) && $_POST['pengurus']  ? "1" : "0";
$kat_null = isset($_POST['kat_null']) && $_POST['kat_null']  ? "1" : "0";
$kat_gender = isset($_POST['kat_gender']) && $_POST['kat_gender']  ? "1" : "0";
$kat_rt = isset($_POST['kat_rt']) && $_POST['kat_rt']  ? "1" : "0";
$kat_range = isset($_POST['kat_range']) && $_POST['kat_range']  ? "1" : "0";
//if (($isi=='') || (($pengurus!=1) && ($kat_gender!=1) && ($kat_rt!=1) && ($kat_range!=1) && ($kat_null!=1))){ 
if (($isi=='') || ($tgl1=='')){ 
    ("Location: ../dashboard.php?pages=wamanual&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resuzt = mysqli_query($db_link,"select header,footer from setup_wablast");
    $dato = mysqli_fetch_array($resuzt);
    $header = $dato['header'];
    $footer = $dato['footer'];
    $pesan = $header."\n\r".$isi."\n\r".$footer;
    if ($pengurus){
        include ('proses_kirim.php');   // khusus kirim lgsg
        $result = mysqli_query($db_link,"select nama,telp,jabatan from pengurus where aktif=1 and telp!=''");
        while($data = mysqli_fetch_array($result)){
            $pesano = "Kepada Yth: Bpk/Ibu/Sdr.".$data['nama']."\n\r[".$data['jabatan']."]\n\r".$pesan;
            $nohp = $data['telp'];
            //$resukt = mysqli_query($db_link,"insert into wa_kirim values('0','$kini','$tgl1','$tgl2','$nohp','$pesano','manual','','','$gbr')");
            kirim_lgsg($nohp,$pesano,$gbr);
        }
    }
    if ($kat_null){
        include ('proses_kirim.php');   // khusus kirim lgsg
        $result = mysqli_query($db_link,"select nohp from data_asal where rt='$asal'");
        while($data = mysqli_fetch_array($result)){
            $nohp = $data['nohp'];
            //$resukt = mysqli_query($db_link,"insert into wa_kirim values('0','$kini','$tgl1','$tgl2','$nohp','$pesan','manual','','','$gbr')");
            kirim_lgsg($nohp,$pesan,$gbr);
        }
    }
    // kelola pilihan checkbox
    if (($kat_gender) || ($kat_range) || ($kat_rt)){
        if ($kat_gender){
            $katsex = " and gender='$sex'";
        } else { $katsex = ""; }
        if ($kat_range){
            $katumur = " and ((YEAR(CURDATE())-YEAR(concat(substr(tgl_lahir,7),'-',substr(tgl_lahir,4,2),'-',substr(tgl_lahir,1,2)))) >= $umur1) and ((YEAR(CURDATE())-YEAR(concat(substr(tgl_lahir,7),'-',substr(tgl_lahir,4,2),'-',substr(tgl_lahir,1,2)))) <= $umur2)";
        } else { $katumur = ""; }
        if ($kat_rt){
            $katwrg = " and rt='$rt'";
        } else { $katwrg = ""; }
        // susun query berdasar centangan pilihan
        $allquery = "select nama_lengkap,nohp from warga_muslim where agama='Islam' and nohp!='' $katsex $katwrg $katumur";
        $result = mysqli_query($db_link, $allquery);
        while($data = mysqli_fetch_array($result)){
            $pesana = "Kepada Yth: Bpk/Ibu/Sdr.".$data['nama_lengkap']."\n\r".$pesan;
            $nohp = $data['nohp'];
            $resukt = mysqli_query($db_link,"insert into wa_kirim values('0','$kini','$tgl1','$tgl2','$nohp','$pesana','manual','','','$gbr')");
        }
    }
    //echo $allquery;
    header("Location: ../dashboard.php?pages=wamanual&hasil=pesansukses2");
}
?> 