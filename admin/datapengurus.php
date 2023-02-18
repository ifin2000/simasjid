<div class="panel panel-info">
            <div class="panel-heading">
               <h3 class="panel-title">Data Pengurus Yayasan</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                <br>&nbsp;<br>&nbsp;<a class="btn btn-warning col-md-3" href="?pages=addpengurus" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>><i class="fa fa-pencil"></i> Entry Pengurus Baru </a><br>&nbsp;<br>&nbsp;
                </div>
            </div>

            <div class="form-group">
            	<div class="col-md-12">
            	<div class="table-responsive">
                    <table class="table datatable table-bordered table-striped" id="tabelpengurus">
                        <thead>
                            <tr class="success">
                                <th style="width:25%">Nama Lengkap</th>
								<th style="width:15%">Jabatan</th>
								<th style="width:20%">Keterangan</th>
								<th style="width:15%">Periode</th>
								<th style="width:10%">No.Telp</th>
								<th style="width:150%">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include ('../incl/koneksi.php');
                            $query = "select id,nama,telp,jabatan,ket_jabatan,periode from pengurus where aktif=1";
                            $result = mysqli_query($db_link,$query);
                            while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr class='info'>
		                    	<td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <td><?php echo $data['ket_jabatan']; ?></td>
                                <td class="text-center"><?php echo $data['periode']; ?></td>
                                <td class="text-center"><?php echo $data['telp']; ?></td>
                                <td>
                                <?php if($div=='administrator'){ ?>
                                    <a href="?pages=ubahpengurus&kode=<?php echo $data['id']; ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="left" title="Edit Pengurus"><span class="fa fa-pencil"></span></button></a> - <a href="?pages=setuser&kode=<?php echo $data['id']; ?>"><button class="btn btn-info btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="left" title="Setup User"><span class="fa fa-cogs"></span></button></a> - <a href="#"><button class="btn btn-danger btn-rounded btn-condensed btn-sm mb-control" onclick="buka('<?php echo $data['id']; ?>')" id="<?php echo $data['id']; ?>" data-toggle="tooltip" data-placement="left" title="Hapus Pengurus"><span class="fa fa-times"></span></button></a>
                                <?php } ?>
                                </td>
		                    </tr>
                        <?php
                            }
                        ?>
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

        <script type="text/javascript">
            function buka(kode){
                document.getElementById('ide').value=kode;
                $('#modal_small').modal({backdrop: "static", keyboard: false});
                
            }
            function del() {
                var kode = document.getElementById('ide').value;
                window.location.href="admin/del_pengurus.php?id="+kode;
            }
        </script>