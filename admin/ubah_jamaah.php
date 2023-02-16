<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,nama_lengkap,alamat,nohp,tgl_lahir,gender,rt,rw from warga_muslim where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
   $rtrw = $data['rt']."/".$data['rw'];
?>

        <div class="page-content-wrap form-horizontal">
        <form action="admin/upd_jamaah.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Data Jamaah</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Lengkap</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $data['nama_lengkap']; ?>"/>
            </div>
            <div class="col-md-3">
              [ tidak perlu pakai Ust/Bpk/Ibu/Prof/Dr/dr/dll.. ]
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl Lahir</label>
            <div class="col-md-1 has-success">
              <input class="form-control" value="<?php echo $data['tgl_lahir']; ?>" name="tgllhr" id="tgllhr" type="text"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Jenis Kelamin</label>
              <div class="col-md-3">
                <select class="form-control select" name="gender">
                    <option value=<?php pilih($data["gender"],"L"); ?>>Laki-laki</option>
                    <option value=<?php pilih($data["gender"],"P"); ?>>Perempuan</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Rumah </label>
            <div class="col-md-6">
              <input class="form-control" name="alamat" type="text" value="<?php echo $data['alamat']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Telp/WhatsApp </label>
            <div class="col-md-3">
              <input class="form-control" name="telp" type="text" value="<?php echo $data['nohp']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Warga RT/RW ? </label>
            <div class="col-md-3">
                <select class="form-control select" name="rt">
                    <option value=<?php pilih($rtrw,""); ?>>[ pilih salah satu ]</option>
                    <option value=<?php pilih($rtrw,"1/10"); ?>>RT01/RW10</option>
                    <option value=<?php pilih($rtrw,"2/10"); ?>>RT02/RW10</option>
                    <option value=<?php pilih($rtrw,"3/10"); ?>>RT03/RW10</option>
                    <option value=<?php pilih($rtrw,"4/10"); ?>>RT04/RW10</option>
                    <option value=<?php pilih($rtrw,"5/10"); ?>>RT05/RW10</option>
                    <option value=<?php pilih($rtrw,"6/10"); ?>>RT06/RW10</option>
                    <option value=<?php pilih($rtrw,"7/10"); ?>>RT07/RW10</option>
                    <option value=<?php pilih($rtrw,"24/07"); ?>>RT24/RW07</option>
                    <option value=<?php pilih($rtrw,"25/07"); ?>>RT25/RW07</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $kode; ?>" name="kode">
                <input type="submit" class="btn btn-warning" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' selected"; }
    else { $isi="'".$isi."'"; }
    echo $isi;
}
?>
      