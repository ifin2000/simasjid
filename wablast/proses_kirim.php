<?php
// function kirim langsung one-by-one
function kirim_lgsg($nowa,$pesan,$pilgam){

    if (substr($nowa, 0, 2) == "62") {
        $nowa = $nowa;
    } elseif (substr($nowa, 0, 1) == "0") {
        $nowa[0] = "X";
        $nowa = str_replace("X", "62", $nowa);
    } else {
        //echo "Invalid mobile number format";
    }
    //$isipesan .= $rows['header']."\n\r\n\r".$pesan."\n\r\n\r".$rows['footer'];
    include ('../incl/koneksi.php');
    $resuzt = mysqli_query($db_link,"select ipserver,header,footer from setup_wablast");
    $dato = mysqli_fetch_array($resuzt);
    $isipesan = $dato['header']."\n\r".$pesan."\n\r".$dato['footer'];

    if ($pilgam != "kosong") {
        $pilgam2 = str_replace(' ', '_', $pilgam);
        $filename = "../admin/img_pesan/" . $pilgam2;
        $data = array('message' => $isipesan, 'number' => $nowa, 'file_dikirim'=> new CURLFILE($filename));
    } else {
        $data = array('message' => $isipesan, 'number' => $nowa);
    }

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $dato['ipserver'].'/send-message',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $data,
    ));

    $response = curl_exec($curl);
    $hasil = json_decode($response, true);
        if ($hasil['status'] == true) {
            //echo $hasil['status'];
        }else{
            //echo $hasil;
        }
        if (curl_error($ch)) {
            //echo curl_error($ch);
        }
    curl_close($curl);
}
?>