
<div class="page-content-wrap form-horizontal">
    <form action="keuangan/upd_inout.php" method="post" name="trans" enctype="multipart/form-data" autocomplete="off">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Pemasukan/Pengeluaran Dana</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>
        <?php
            $var = $_GET['kode'];
            include ('../incl/koneksi.php');
            $result = mysqli_query($db_link,"select kode,tgl,nama,uraian,jenis,nilai,bukti from dat_trans where kode='$var'");
            $data = mysqli_fetch_array($result);
            //$nobuk = $saat.str_pad($data["last"]+1,3,"0",STR_PAD_LEFT);
        ?>
    <div class="panel-body">                     
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl Transaksi</label>
            <div class="col-md-1 has-success">
              <input class="form-control datepicker" name="tgl" id="tgl" type="text" value="<?php echo $data['tgl']; ?>"/>
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Transaksi </label>
            <div class="col-md-2">
              <input class="form-control" name="nobuk" id="nobuk" type="text" value="<?php echo $data['kode']; ?>" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kategori </label>
            <div class="col-md-3">
                <select class="form-control select" name="kategori">
                    <option value="">[ pilih salah satu ]</option>
                    <?php
                        $terisi = $data['jenis']." # ".$data['nama'];
                        $resolt = mysqli_query($db_link,"select nama,jenis from jns_transaksi order by jenis");
                        while ($dato = mysqli_fetch_array($resolt)){
                            $isival = $dato['jenis']." # ".$dato['nama'];
                            $isipil = $dato['jenis']." - ".$dato['nama'];
                            echo "<option value=".pilih($terisi,$isival).">".$isipil."</option>";
                        }    
                    ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Keterangan Detil </label>
            <div class="col-md-6">
              <input class="form-control" name="keterangan" type="text" value="<?php echo $data['uraian']; ?>"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Photo Bukti Transaksi</label>
              <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filephotr" id="filephotr"/> [ khusus utk pengeluaran dana ]
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Nilai (Rp)</label>
              <div class="col-md-2">
              <input class="form-control text-right" name="nilai"  type="text" value="<?php echo $data['nilai']; ?>"/>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $var; ?>" name="kode">
                <input type="submit" class="btn btn-warning" value=" UPDATE DATA " name="simpan" id="simpan">
            </div>
          </div>         
        </div>      
    </div>
    </form>

    <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#panelbukti">
                        BUKTI TRANSAKSI
                    </a>
                </h4>
            </div>                                                                           
        </div>
        <div class="panel-body" id="panelbukti">
            <div class="form-group">
            <div class="col-md-9">
            <?php if($data['bukti']!=''){ ?><img src="keuangan/files/<?php echo $data['bukti']; ?>" title="Bukti Transaksi" style="width:450px;"/><?php } else { echo "tidak ada bukti transaksi yg diupload!"; } ?>
            </div>
            </div>
        </div>
</div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' selected"; }
    else { $isi="'".$isi."'"; }
    return $isi;
}
?>
