<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jabatan = $_POST['jabatan'];
$ketjabatan = $_POST['ketjabatan'];
$periode = $_POST['periode'];
$aktif = $_POST['aktif'];
$user = $_POST['user'];
$passw = $_POST['passw'];
$kojab = kojab($jabatan);
if (($nama=='') OR ($jabatan=='') OR ($user=='') OR ($passw=='')){ 
    ("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"insert into pengurus values('0','$nama','$alamat','$telp','$jabatan','$ketjabatan','$kojab','$periode','$aktif')");
    $resuxt = mysqli_query($db_link,"select hak_akses from setup_akses where jabatan='$jabatan'");
    $data = mysqli_fetch_array($resuxt);
    $hakakses = $data['hak_akses'];
    $resuzt = mysqli_query($db_link,"select id from pengurus where nama='$nama'");
    $dato = mysqli_fetch_array($resuzt);
    $ide = $dato['id'];
    $result = mysqli_query($db_link,"insert into users values('$ide','$user',md5('$passw'),'$hakakses','','')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=datapengurus&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal1");
    }
}
// function cari kode jabatan
function kojab($kode){
    if (($kode=='Ketua Yayasan')||($kode=='Sekretaris Yayasan')||($kode=='Bendahara Yayasan')){
        $kojab = 'PHAR';
    } elseif (($kode=='Ketua Pembina')||($kode=='Anggota Pembina')){
        $kojab = 'PEM';
    } elseif (($kode=='Ketua Pengawas')||($kode=='Anggota Pengawas')){
        $kojab = 'PWAS';
    } elseif (($kode=='Ketua Bidang 1')){
        $kojab = 'KET1';
    } elseif (($kode=='Ketua Bidang 2')){
        $kojab = 'KET2';
    } elseif (($kode=='Ketua Bidang 3')){
        $kojab = 'KET3';
    } elseif (($kode=='Ketua Bidang 4')){
        $kojab = 'KET4';
    } elseif (($kode=='Ketua Bidang 5')){
        $kojab = 'KET5';
    }
    return $kojab;
}
?> 