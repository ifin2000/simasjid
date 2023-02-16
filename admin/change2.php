<?php
$username = $_POST['username'];
$password = $_POST['password'];
$passwordlm = md5($_POST['passwordlm']);
$passwordbr = md5($_POST['passwordbr']);

$hasil = $_POST['hasil'];
$encoded_data = $_POST['mydata'];
$binary_data = base64_decode( $encoded_data );
$saat = date("Ymd_His");
include ('../incl/koneksi.php');
if ($passwordlm==$password){
    if ($_POST['passwordbr']==''){
        //
    } else {
        mysqli_query($db_link,"update users set password='$passwordbr' where user='$username'");
    }
    // upload photo profil
    $namfile = "pengguna-".$username.$saat.".jpg";
    $lokasi_file = $_FILES['userfile']['tmp_name'];
    $tipe_file   = $_FILES['userfile']['type'];
    $lokasi_file2 = $_FILES['userfile_hp']['tmp_name'];
    $tipe_file2   = $_FILES['userfile_hp']['type'];

    $direktori   = "../incl/assets/images/users/".$namfile;
    $move = move_uploaded_file($lokasi_file,$direktori);
    $move2 = move_uploaded_file($lokasi_file2,$direktori);
    if ($move || $move2) {
        $query =mysqli_query($db_link,"update users set photo='$namfile' where user='$username'");
    } elseif ($hasil=='sudah') {
      	file_put_contents( $direktori, $binary_data );
        $query=mysqli_query($db_link,"update users set photo='$namfile' where user='$username'");
    }
    header("Location: ../index.php?pages=change&login=$username&hasil=pesansukses");
} else {
	header("Location: ../dashboard.php?pages=chang&login=$usernamee&hasil2=pesaneror");
}
?> 
