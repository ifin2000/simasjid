<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$pekan = $_POST['pekan'];
$ustadz = $_POST['ustadz'];
$tema = $_POST['tema'];
if ($ustadz==''){ 
    ("Location: ../dashboard.php?pages=kajianahad&hasil=pesangagal2");
} else {
    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link,"update kajian set ustadz='$ustadz',tema='$tema' where pekan='$pekan'");
    if ($resukt) {
        header("Location: ../dashboard.php?pages=kajianahad&hasil=pesansukses2");
    } else {
    	 header("Location: ../dashboard.php?pages=kajianahad&hasil=pesangagal1");
    }
}
?> 