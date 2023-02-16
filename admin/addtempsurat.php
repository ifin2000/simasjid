
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
          <form action="admin/new_tempsurat.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Judul Template</label>
            <div class="col-md-4 has-success">
              <input class="form-control" name="judul" type="text" maxlength="30">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Jenis Surat</label>
            <div class="col-md-3">
                <select class="form-control select" name="jenis">
                    <option value=""> -- pilih jenis surat --</option>
                    <option value="Surat Keputusan">Surat Keputusan</option>
                    <option value="Surat Undangan">Surat Undangan</option>
                    <option value="Surat Permohonan">Surat Permohonan</option>
                    <option value="Surat Pemberitahuan">Surat Pemberitahuan</option>
                    <option value="Surat Pernyataan">Surat Pernyataan</option>
                    <option value="Surat Tugas">Surat Tugas</option>
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Rekomendasi">Surat Rekomendasi</option>
                    <option value="Surat Balasan">Surat Balasan</option>
                    <option value="Surat Pengantar">Surat Pengantar</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Template Editor</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-warning" value="SIMPAN TEMPLATE SURAT" name="simpan" id="simpan">
            </div>
          </div>
          </form>
        </div>
</div>

