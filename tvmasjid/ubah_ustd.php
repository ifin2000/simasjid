<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select nama,alamat,telp,photo from data_aktivis where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
   if ($data['photo']!=''){ $isi = " note : sudah diupload file photonya --> ".$data['photo']; } else { $isi = "[ ukuran photo 245px x 245px ]"; }
?>

        <div class="page-content-wrap form-horizontal">
        <form action="tvmasjid/upd_ustadz.php" method="post" name="trans" enctype="multipart/form-data">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Data Ustadz</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Ustadz</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $data['nama']; ?>" />
            </div>  
            <div class="col-md-3">
              [ tidak perlu pakai Ust/Bpk/Ibu/Prof/Dr/dr/dll.. ]
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Rumah </label>
            <div class="col-md-9">
              <input class="form-control" name="alamat" type="text" value="<?php echo $data['alamat']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Telpon/WA </label>
            <div class="col-md-9">
              <input class="form-control" name="telp"  type="text" value="<?php echo $data['telp']; ?>" /></textarea>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Photo Ustadz</label>
              <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filephoust" id="filephoust"/> <?php echo $isi; ?>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $kode; ?>" name="kode" id="kode">
                <input type="submit" class="btn btn-warning" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>        