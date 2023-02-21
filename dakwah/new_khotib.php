<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$tgl = $_POST['tgl'];
$nama = $_POST['nama'];
$bilal = $_POST['bilal'];
$muadzin = $_POST['muadzin'];
if (($tgl=='') or ($nama=='')){ 
    ("Location: ../dashboard.php?pages=jdwjumat&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $result1 = mysqli_query($db_link,"select photo from data_aktivis where nama='$nama'");
    $data1 = mysqli_fetch_array($result1);
    $photo1 = $data1["photo"];
    $result2 = mysqli_query($db_link,"select photo from data_aktivis where nama='$bilal'");
    $data2 = mysqli_fetch_array($result2);
    $photo2 = $data2["photo"];
    $result3 = mysqli_query($db_link,"select photo from data_aktivis where nama='$muadzin'");
    $data3 = mysqli_fetch_array($result3);
    $photo3 = $data3["photo"];
    $resukt = mysqli_query($db_link,"insert into jumatan values('0','$tgl','$nama','$bilal','$muadzin','$photo1','$photo2','$photo3')");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=jdwjumat&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=jdwjumat&hasil=pesangagal1");
    }
}
?> 