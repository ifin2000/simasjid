<div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Data Jamaah Bukit Putra dan sekitarnya</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                <br>&nbsp;<br>&nbsp;<a class="btn btn-warning col-md-3" href="?pages=addjamaah" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>><i class="fa fa-pencil"></i> Entry Jamaah Baru </a><br>&nbsp;<br>&nbsp;
                </div>
            </div>

            <div class="form-group">
            	<div class="col-md-12">
            	<div class="table-responsive">
                    <table class="table datatable table-bordered table-striped" id="tabeljamaah">
                        <thead>
                            <tr class="success">
                                <th style="width:5%">No.</th>
								<th style="width:25%">Nama Jamaah</th>
								<th style="width:35%">Alamat</th>
								<th style="width:5%">RT ?</th>
								<th style="width:15%">No.Telp</th>
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
    <script type="text/javascript" src="incl/js/admin/datajamaah.js"></script>