<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$hari = $_POST['hari'];
$imam1 = $_POST['imam1'];
$imam2 = $_POST['imam2'];
if ($imam1==''){ 
    ("Location: ../dashboard.php?pages=jdwimam&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update imam_rowatib set imam='$imam1',cadangan='$imam2' where hari='$hari'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=jdwimam&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=jdwimam&hasil=pesangagal1");
    }
}
?> 