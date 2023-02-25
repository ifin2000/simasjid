<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
                      $url = 'https://api.myquran.com/v1/sholat/kota/semua';     // 1204: kode kab.bogor -> sumber API https://documenter.getpostman.com/view/841292/Tz5p7yHS#intro
                      $ch = curl_init($url);
                      curl_setopt($ch, CURLOPT_HTTPGET, true);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      $response = curl_exec($ch);
                      curl_close($ch);
                      $hasil = json_decode($response, true);
                        //echo $hasil["lokasi"];
                     //echo count($hasil);
                      var_dump($response);
                      //$isi = $hasil['id'];
                      //$iso = $hasil['lokasi'];
                      //print "<option value='$isi'>$iso</option>";
                      /*foreach ($hasil as $key => $value)
                      {
                        echo "<option value='".$hasil['id']." # ".$hasil['lokasi']."'>".$hasil['lokasi']."</option>";
                      }*/
                    ?>