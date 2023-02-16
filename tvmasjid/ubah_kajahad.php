<?php
   $kode=$_GET['pekan'];
   include ('../incl/koneksi.php');
   $query = "select pekan,ustadz,tema from kajian where pekan='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>

        <div class="page-content-wrap form-horizontal">
        <form action="tvmasjid/upd_kajahad.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Kajian Ahad Shubuh</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Pekan :</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="pekan" type="text" value="<?php echo $kode; ?>" readonly="true" />
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Ustadz </label>
            <div class="col-md-9">
              <input class="form-control" name="ustadz" type="text" value="<?php echo $data['ustadz']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Thema Kajian </label>
            <div class="col-md-9">
              <input class="form-control" name="tema"  type="text" value="<?php echo $data['tema']; ?>" /></textarea>
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