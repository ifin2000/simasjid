<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from template_surat where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=formsurat&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=formsurat&hasil=pesangagal1");
}
?>