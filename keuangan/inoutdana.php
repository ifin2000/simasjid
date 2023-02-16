
    <div class="page-content-wrap form-horizontal">
        <form action="keuangan/pr_inout.php" method="post" name="trans" enctype="multipart/form-data" autocomplete="off">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Entry Pemasukan/Pengeluaran Dana</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>
        <?php
            $saat = date('ym');
            include ('../incl/koneksi.php');
            $result = mysqli_query($db_link,"select max(substr(kode,5)) as last from dat_trans where kode like '$saat%'");
            $data = mysqli_fetch_array($result);
            $nobuk = $saat.str_pad($data["last"]+1,3,"0",STR_PAD_LEFT);
        ?>
        <div class="panel-body">                     
          <div class="form-group">
            <label class="control-label text-left col-md-3">Tgl Transaksi</label>
            <div class="col-md-1 has-success">
              <input class="form-control datepicker" name="tgl" id="tgl" type="text" value="<?php echo date('Y-m-d'); ?>"/>
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Transaksi </label>
            <div class="col-md-2">
              <input class="form-control" name="nobuk" id="nobuk" type="text" value="<?php echo $nobuk; ?>" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kategori </label>
            <div class="col-md-3">
                <select class="form-control select" name="kategori">
                    <option value="">[ pilih salah satu ]</option>
                    <?php
                        $resolt = mysqli_query($db_link,"select nama,jenis from jns_transaksi order by jenis");
                        while ($dato = mysqli_fetch_array($resolt)){
                          echo "<option value='".$dato['jenis']." # ".$dato['nama']."'>".$dato['jenis']." - ".$dato['nama']."</option>";
                        }    
                    ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Keterangan Detil </label>
            <div class="col-md-6">
              <input class="form-control" name="keterangan" type="text"/>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Photo Bukti Transaksi</label>
              <div class="col-md-9">
                  <input type="file" class="fileinput btn btn-danger" name="filephotr" id="filephotr"/> [ khusus utk pengeluaran dana ]
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Nilai (Rp)</label>
              <div class="col-md-2">
              <input class="form-control text-right" name="nilai"  type="text" value="0"/>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
              <input type="submit" class="btn btn-warning" value=" SIMPAN DATA " name="simpan" id="simpan">
            </div>
          </div>         
        </div>      
    </div>
    </form>
                    
    <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#paneldana">
                        DATA PEMASUKAN/PENGELUARAN DANA
                    </a>
                </h4>
            </div>                                                                           
        </div>
        <div class="panel-body" id="paneldana">
        <div class="form-group">
            	<div class="col-md-12">
            	<div class="table-responsive">
                    <table class="table datatable table-bordered table-striped" id="tabeltrans">
                        <thead>
                            <tr class="success">
                                <th style="width:5%">No.Bukti</th>
								                <th style="width:25%">Tgl</th>
								                <th style="width:35%">Keterangan</th>
								                <th style="width:5%">Jenis</th>
								                <th style="width:15%">Nilai (Rp)</th>
								                <th style="width:15%">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='info'>
		                    	<td colspan="6" class="dataTables_empty">Loading data from server</td>
		                    </tr>
                        </tbody>
                        <tfoot>
                        	<tr class="success">
                        		<td colspan="6"></td>
                        	</tr>
                        </tfoot>
                    </table>   
                </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="margin-top: 150px;">
                    <div class="modal-header" style="background-color: #2500f9">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead" style="color: #ffffff">Peringatan</h4>
                        
                    </div>
                    <div class="modal-body">
                       <h4><strong>Anda yakin ingin menghapus data ini ? </strong></h4>
                       <p>INGAT ! Data yang dihapus tidak dapat dikembalikan</p>
                       <p>Tekan Tombol "YA" Apabila Anda Yakin</p>
                       <input type="hidden" id="ide" name="ide">
                    </div>
                    <div class="modal-footer" style="background-color: #97c4ff">
                    <input name="tom" id="tom" type="submit" value="Ya" class="btn btn-success pull-right" onclick="del()" />
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tidak</button>                        
                    </div>
                </div>
            </div>
        </div>
    
    <script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="incl/js/keuangan/datatrans.js"></script>