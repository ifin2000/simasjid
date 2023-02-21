<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from data_aktivis where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=dataustd&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=dataustd&hasil=pesangagal1");
}
?>