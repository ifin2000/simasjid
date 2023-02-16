<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once '../incl/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
define("DOMPDF_FONT_HEIGHT_RATIO", 0.75);

$var = $_GET['kode'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"select isi_surat from persuratan where id='$var'");
$data = mysqli_fetch_array($result);

$dompdf->loadHtml($data['isi_surat']);

$dompdf->setPaper('letter', 'portrait');

$dompdf->render();
$dompdf->stream();
?>