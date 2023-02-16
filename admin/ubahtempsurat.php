<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,nama,jenis,konten from template_surat where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>
    <div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Setup Format Surat</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="admin/upd_tempsurat.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Judul Template</label>
            <div class="col-md-4 has-success">
              <input class="form-control" name="judul" type="text" maxlength="30" value="<?php echo $data['nama']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Jenis Surat</label>
            <div class="col-md-3">
                <select class="form-control select" name="jenis">
                    <option value=<?php pilih($data["jenis"],""); ?>> -- pilih jenis surat --</option>
                    <option value=<?php pilih($data["jenis"],"Surat Keputusan"); ?>>Surat Keputusan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Undangan"); ?>>Surat Undangan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Permohonan"); ?>>Surat Permohonan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Pemberitahuan"); ?>>Surat Pemberitahuan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Pernyataan"); ?>>Surat Pernyataan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Tugas"); ?>>Surat Tugas</option>
                    <option value=<?php pilih($data["jenis"],"Surat Keterangan"); ?>>Surat Keterangan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Rekomendasi"); ?>>Surat Rekomendasi</option>
                    <option value=<?php pilih($data["jenis"],"Surat Balasan"); ?>>Surat Balasan</option>
                    <option value=<?php pilih($data["jenis"],"Surat Pengantar"); ?>>Surat Pengantar</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Template Editor</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"><?php echo $data['konten']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <input class="form-control" name="kode"  type="hidden" value="<?php echo $data['id']; ?>"/>
                <input type="submit" class="btn btn-warning" value="UPDATE TEMPLATE SURAT" name="simpan" id="simpan">
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