<?php
$var = $_POST['jenis'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"select kode from kode_jabatan where jabatan='$var'");
$data = mysqli_fetch_array($result);
echo $data["kode"];
?>