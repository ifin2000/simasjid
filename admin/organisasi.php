<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,kode,nama,alamat,kota,telp from organisasi";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>
    <div class="page-content-wrap form-horizontal">
    <form action="admin/upd_org.php" method="post" name="trans">
    
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Data Profil Yayasan</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Organisasi</label>
            <div class="col-md-6">
              <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $data['nama']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kode (utk kode No.Surat)</label>
            <div class="col-md-2">
              <input class="form-control" name="koorg" id="koorg" type="text" value="<?php echo $data['kode']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Yayasan </label>
            <div class="col-md-9">
              <input class="form-control" name="alamat" type="text" value="<?php echo $data['alamat']; ?>" />
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Kota</label>
              <div class="col-md-3">
                  <input type="text" class="form-control" name="kota" value="<?php echo $data['kota']; ?>"/>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Telpon/WA </label>
            <div class="col-md-3">
              <input class="form-control" name="telp"  type="text" value="<?php echo $data['telp']; ?>" /></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $data['id']; ?>" name="kode">
                <input type="submit" class="btn btn-warning" value=" SIMPAN " name="simpan" id="simpan" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>
          
        </div>
          
    </form>
    </div>
       