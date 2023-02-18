<html>
<head>
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../incl/css/template-laporan.css">
<style type="text/css">
html,
body {
    height: 100%;
}

.container {
    /*height: 100%;*/
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<script src="../incl/jquery/jquery.js"></script>  
</head>
<body>
<?php 
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $var1 = $_GET['var1'];
    $var2 = $_GET['var2'];
    $var3 = $_GET['var3'];
    list ($dd,$mm,$yy) = explode('-',$var1);
    $tg1 = $yy.'-'.$mm.'-'.$dd;
    list ($dx,$mx,$yx) = explode('-',$var2);
    $tg2 = $yx.'-'.$mx.'-'.$dx;
?>
    <div class="col-md-1"></div>
    <div id="table_data" class="col-md-10 container">
      <div id='dvData' class="table-responsive">
        <br>
        <h3 class='control-label text-center'>LAPORAN KEUANGAN YAYASAN PER PERIODE : <?php echo $tg1 ?> s/d <?php echo $tg2 ?></h3>
        <br>
        <table class="table table-bordered table-striped">
          <thead class="thead-dark cet_bul">
            <tr>
              <th class='tg'><b>No.Trs</b></th>
              <th class='tg'><b>Tgl</b></th>
              <th class='tg'><b>Keterangan</b></th>
              <th class='tg'><b>Jenis</b></th>
              <th class='tg'><b>Masuk(Rp)</b></th>
              <th class='tg'><b>Keluar(Rp)</b></th>
            </tr>            
          </thead>
          <tbody>
            <?php
              include ('../incl/koneksi.php');
              $recordSet = mysqli_query($db_link, "select kode,tgl,nama,uraian,jenis,nilai from dat_trans where tgl between '$var1' and '$var2' order by tgl");            
              $total = 0; $totmas = 0; $totkel = 0;
              while($datarst = mysqli_fetch_array($recordSet)){
                $isitind="";
                list($thx,$blx,$tgx)=explode("-",$datarst["tgl"]);
                $hari = $tgx."-".$blx."-".$thx;
                echo "<tr><td class='isi2'>".$datarst["kode"]."</td>";
                echo "<td class='isi2'>".$hari."</td>";
                echo "<td class='isi1'><b>&nbsp;".$datarst["uraian"]."</b></td>";
                echo "<td class='isi2'>".$datarst["nama"]."</td>";
                if ($datarst["jenis"]=='Pemasukan'){
                    echo "<td class='isi3'>".number_format($datarst["nilai"],0,',','.')."</td>";
                    $totmas+=$datarst["nilai"];
                } else { echo "<td class='isi3'>0</td>"; $totmas=$totmas; }
                if ($datarst["jenis"]=='Pengeluaran'){
                    echo "<td class='isi3'>".number_format($datarst["nilai"],0,',','.')."</td>";
                    $totkel+=$datarst["nilai"];
                } else { echo "<td class='isi3'>0</td>"; $totkel=$totkel; }
                echo "</tr>";
              }
              $total=($totmas-$totkel);
              echo "<tr><td class='isi2' colspan=4><b>JUMLAH (Rp) :</b></td>";
              echo "<td class='isi3'><b>".number_format($totmas,0,',','.')."</b></td>";
              echo "<td class='isi3'><b>".number_format($totkel,0,',','.')."</b></td>";
              echo "<tr><td class='isi2' colspan=4><b>TOTAL (Rp) :</b></td>";
              echo "<td class='isi3' colspan=2><b>".number_format($total,0,',','.')."</b></td>";
              echo "<p class='small'>";
              $hal = ($jumlah/100);
              if ($hal>1) {
                for ($j=1; $j<=$hal+1; $j++) {
                    if ($j==$n) { echo "<b>$j</b>"; }
                    else { echo " <a href=\"cet_all.php?n=$j&var1=$var1&var2=$var2&var3=$var3\" class=\"mainmenu\">$j</a> "; }
                  }
              }
              echo "</p>";
            ?>
          </tbody>
        </table> 
      </div>
    </div>
    <div class="col-md-12 container">
    <form>
      <input type="button" value=' ** CETAK LAPORAN ** ' onclick="window.print()"/>
    </form>
    </div>
    
</body>
</html>
