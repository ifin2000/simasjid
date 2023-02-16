<div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Buat Notulen Rapat</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="arsip/new_notulen.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Tgl Rapat</label>
            <div class="col-md-2 has-success">
              <input class="form-control datepicker" value="" name="tgl" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Lokasi Rapat :</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="lokasi" id="lokasi" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Penyelenggara: </label>
            <div class="col-md-2">
                <select class="form-control select" name="pengundang">
                    <option value=""> -- pilih bagian berikut -- </option>
                    <option value="Pembina">Dewan Pembina</option>
                    <option value="Pengawas">Dewan Pengawas</option>
                    <option value="KSB">Ketua/Sekretaris/Bendahara</option>
                    <option value="Ketua1">Ketua 1</option>
                    <option value="Ketua2">Ketua 2</option>
                    <option value="Ketua3">Ketua 3</option>
                    <option value="Ketua4">Ketua 4</option>
                    <option value="Ketua5">Ketua 5</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Yang Hadir :</label>
            <div class="col-md-6">
                <textarea class="form-control" name="hadir" rows="3" cols="20"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Isi Notulen</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-warning" value="SIMPAN NOTULEN" name="simpan" id="simpan">
            </div>
          </div>
          </form>
        </div>
</div>