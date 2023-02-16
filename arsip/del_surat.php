<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from persuratan where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=datasurat&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=satasurat&hasil=pesangagal1");
}
?>