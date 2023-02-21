<?php
    include ('../incl/koneksi.php');
    $query = "select pekan,ustadz,tema from kajian";
    $result = mysqli_query($db_link,$query);
    while($data = mysqli_fetch_array($result)){
       if ($data['pekan']=='1') { $pekan1 = '#1'; $ustadz1 = $data['ustadz']; $tema1 = $data['tema']; }
       elseif ($data['pekan']=='2') { $pekan2 = '#2'; $ustadz2 = $data['ustadz']; $tema2 = $data['tema']; }
       elseif ($data['pekan']=='3') { $pekan3 = '#3'; $ustadz3 = $data['ustadz']; $tema3 = $data['tema']; }
       elseif ($data['pekan']=='4') { $pekan4 = '#4'; $ustadz4 = $data['ustadz']; $tema4 = $data['tema']; }
       elseif ($data['pekan']=='5') { $pekan5 = '#5'; $ustadz5 = $data['ustadz']; $tema5 = $data['tema']; }
    }
?>
        <div class="panel panel-info">
             <div class="panel-heading">
             <input type="hidden" name="cabang" id="cabang" value="<?php echo $cbg;?>">
                <h3 class="panel-title">Jadwal Kajian Ahad Shubuh</h3>
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
                                <th style="width:15%">pekan</th>
								<th style="width:25%">Nama Ustadz</th>
								<th style="width:25%">Thema</th>
								<th style="width:5%"></th>
								<th style="width:10%">Proses</th>
                            </tr>
                        </thead>
                        <tbody>                                            
                            <tr id="trow_1">
                                <td class="text-center"><?php echo $pekan1; ?></td>
                                <td><strong><?php echo "Ust. ".$ustadz1; ?></strong></td>
                                <td><?php echo $tema1; ?></td>
                                <td></td>
                                <td>
                                    <a href="?pages=ubahkajahad&pekan=1"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                            <tr id="trow_2">
                                <td class="text-center"><?php echo $pekan2; ?></td>
                                <td><strong><?php echo "Ust. ".$ustadz2; ?></strong></td>
                                <td><?php echo $tema2; ?></td>
                                <td></td>
                                <td>
                                    <a href="?pages=ubahkajahad&pekan=2"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                            <tr id="trow_3">
                                <td class="text-center"><?php echo $pekan3; ?></td>
                                <td><strong><?php echo "Ust. ".$ustadz3; ?></strong></td>
                                <td><?php echo $tema3; ?></td>
                                <td></td>
                                <td>
                                    <a href="?pages=ubahkajahad&pekan=3"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $pekan4; ?></td>
                                <td><strong><?php echo "Ust. ".$ustadz4; ?></strong></td>
                                <td><?php echo $tema4; ?></td>
                                <td></td>
                                <td>
                                    <a href="?pages=ubahkajahad&pekan=4"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                            </tr>
                                <td class="text-center"><?php echo $pekan5; ?></td>
                                <td><strong><?php echo "Ust. ".$ustadz5; ?></strong></td>
                                <td><?php echo $tema5; ?></td>
                                <td></td>
                                <td>
                                    <a href="?pages=ubahkajahad&pekan=5"><button class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>
                                </td>
                        </tbody>
                        <tfoot>
                        	<tr class="success">
                        		<td colspan="5"></td>
                        	</tr>
                        </tfoot>
                    </table>   
                    </div>
                </div>
                </div>
            </div>
        </div>
                                