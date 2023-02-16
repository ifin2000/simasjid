<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $var = $_GET['kode'];
    include ('../incl/koneksi.php');
    $result = mysqli_query($db_link,"select keterangan,jenis_surat,no_surat,isi_surat from persuratan where id='$var'");
    $data = mysqli_fetch_array($result);
?>
<div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Buat Surat Keluar</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="arsip/upd_surat.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Keterangan</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="keterangan" type="text" value="<?php echo $data['keterangan']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">No.Surat :</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="nosur" id="nosur" type="text" value="<?php echo $data['no_surat']; ?>" readonly="true">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Isi Surat</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"><?php echo $data['isi_surat']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <input type="hidden" value="<?php echo $var; ?>" name="kode">
                <input type="submit" class="btn btn-warning" value="UPDATE SURAT" name="simpan" id="simpan">
            </div>
          </div>
          </form>
        </div>
</div>