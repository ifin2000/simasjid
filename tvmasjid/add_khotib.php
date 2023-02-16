

        <div class="page-content-wrap form-horizontal">
        <form action="tvmasjid/new_khotib.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Entry Jadwal Baru</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl Khotbah</label>
            <div class="col-md-9 has-success">
              <input class="form-control datepicker" value="" name="tgl" id="tgl" type="text"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Khotib</label>
            <div class="col-md-9 has-success">
              <input class="form-control" name="nama" id="nama" type="text"/>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Bilal </label>
            <div class="col-md-9">
              <input class="form-control" name="bilal" id="bilal" type="text"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Muadzin </label>
            <div class="col-md-9">
              <input class="form-control" name="muadzin" id="muadzin"  type="text"/></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
              <input type="submit" class="btn btn-success" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>

<script type="text/javascript" src="incl/js/tvmasjid/addkhotib.js"></script>
         