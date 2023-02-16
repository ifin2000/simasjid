<?php
$lokasi_file = $_FILES['filename3']['tmp_name'];
$namfile = $_FILES['filename3']['name'];
$direktori   = "img_pesan/" . $namfile;
$move = move_uploaded_file($lokasi_file,$direktori);
if ($move) {
    // code...
    return "success";
} else {
    return "GAGAL";
}
?>