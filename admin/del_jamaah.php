<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from warga_muslim where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=datajamaah&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=datajamaah&hasil=pesangagal1");
}
?>