<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jabatan = $_POST['jabatan'];
$ketjabatan = $_POST['ketjabatan'];
$periode = $_POST['periode'];
$aktif = $_POST['aktif'];
$kojab = kojab($jabatan);
if (($nama=='') OR ($jabatan=='')){ 
    ("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update pengurus set nama='$nama',alamat='$alamat',telp='$telp',jabatan='$jabatan',ket_jabatan='$ketjabatan',kode_jabatan='$kojab',periode='$periode',aktif='$aktif' where id='$kode'");
    if ($aktif==0){
        mysqli_query($db_link,"update users set akses='',tingkatan='' where id='$kode'");
    }
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
}
?> 