<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,nama_dokumen,keterangan,hak_akses,waktu_upload,lokasi_file from dokumen where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
   if ($data['lokasi_file']!=''){ $isi = " note : sudah diupload file dokumennya --> ".$data['lokasi_file']; } else { $isi = "[ ukuran file maks. 10 MB, jenis file harus : jpg, jpeg, png, zip, pdf, doc, docx, ppt, pptx, odt, xls, xlsx ]"; }
   $hakakses = explode('#',$data["hak_akses"]);
?>

        <div class="page-content-wrap form-horizontal">
        <form action="arsip/upd_dokumen.php" method="post" name="trans" enctype="multipart/form-data">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Data Dokumen</h3>
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
              <input class="form-control" value="<?php echo $data['waktu_upload']; ?>" name="tgl" id="tgl" type="text" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Dokumen</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $data['nama_dokumen']; ?>"/>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Keterangan Dokumen </label>
            <div class="col-md-9">
              <input class="form-control" name="keterangan" type="text" value="<?php echo $data['keterangan']; ?>"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Upload File</label>
              <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filedok" id="filedok"/> <?php echo $isi; ?>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">File bisa didownload siapa saja ? </label>
            <!--<div class="col-md-9"><input type="text" class="tagsinput" name="hakakses" id="hakakses" value=""/></div>-->
            <div class="col-md-9">
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses1" value=<?php pilih($hakakses[0],"PEM"); ?>> Pembina</label></div>
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses2" value=<?php pilih($hakakses[1],"PWAS"); ?>> Pengawas</label></div>
                <div class="col-md-2"><label class="check"><input type="checkbox" name="hakakses3" value=<?php pilih($hakakses[2],"PHAR"); ?>> Ketua/Sekrts/Bendahara</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses4" value=<?php pilih($hakakses[3],"KET1"); ?>> Ketua 1</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses5" value=<?php pilih($hakakses[4],"KET2"); ?>> Ketua 2</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses6" value=<?php pilih($hakakses[5],"KET3"); ?>> Ketua 3</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses7" value=<?php pilih($hakakses[6],"KET4"); ?>> Ketua 4</label></div>
                <div class="col-md-1"><label class="check"><input type="checkbox" name="hakakses8" value=<?php pilih($hakakses[7],"KET5"); ?>> Ketua 5</label></div>
            </div>
          </div>                    
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="hidden" value="<?php echo $_GET['user']; ?>" name="uploader">
                <input type="hidden" value="<?php echo $data['id']; ?>" name="kode">
                <input type="submit" class="btn btn-success" value="Update Data" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' checked"; }
    else { $isi="'".$isi."'"; }
    echo $isi;
}         