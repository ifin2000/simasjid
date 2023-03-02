<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$folder_photo = "../incl/assets/images";
$photnam = date('YmdHi');
$jedapage = $_POST['jedapage'];
$jedaiqomah = $_POST['jedaiqomah'];
$awalrmd = $_POST['awalrmd1']." ".$_POST['awalrmd2'];
$buka1 = $_POST['buka1'];
$buka2 = $_POST['buka2'];
$buka3 = $_POST['buka3'];
$buka4 = $_POST['buka4'];
$buka5 = $_POST['buka5'];
$buka6 = $_POST['buka6'];
$buka7 = $_POST['buka7'];
$buka8 = $_POST['buka8'];

    include ('../incl/koneksi.php');
    $resukt = mysqli_query($db_link, "update setup_tv set jeda_page='$jedapage',jeda_iqomat='$jedaiqomah',enable_page_imam='$buka1',enable_page_donasi='$buka3',enable_page_phbi='$buka2',enable_page_hadits1='$buka7',enable_page_jumatan='$buka4',enable_page_hadits2='$buka8',enable_page_kajian='$buka5',enable_page_ramadhan='$buka6',awal_ramadhan='$awalrmd'");
    // upload file
    $namfile = "bg-".$photnam.".jpg";
    $lokasi_file = $_FILES['filephobg']['tmp_name'];
    $tipe_file   = $_FILES['filephobg']['type'];
    $direktori   = $folder_photo."/".$namfile;
    $move = move_uploaded_file($lokasi_file,$direktori);
    if ($move) {  
        mysqli_query($db_link,"update setup_tv set bg_image_cover='$namfile'");
    } else {
        //
    }
    if ($resukt) {
        header("Location: ../dashboard.php?pages=setuptv&hasil=pesansukses2");
        //echo "update setup_tv set jeda_page='$jedapage',jeda_iqomat='$jedaiqomah',enable_page_imam='$buka1',enable_page_donasi='$buka3',enable_page_phbi='$buka2',enable_page_hadits1='$buka7',enable_page_jumatan='$buka4',enable_page_hadits2='$buka8',enable_page_kajian='$buka5',enable_page_ramadhan='$buka6',awal_ramadhan='$awalrmd'";
    } else {
    	 header("Location: ../dashboard.php?pages=setuptv&hasil=pesangagal1");
    }

?> 