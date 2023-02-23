

        <div class="page-content-wrap form-horizontal">
        <form action="admin/new_jamaah.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Entry Jamaah Baru</h3>
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
              <input class="form-control" name="nama" id="nama" type="text"/>
            </div>
            <div class="col-md-3">
              [ tidak perlu pakai Ust/Bpk/Ibu/Prof/Dr/dr/dll.. ]
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl Lahir</label>
            <div class="col-md-1 has-success">
              <input class="form-control datepicker" value="" name="tgllhr" id="tgllhr" type="text"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Jenis Kelamin</label>
              <div class="col-md-3">
                <select class="form-control select" name="gender">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Rumah </label>
            <div class="col-md-6">
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
            <label class="control-label text-left col-md-3">Warga RT ? </label>
            <div class="col-md-1">
                <!--<select class="form-control select" name="rt">
                    <option value="">[ pilih salah satu ]</option>
                    <option value="1/10">RT01/RW10</option>
                    <option value="2/10">RT02/RW10</option>
                    <option value="3/10">RT03/RW10</option>
                    <option value="4/10">RT04/RW10</option>
                    <option value="5/10">RT05/RW10</option>
                    <option value="6/10">RT06/RW10</option>
                    <option value="7/10">RT07/RW10</option>
                    <option value="24/07">RT24/RW07</option>
                    <option value="25/07">RT25/RW07</option>
                </select>-->
                <input class="form-control" name="rt" type="text"/>
            </div>
            <label class="control-label text-left col-md-3">*hanya pakai angka - 2 digit (misal 02,09,27,dsb)</label>
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

    <script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $( "#tgllhr" ).datepicker({
            dateFormat: "dd-mm-yyyy"
        });
    </script>
      