<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from dokumen where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=usedokumen&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=usedokumen&hasil=pesangagal1");
}
?>