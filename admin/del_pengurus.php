<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from pengurus where id='$kode'");
$result = mysqli_query($db_link,"delete from users where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=datapengurus&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=datapengurus&hasil=pesangagal1");
}
?>