    <div class="page-content-wrap form-horizontal">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Panel WhatsApp Blast (Kirim Manual/Terjadwal)</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>                               
                                           
        </div>
    <div class="panel-body" id="panelmanual">
        <div class="form-group col-md-9">
            <form action="#" id="formupl" enctype="multipart/form-data" method="post">
                <label class="control-label text-left col-md-3">Upload File gambar dahulu sebelum dikirimkan (bila belum ada di pilihan)</label>
                <div class="col-md-2">
                    <input type="file" class="fileinput btn-warning btn-block" name="filename3"
                        id="filename3" data-filename-placement="inside" title="Upload Gambar" />
                </div>
                <div class="col-md-2">
                    <span id="uplgm" class="btn btn-success btn-block"
                        onclick="uplimg()">Simpan</span>
                </div>
            </form>
        </div>
        <br><br>
        <form action="wablast/pr_manualsend.php" method="post" name="trans">
        <div class="form-group col-md-9">
            <label class="control-label text-left col-md-3">Isi Pesan yg akan dikirimkan<br>(header & footer akan ditambahkan otomatis by system)</label>
            <div class="col-md-6">
                <textarea name="isi" id="isinya" class="form-control" rows="10" cols="30"></textarea>
            </div>
            <label class="control-label text-left col-md-2">Pilih Gambar</label>
            <div class="col-md-3">
                <select name="pilgam" id="pilgam" class="form-control select">
                    <option value="kosong">--Tidak Pakai Gambar--</option>
                    <?php
                        $dir = "../yayasan/admin/img_pesan/";
                        if (is_dir($dir)){
                          if ($dh = opendir($dir)){
                            while (($file = readdir($dh)) !== false){
                                if($file !== '.' && $file !== '..'){
                                    echo "<option value='".$file."'>$file</option>";
                                }
                            }
                            closedir($dh);
                          }
                        }
                    ?>
                </select>
            </div>
        </div>
        <!--<div class="form-group" style="margin-top: -10px;">
            <div class="col-md-3"></div>
            <div class="col-md-9" style="text-align: right;">
                <small id="myWordCount" class="">1000 character left</small>
            </div>
        </div>-->
        <div class="form-group col-md-9">
            <label class="control-label text-left col-md-3">Tanggal Pengiriman</label>
            <div class="col-md-4">
                <div class="input-group date">
                    <input type="text" id="dp-3" name="senddate" class="form-control datepicker"
                        data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>" />
                    <span class="input-group-addon">s/d</span>
                    <?php 
                    $timestamp = strtotime(date("d-m-Y"));
                    $nextdate = date('d-m-Y', strtotime('+30 day', $timestamp));
                    ?>
                    <input type="text" id="enddate" name="enddate" class="form-control datepicker"
                        data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <label class="control-label text-left col-md-4"> note: range tgl hanya sbg gambaran rentang waktu kirim.</label>
        </div>
        
        <div class="form-group col-md-9">
        <label class="control-label text-left col-md-3">Kategori Penerima</label>
            <div class="col-md-2">
                <label class="check"><input type="checkbox" name="pengurus"
                        value="1" />&nbsp;&nbsp; Khusus Pengurus *</label>
            </div>
        </div>
        <div class="form-group col-md-9">
        <label class="control-label text-left col-md-3"></label>
        <div class="col-md-2">
            <label class="check"><input type="checkbox" name="kat_null"
                        value="1" />&nbsp;&nbsp; Data WA Tanpa Nama*</label>
            </div>
            <div class="col-md-2">
                <select class="form-control select" name="sel_null" id="sel_null">
                    <option value="1">RT 01</option>
                    <option value="2">RT 02</option>
                    <option value="3">RT 03</option>
                    <option value="4">RT 04</option>
                    <option value="5">RT 05</option>
                    <option value="6">RT 06</option>
                    <option value="7">RT 07</option>
                    <option value="24">RT 24</option>
                    <option value="25">RT 25</option>
                    <option value="-">Lain-lain</option>
                </select>
            </div>
        <hr>
        </div>
        <div class="form-group col-md-9">
        <label class="control-label text-left col-md-3"></label>
        <div class="col-md-2">
            <label class="check"><input type="checkbox" name="kat_rt"
                        value="1" readonly="false" />&nbsp;&nbsp; Warga Muslim RT</label>
            </div>
            <div class="col-md-3">
                <select class="form-control select" name="sel_rt" id="sel_rt">
                    <option value="1">RT 01</option>
                    <option value="2">RT 02</option>
                    <option value="3">RT 03</option>
                    <option value="4">RT 04</option>
                    <option value="5">RT 05</option>
                    <option value="6">RT 06</option>
                    <option value="7">RT 07</option>
                    <option value="24">RT 24</option>
                    <option value="25">RT 25</option>
                    <option value="-">Lain-lain</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-9">
            <label class="control-label text-left col-md-3"></label>
            <div class="col-md-2">
                <label class="check"><input type="checkbox" name="kat_gender"
                        value="1" />&nbsp;&nbsp; Jenis Kelamin</label>
            </div>
            <div class="col-md-3">
                <select class="form-control select" name="sel_gender" id="sel_gender">
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-Laki</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-9">
            <label class="control-label text-left col-md-3"></label>
            <div class="col-md-2">
                <label class="check"><input type="checkbox" name="kat_range"
                        value="1" />&nbsp;&nbsp; Range Umur</label>
            </div>
            <div class="col-md-1">
                <input type="text" name="inp_beg_umur" id="inp_beg_umur" class="form-control" value="15">
            </div>
            <div class="col-md-1">
                <label class="control-label text-center>">s/d</label>
            </div>
            <div class="col-md-1">
                <input type="text" name="inp_end_umur" id="inp_end_umur" class="form-control" value="30">
            </div>
        </div>
        <div class="form-group col-md-9">
            <label class="control-label text-left col-md-3"></label>
            <div class="col-md-3">
                <button class="btn btn-danger pull-center" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>JADWALKAN PENGIRIMAN</button>
            </div>
            <label class="control-label text-left col-md-3">*) pilihan ini akan dikirimkan segera!</label>
        </div>
    </div>  
        
    </div>
    </form>
    </div>

<script type="text/javascript">
function uplimg(){
    var form = $('#formupl')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    $.ajax({
        url: '../yayasan/admin/uplimg.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('#uplgm').html('<i class="fa fa-spinner fa-spin"></i> load data from server...');
            $("#uplgm").prop('disabled', true);
        },
        success: function(data){
            //alert(data)
            window.location.reload(true);
            if(data=='success'){
                //window.location.reload(true);
            }else{
                //alert(data)
            }
            $('#uplgm').html(data);
            $("#uplgm").prop('disabled', false);
            //$('#gambfile').html(data);    
        }
    });
}
</script>