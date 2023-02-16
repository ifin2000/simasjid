<?php
$thn = date('Y');
//$bln = getRomawi(date('m'));
$bln = date('m');
$var = $_POST['jenis'];
include ('../incl/koneksi.php');
$result = mysqli_query($db_link,"select kode from kode_surat where jenis like '%$var'");
$data = mysqli_fetch_array($result);
$kosur = $data["kode"];
$resolt = mysqli_query($db_link,"select max(substring(no_surat,4,3)) as last from persuratan where substring(no_surat,1,2)='$kosur' and year(tgl_buat)='$thn' and month(tgl_buat)='$bln'");
$dato = mysqli_fetch_array($resolt);
echo str_pad($kosur,2,"0",STR_PAD_LEFT).".".str_pad($dato["last"]+1,3,"0",STR_PAD_LEFT);
// ubah ke romawi format
function getRomawi($bln){
    switch ($bln){
      case '01':
          return "I";
          break;
      case '02':
          return "II";
          break;
      case '03':
          return "III";
          break;
      case '04':
          return "IV";
          break;
      case '05':
          return "V";
          break;
      case '06':
          return "VI";
          break;
      case '07':
          return "VII";
          break;
      case '08':
          return "VIII";
          break;
      case '09':
          return "IX";
          break;
      case '10':
          return "X";
          break;
      case '11':
          return "XI";
          break;
      case '12':
          return "XII";
          break;
    }
}
?>