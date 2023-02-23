<?php
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"insert into jns_transaksi values('0','$nama','$jenis','')");
echo "OK";
?>