<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,waktu,lokasi,pengundang,kehadiran,bahasan from notulen_rapat where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>
    <div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Notulen Rapat</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="arsip/upd_notulen.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Tgl Rapat</label>
            <div class="col-md-2 has-success">
              <input class="form-control datepicker" name="tgl" type="text" value="<?php echo $data['waktu']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Lokasi Rapat :</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="lokasi" id="lokasi" type="text" value="<?php echo $data['lokasi']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Penyelenggara: </label>
            <div class="col-md-2">
                <select class="form-control select" name="pengundang">
                    <option value=""> -- pilih bagian berikut -- </option>
                    <option value=<?php pilih($data["pengundang"],"Pembina"); ?>>Dewan Pembina</option>
                    <option value=<?php pilih($data["pengundang"],"Pengawas"); ?>>Dewan Pengawas</option>
                    <option value=<?php pilih($data["pengundang"],"KSB"); ?>>Ketua/Sekretaris/Bendahara</option>
                    <option value=<?php pilih($data["pengundang"],"Ketua1"); ?>>Ketua 1</option>
                    <option value=<?php pilih($data["pengundang"],"Ketua2"); ?>>Ketua 2</option>
                    <option value=<?php pilih($data["pengundang"],"Ketua3"); ?>>Ketua 3</option>
                    <option value=<?php pilih($data["pengundang"],"Ketua4"); ?>>Ketua 4</option>
                    <option value=<?php pilih($data["pengundang"],"Ketua5"); ?>>Ketua 5</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Yang Hadir :</label>
            <div class="col-md-6">
                <textarea class="form-control" name="hadir" rows="3" cols="20"><?php echo $data['kehadiran']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Isi Notulen</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"><?php echo $data['bahasan']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <input type="hidden" name="kode" value="<?php echo $data['id']; ?>">
                <input type="submit" class="btn btn-warning" value="SIMPAN NOTULEN" name="simpan" id="simpan">
            </div>
          </div>
          </form>
        </div>
    </div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' selected"; }
    else { $isi="'".$isi."'"; }
    echo $isi;
}
?>