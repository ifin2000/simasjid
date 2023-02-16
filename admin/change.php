<?php 
$login = $_GET['login'];
$recordset = mysqli_query($db_link,"select a.password,b.nama,b.jabatan,a.tingkatan,a.photo from users a,pengurus b where a.id=b.id and a.user='$login'");
$data = mysqli_fetch_array($recordset);
//$foto = $data['photo']; 
$folder_photo = "../yayasan/incl/assets/images/users/";
if ($data["photo"]==""){
    $photo = $folder_photo."logo.png"; }   
else { $photo = $folder_photo.$data["photo"]; }
$hasil2 = $_GET['hasil2'];
if  ($hasil2=="pesaneror"){
	echo "<div class=\"alert alert-danger\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
            <span class=\"glyphicon glyphicon-exclamation-sign\"></span>   <strong>Gagal!</strong> Password Lama Salah
          </div>"; 
}
?>

                <form method="post" enctype="multipart/form-data" action="admin/change2.php">
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"></span> <?php echo $data['nama']; ?></h3>
                                    <p><?php echo $data['jabatan'];?></p>
                                    <div class="text-center" id="user_image">
                                        <img src="<?php echo $photo; ?>" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">                                   
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_change_photo">Upload Photo Profil dari Komputer</a>
                                        </div>
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_ambil_photo_dihp">Ambil Photo dari Kamera Smartphone</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">#Username</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" name="username" id="username" value="<?php echo $login; ?>" class="form-control" readonly="true"/>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Nama Pengguna</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $data['nama'];?>" class="form-control" name="nama" id="nama" readonly="true" />
                                        </div>
                                    </div>     
                                </div>
                                <div class="panel-body form-group-separated">   
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <label class="tect-center">Password</label>
                                        </div>
                                    </div>    
                                    <div class="form-group has-success">
                                        <label class="col-md-3 col-xs-5 control-label">Lama</label>
                                        <div class="col-md-9 col-xs-7">
                                           <input type="password" class="form-control" name="passwordlm"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Baru</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="password" class="form-control" name="passwordbr"/>
                                        </div>
                                    </div>     
                                </div>
                           
        <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Ganti photo Profil</h4>
                    </div>   
                   
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Photo Baru</label>
                            <div class="col-md-4">
                                <input type="file" class="fileinput btn-info" name="userfile" id="userfile" data-filename-placement="inside" title="Select file"/>
                            </div>                            
                        </div>                        
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal animated fadeIn" id="modal_ambil_photo_dihp" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Ganti photo Profil</h4>
                    </div>   
                   
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Ambil Photo Via Kamera</label>
                            <div class="col-md-4">
                                <input type="file" accept="image/*" capture="camera" class="fileinput btn-info" name="userfile_hp" id="userfile_hp" data-filename-placement="inside" title="Ambil Photo"/>
                            </div>                            
                        </div>                        
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
                    <div class="modal-footer">
                        <input type="hidden" name="password" id="password" value="<?php echo $data['password'];?>" /> 
                        <input name="hasil" id="hasil" type="hidden"><input name="mydata" id="mydata" type="hidden">
                        <button class="btn btn-warning btn-block">Save</button>                        
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
</div>
</div>
</form>

	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		// preload shutter audio clip
		var shutter = new Audio();
		shutter.autoplay = false;
		shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
		function attach(){
			Webcam.attach( '#my_camera' );
		}
		function preview_snapshot() {
			// play sound effect
			try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
			shutter.play();			
			Webcam.freeze();	
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';	
		}
		function batal(){
			Webcam.reset();
		    document.getElementById('mydata').value = "";
            document.getElementById('hasil').value = "";
		}
		function cancel_preview() {
			// cancel preview freeze and return to live camera view
			Webcam.unfreeze();
			// reset ke awal	 
			// swap buttons back to first set
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri){
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                document.getElementById('mydata').value = raw_image_data;
                document.getElementById('hasil').value = "sudah";
                document.getElementById('saama').value = "sudah";
            });
	    }
	</script>
