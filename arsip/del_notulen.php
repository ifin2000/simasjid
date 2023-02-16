<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from notulen_rapat where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=notulen&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=notulen&hasil=pesangagal1");
}
?>