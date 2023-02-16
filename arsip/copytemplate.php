<?php
$var = $_POST['idt'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"select konten from template_surat where id='$var'");
$data = mysqli_fetch_array($result);
echo $data["konten"];
?>