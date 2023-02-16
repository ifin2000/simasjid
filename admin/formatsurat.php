<?php
   include ('../incl/koneksi.php');
   $result1 = mysqli_query($db_link,"select kode from organisasi");
   $data1 = mysqli_fetch_array($result1);
   $result2 = mysqli_query($db_link,"select header,footer from format_surat");
   $data2 = mysqli_fetch_array($result2);
?>
    <div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Setup Format Surat</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="admin/upd_formsurat.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-3">Format Surat : </label>
            <label class="control-label text-left col-md-4 warning">[kode-surat].[no-urut]/[kode-jabatan]/[kode-org]/[bulan-dalam-romawi]/[tahun]</label>
            <label class="control-label text-left col-md-2 warning">misal: 03.006/KET1/YMAMMS/II/2023</label>
          </div>                     
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kode Surat</label>
            <div class="col-md-3">
                <select class="form-control select" name="jns_srt" id="jns_srt" onchange="kodesurat()">
                    <option value=""> -- pilih jenis surat -- </option>
                    <option value="Keputusan">Surat Keputusan</option>
                    <option value="Undangan">Surat Undangan</option>
                    <option value="Permohonan">Surat Permohonan</option>
                    <option value="Pemberitahuan">Surat Pemberitahuan</option>
                    <option value="Pernyataan">Surat Pernyataan</option>
                    <option value="Tugas">Surat Tugas</option>
                    <option value="Keterangan">Surat Keterangan</option>
                    <option value="Rekomendasi">Surat Rekomendasi</option>
                    <option value="Balasan">Surat Balasan</option>
                    <option value="Pengantar">Surat Pengantar</option>
                </select>
            </div>
            <div class="col-md-1">
                <input class="form-control" name="nosur" id="nosur" type="text" value=""/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Yang mengeluarkan Surat </label>
            <div class="col-md-3">
                <select class="form-control select" name="jns_jbt" id="jns_jbt" onchange="kodejabatan()">
                    <option value=""> -- pilih jabatan berikut -- </option>
                    <option value="Pembina">Dewan Pembina</option>
                    <option value="Pengawas">Dewan Pengawas</option>
                    <option value="KSB">Ketua/Sekretaris/Bendahara</option>
                    <option value="Ketua1">Ketua 1</option>
                    <option value="Ketua2">Ketua 2</option>
                    <option value="Ketua3">Ketua 3</option>
                    <option value="Ketua4">Ketua 4</option>
                    <option value="Ketua5">Ketua 5</option>
                </select>
            </div>
            <div class="col-md-1">
              <input class="form-control" name="kodejbt" id="kodejbt" type="text" value=""/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kode Organisasi </label>
            <div class="col-md-2">
              <input class="form-control" name="kodeorg" type="text" value="<?php echo $data1['kode']; ?>" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kalimat Pembuka </label>
            <div class="col-md-6">
                <textarea name="header" class="form-control" rows="3" cols="20"><?php echo $data2['header']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kalimat Penutup </label>
            <div class="col-md-6">
                <textarea name="footer" class="form-control" rows="3" cols="20"><?php echo $data2['footer']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
              <input type="submit" class="btn btn-danger" value="SIMPAN PENGATURAN" name="simpan" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>         
          </form>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#paneltest">
                        Panel Template Surat
                    </a>
                </h4>
            </div>                                                                           
        </div>
        <div class="panel-body" id="paneltemplate">
            <div class="form-group">
                <div class="col-md-12">
                <br>&nbsp;<a class="btn btn-warning col-md-3" href="?pages=addtempsurat" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>><i class="fa fa-pencil"></i> Buat Template Baru </a>
                </div>
            </div>

            <div class="form-group">
            	<div class="col-md-12">
            	<div class="table-responsive">
                    <table class="table datatable table-bordered table-striped" id="tabeltempsurat">
                        <thead>
                            <tr class="success">
                                <th style="width:25%">Nama Template</th>
								<th style="width:20%">Jenis Surat</th>
								<th style="width:10%">Pembuat</th>
								<th style="width:10%">Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include ('../incl/koneksi.php');
                            $query = "select id,nama,jenis,pembuat from template_surat";
                            $result = mysqli_query($db_link,$query);
                            while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr class='info'>
		                    	<td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['jenis']; ?></td>
                                <td class="text-center"><?php echo $data['pembuat']; ?></td>
                                <td>
                                <?php if($div=='administrator'){ ?>
                                    <a href="?pages=ubahtempsurat&kode=<?php echo $data['id']; ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="left" title="Edit Template"><span class="fa fa-pencil"></span></button></a> - <a href="#"><button class="btn btn-danger btn-rounded btn-condensed btn-sm mb-control" onclick="buka('<?php echo $data['id']; ?>')" id="<?php echo $data['id']; ?>" data-toggle="tooltip" data-placement="left" title="Hapus Pengurus"><span class="fa fa-times"></span></button></a>
                                <?php } ?>
                                </td>
		                    </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                        <tfoot>
                        	<tr class="success">
                        		<td colspan="4"></td>
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

        <script type="text/javascript">
            function buka(kode){
                document.getElementById('ide').value=kode;
                $('#modal_small').modal({backdrop: "static", keyboard: false});               
            }
            function del(){
                var kode = document.getElementById('ide').value;
                window.location.href="admin/del_tempsurat.php?id="+kode;
            }
            function kodesurat(){
                var jenis = $('#jns_srt').val();
                $.ajax({
                    url: 'admin/cekkdsrt.php',
                    type: 'post',
                    data: {
                        "jenis": jenis
                    },
                    beforeSend: function(){
                        //
                    },
                    success: function(data){
                        //alert(data);
                        var kosur = data.split('.');
                        document.getElementById('nosur').value = kosur[0];
                    }
                });
            }
            function kodejabatan(){
                var jenis = $('#jns_jbt').val();
                $.ajax({
                    url: 'admin/cekkdjbt.php',
                    type: 'post',
                    data: {
                        "jenis": jenis
                    },
                    beforeSend: function(){
                        //
                    },
                    success: function(data){
                        //alert(data);
                        document.getElementById('kodejbt').value = data;
                    }
                });
            }
        </script>