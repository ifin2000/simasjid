<?php
// setup wa server
$kode=$_GET['kode'];
include ('../incl/koneksi.php');
$query = "select ipserver,nomor,pengenal,header,footer from setup_wablast";
$result = mysqli_query($db_link,$query);
$rows = mysqli_fetch_array($result);
// variable post
$no_pen = $_POST['penerima'];
$pesan = $_POST['pesan'];
$pilgam = $_POST['pilgam'];
//$pesan = preg_replace("\n\r", "<ENTER>", $pesan);
//$pesan = preg_replace("/&/i", " dan ", $pesan);

if (substr($no_pen, 0, 2) == "62") {
    $no_pen = $no_pen;
} elseif (substr($no_pen, 0, 1) == "0") {
    $no_pen[0] = "X";
    $no_pen = str_replace("X", "62", $no_pen);
} else {
    echo "Invalid mobile number format";
}
$isipesan .= $rows['header']."\n\r\n\r".$pesan."\n\r\n\r".$rows['footer'];

if ($pilgam != "kosong") {
    $pilgam2 = str_replace(' ', '_', $pilgam);
    $filename = "img_pesan/" . $pilgam2;
    $data = array('message' => $isipesan, 'number' => $no_pen, 'file_dikirim'=> new CURLFILE($filename));
} else {
    $data = array('message' => $isipesan, 'number' => $no_pen);
}
//$data = array('message' => $pesan, 'number' => $phone, 'file_dikirim'=> new CURLFILE($filename));
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $rows['ipserver'].'/send-message',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
  //CURLOPT_POSTFIELDS => array('message' => $pesan,'number' => $phone,'file_dikirim'=> new CURLFILE('images/test_img.jpeg')),
  //CURLOPT_POSTFIELDS => array('message' => 'ping','number' => '08118248989','file_dikirim'=> ''), 	// ini utk kirim teks sj
));

$response = curl_exec($curl);
//echo $response;
$hasil = json_decode($response, true);
    if ($hasil['status'] == true) {
        echo $hasil['status'];
    }else{
        echo $hasil;
    }
    if (curl_error($ch)) {
        echo curl_error($ch);
    }
curl_close($curl);
?>