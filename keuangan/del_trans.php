<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from dat_trans where kode='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=entrydana&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=entrydana&hasil=pesangagal1");
}
?>