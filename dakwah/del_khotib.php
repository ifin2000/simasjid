<?php
$kode = $_GET['id'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"delete from jumatan where id='$kode'");
if ($result){
    header("Location: ../dashboard.php?pages=jdwjumat&hasil=pesan3");
} else {
    header("Location: ../dashboard.php?pages=jdwjumat&hasil=pesangagal1");
}
?>
