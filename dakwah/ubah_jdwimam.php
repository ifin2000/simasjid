<?php
   $kode=$_GET['hari'];
   include ('../incl/koneksi.php');
   $query = "select hari,imam,cadangan from imam_rowatib where hari='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>

        <div class="page-content-wrap form-horizontal">
        <form action="dakwah/upd_jdwimam.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Jadwal Imam</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Hari :</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="hari" type="text" value="<?php echo $kode; ?>" readonly="true" />
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Imam #1 </label>
            <div class="col-md-9">
              <input class="form-control" name="imam1" type="text" value="<?php echo $data['imam']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Imam #2 </label>
            <div class="col-md-9">
              <input class="form-control" name="imam2"  type="text" value="<?php echo $data['cadangan']; ?>" /></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="submit" class="btn btn-warning" value="Update Data" name="simpan" id="simpan" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>