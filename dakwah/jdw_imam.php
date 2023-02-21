<?php
    include ('../incl/koneksi.php');
    $query = "select hari,imam,cadangan from imam_rowatib";
    $result = mysqli_query($db_link,$query);
    while($data = mysqli_fetch_array($result)){
       if ($data['hari']=='Senin') { $hari1 = 'Senin'; $imam11 = $data['imam']; $imam12 = $data['cadangan']; }
       elseif ($data['hari']=='Selasa') { $hari2 = 'Selasa'; $imam21 = $data['imam']; $imam22 = $data['cadangan']; }
       elseif ($data['hari']=='Rabu') { $hari3 = 'Rabu'; $imam31 = $data['imam']; $imam32 = $data['cadangan']; }
       elseif ($data['hari']=='Kamis') { $hari4 = 'Kamis'; $imam41 = $data['imam']; $imam42 = $data['cadangan']; }
       elseif ($data['hari']=='Jumat') { $hari5 = 'Jumat'; $imam51 = $data['imam']; $imam52 = $data['cadangan']; }
       elseif ($data['hari']=='Sabtu') { $hari6 = 'Sabtu'; $imam61 = $data['imam']; $imam62 = $data['cadangan']; }
       elseif ($data['hari']=='Ahad') { $hari7 = 'Ahad'; $imam71 = $data['imam']; $imam72 = $data['cadangan']; }
    }
?>
        <div class="panel panel-info">
             <div class="panel-heading">
             <input type="hidden" name="cabang" id="cabang" value="<?php echo $cbg;?>">
                <h3 class="panel-title">Jadwal Imam Sholat</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            
            <div class="form-group">
            	<div class="col-md-12">
            	    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tabelimam">
                        <thead>
                            <tr class="success">
                                <th style="width:15%">Hari</th>
								<th style="width:25%">Imam #1</th>
								<th style="width:25%">Imam #2</th>
								<th style="width:10%">Proses</th>
                            </tr>
                        </thead>
                        <tbody>                                            
                            <tr id="trow_1">
                                <td class="text-center"><?php echo $hari1; ?></td>
                                <td><strong><?php echo $imam11; ?></strong></td>
                                <td><?php echo $imam12; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Senin"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                            <tr id="trow_2">
                                <td class="text-center"><?php echo $hari2; ?></td>
                                <td><strong><?php echo $imam21; ?></strong></td>
                                <td><?php echo $imam22; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Selasa"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                            <tr id="trow_3">
                                <td class="text-center"><?php echo $hari3; ?></td>
                                <td><strong><?php echo $imam31; ?></strong></td>
                                <td><?php echo $imam32; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Rabu"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $hari4; ?></td>
                                <td><strong><?php echo $imam41; ?></strong></td>
                                <td><?php echo $imam42; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Kamis"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $hari5; ?></td>
                                <td><strong><?php echo $imam51; ?></strong></td>
                                <td><?php echo $imam52; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Jumat"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $hari6; ?></td>
                                <td><strong><?php echo $imam61; ?></strong></td>
                                <td><?php echo $imam62; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Sabtu"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $hari7; ?></td>
                                <td><strong><?php echo $imam71; ?></strong></td>
                                <td><?php echo $imam72; ?></td>
                                <td>
                                    <a href="?pages=ubahjdwimam&hari=Ahad"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
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
                                