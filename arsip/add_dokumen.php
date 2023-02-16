

        <div class="page-content-wrap form-horizontal">
        <form action="arsip/new_dokumen.php" method="post" name="trans" enctype="multipart/form-data">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Entry Dokumen Baru</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl diunggah</label>
            <div class="col-md-3 has-success">
              <input class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" name="tgl" id="tgl" type="text" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Dokumen</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="nama" id="nama" type="text"/>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Keterangan Dokumen </label>
            <div class="col-md-9">
              <input class="form-control" name="keterangan" type="text"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Upload File</label>
              <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filedok" id="filedok"/> [ ukuran file maks. 10 MB, jenis file harus : jpg, jpeg, png, zip, pdf, doc, docx, ppt, pptx, odt, xls, xlsx ]
              </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">File bisa didownload siapa saja ? </label>
            <!--<div class="col-md-9"><input type="text" class="tagsinput" name="hakakses" id="hakakses" value=""/></div>-->
            <div class="col-md-9">
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses1" value="PEM"> Pembina</label></div>
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses2" value="PWAS"> Pengawas</label></div>
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses3" value="PHAR"> Ketua/Sekrts/Bendahara</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses4" value="KET1"> Ketua 1</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses5" value="KET2"> Ketua 2</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses6" value="KET3"> Ketua 3</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses7" value="KET4"> Ketua 4</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses8" value="KET5"> Ketua 5</label></div>
            </div>
          </div>                    
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $_GET['user']; ?>" name="uploader">
                <input type="submit" class="btn btn-success" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>

<script type="text/javascript" src="incl/js/arsip/adddok.js"></script>
         