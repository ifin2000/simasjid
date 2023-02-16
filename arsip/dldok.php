<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    session_start();
    $login = $_SESSION['nama'];
    $kode = $_GET['kode'];
    include ('../incl/koneksi.php');
    // ambil kode jabatan user
    $resolt = mysqli_query($db_link,"select a.kode_jabatan from pengurus a,users b where b.user='$login' and a.id=b.id");
    $dato = mysqli_fetch_array($resolt);
    $kojab = $dato['kode_jabatan'];
    // cek hak akses dari user
    $resilt = mysqli_query($db_link,"select count(*) as ada from dokumen where id='$kode' and hak_akses like '%$kojab%'");
    $dati = mysqli_fetch_array($resilt);
    //$hakakses = explode('#',$data["hak_akses"]);
    // cek hak akses dari user
    $result = mysqli_query($db_link,"select lokasi_file from dokumen where id='$kode'");
    $data = mysqli_fetch_array($result);
    
    $filename = $data['lokasi_file'];
    $file = $_SERVER['DOCUMENT_ROOT']."/yayasan/dokumen/".$filename;
         
    if ($dati['ada']==0) {
        echo "Anda tidak memeiliki hak akses ke dokumen ini!";
    } else {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);               
            exit;
        } 
        else {
            echo "hak akses terbatas atau file tidak ditemukan!";
        }
    }
?>