

        <div class="page-content-wrap form-horizontal">
        <form action="admin/new_pengurus.php" method="post" name="trans" autocomplete="off">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Entry Pengurus Baru</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Pengurus</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="nama" id="nama" type="text"/>
            </div>
            <div class="col-md-3">
              [ tidak perlu pakai Ust/Bpk/Ibu/Prof/Dr/dr/dll.. ]
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Rumah </label>
            <div class="col-md-9">
              <input class="form-control" name="alamat" type="text"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Telp/WhatsApp </label>
            <div class="col-md-3">
              <input class="form-control" name="telp" type="text"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Jabatan </label>
            <div class="col-md-3">
                <select class="form-control select" name="jabatan">
                    <option value="">[ pilih salah satu ]</option>
                    <option value="Ketua Pembina">Ketua Pembina</option>
                    <option value="Anggota Pembina">Anggota Pembina</option>
                    <option value="Ketua Pengawas">Ketua Pengawas</option>
                    <option value="Anggota Pengawas">Anggota Pengawas</option>
                    <option value="Ketua Yayasan">Ketua Yayasan</option>
                    <option value="Sekretaris Yayasan">Sekretaris Yayasan</option>
                    <option value="Bendahara Yayasan">Bendahara Yayasan</option>
                    <option value="Humas Yayasan">Humas Yayasan</option>
                    <option value="Ketua Bidang 1">Ketua Bidang 1</option>
                    <option value="Ketua Bidang 2">Ketua Bidang 2</option>
                    <option value="Ketua Bidang 3">Ketua Bidang 3</option>
                    <option value="Ketua Bidang 4">Ketua Bidang 4</option>
                    <option value="Ketua Bidang 5">Ketua Bidang 5</option>
                    <option value="Sekretaris Bidang 1">Sekretaris Bidang 1</option>
                    <option value="Sekretaris Bidang 2">Sekretaris Bidang 2</option>
                    <option value="Sekretaris Bidang 3">Sekretaris Bidang 3</option>
                    <option value="Sekretaris Bidang 4">Sekretaris Bidang 4</option>
                    <option value="Sekretaris Bidang 5">Sekretaris Bidang 5</option>
                    <option value="Bendahara Bidang 1">Bendahara Bidang 1</option>
                    <option value="Bendahara Bidang 2">Bendahara Bidang 2</option>
                    <option value="Bendahara Bidang 3">Bendahara Bidang 3</option>
                    <option value="Bendahara Bidang 4">Bendahara Bidang 4</option>
                    <option value="Bendahara Bidang 5">Bendahara Bidang 5</option>
                    <option value="Anggota Tim Bidang 1">Anggota Tim Bidang 1</option>
                    <option value="Anggota Tim Bidang 2">Anggota Tim Bidang 2</option>
                    <option value="Anggota Tim Bidang 3">Anggota Tim Bidang 3</option>
                    <option value="Anggota Tim Bidang 4">Anggota Tim Bidang 4</option>
                    <option value="Anggota Tim Bidang 5">Anggota Tim Bidang 5</option>
                </select>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Keterangan Jabatan</label>
              <div class="col-md-9">
              <input class="form-control" name="ketjabatan"  type="text"/>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Periode Jabatan</label>
              <div class="col-md-3">
              <input class="form-control" name="periode"  type="text" value="2023-2027"/>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Login Akses ke Sistem</label>
              <div class="col-md-2">
              <input class="form-control" name="user"  type="text" value=""  placeholder="User Anda"/>
              </div>
              <div class="col-md-2">
              <input class="form-control" name="passw"  type="password" value="" placeholder="Password Anda"/>
              </div>
              <label class="control-label text-left col-md-3">[informasikan user & password ini ke ybs]</label>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Aktif ?</label>
              <div class="col-md-3">
                <select class="form-control select" name="aktif">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
              <input type="submit" class="btn btn-warning" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>
      