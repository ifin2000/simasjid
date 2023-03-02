<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select jeda_page,jeda_iqomat,bg_image_cover,enable_page_imam,enable_page_donasi,enable_page_phbi,enable_page_hadits1,enable_page_jumatan,enable_page_hadits2,enable_page_kajian,enable_page_ramadhan,awal_ramadhan from setup_tv";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
   if ($data['bg_image_cover']!=''){ $isi = " note : sudah diupload file photonya --> ".$data['bg_image_cover']; } else { $isi = "[ ukuran photo sesuaikan dgn resolusi monitor TV Android yg dipakai ]"; }
   $rmd = explode(" ",$data['awal_ramadhan']);
?>
    <div class="page-content-wrap form-horizontal">
    <form action="admin/upd_setuptv.php" method="post" name="trans" enctype="multipart/form-data">
    
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Setup Tampilan TV Masjid</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-2">Jeda antar Halaman</label>
            <div class="col-md-1">
              <input class="form-control" name="jedapage" type="text" value="<?php echo $data['jeda_page']; ?>" />
            </div>
            <label class="control-label text-left col-md-1"> [ detik ]</label>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Jeda antara Adzan dan Iqomah</label>
            <div class="col-md-1">
              <input class="form-control" name="jedaiqomah" type="text" value="<?php echo $data['jeda_iqomat']; ?>" />
            </div>
            <label class="control-label text-left col-md-1"> [ detik ]</label>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Background Halaman Awal </label>
                <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filephobg" id="filephobg"/> &nbsp;&nbsp;<?php echo $isi; ?>
                </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2"> Perkiraan Awal Ramadhan </label>
            <div class="col-md-2">
            <div class="input-group">
              <input class="form-control datepicker" name="awalrmd1" type="text" value="<?php echo $rmd[0]; ?>" /> 
              <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span>
            </div>
            </div>
            <div class="col-md-2">   
              <div class="input-group bootstrap-timepicker">
                <input class="form-control timepicker24" name="awalrmd2" type="text" value="<?php echo $rmd[1]; ?>" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
            <label class="control-label text-left col-md-1"></label>
          </div>
          <div class="form-group">
                <label class="control-label text-left col-md-2">Tampilkan Halaman </label>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka1" value=<?php pilih($data["enable_page_imam"],'1'); ?>> Jadwal Imam
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka2" value=<?php pilih($data["enable_page_phbi"],'1'); ?>> Acara PHBI
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka3" value=<?php pilih($data["enable_page_donasi"],'1'); ?>> Info Donasi
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka4" value=<?php pilih($data["enable_page_jumatan"],'1'); ?>> Jadwal Khotib
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka5" value=<?php pilih($data["enable_page_kajian"],'1'); ?>> Jadwal Kajian
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka6" value=<?php pilih($data["enable_page_ramadhan"],'1'); ?>> Ramadhan
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka7" value=<?php pilih($data["enable_page_hadits1"],'1'); ?>> Motivasi #1
                    </label>
                </div>
                <div class="col-md-1">
                    <label class="check">
                        <input type="checkbox" name="buka8" value=<?php pilih($data["enable_page_hadits2"],'1'); ?>> Motivasi #2
                    </label>
                </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="submit" class="btn btn-warning" value=" SIMPAN " name="simpan" id="simpan" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>
          
        </div>
          
    </form>
    </div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' checked"; }
    else { $isi="'".$isi."'"; }
    echo $isi;
}
?>
