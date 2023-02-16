<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select ipserver,nomor,pengenal,header,footer from setup_wablast";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>
        <div class="page-content-wrap form-horizontal">
        <form action="admin/upd_setupwa.php" method="post" name="trans">
        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Setup WhatsApp Blast</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>
        <div class="panel-body">                       
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.WhatsApp</label>
            <div class="col-md-3 has-success">
              <input class="form-control" name="nowa" id="nowa" type="text" readonly="true" value="<?php echo $data['nomor']; ?>"/>
            </div>
            <div class="col-md-3">
              <input type="button" class="btn btn-warning" value="Buka QR Code" onclick="genqr()" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">IP WhatsApp Server </label>
            <div class="col-md-3">
              <input class="form-control" name="ipsrv" type="text" readonly="true" value="<?php echo $data['ipserver']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Kode Pengenal </label>
            <div class="col-md-3">
              <input class="form-control" name="apikey" type="text" readonly="true" value="<?php echo $data['pengenal']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Salam Pembuka </label>
            <div class="col-md-3">
              <input class="form-control" name="header" type="text" value="<?php echo $data['header']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Salam Penutup </label>
            <div class="col-md-6">
              <input class="form-control" name="footer" type="text" value="<?php echo $data['footer']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
              <input type="submit" class="btn btn-danger" value="SIMPAN PENGATURAN" name="simpan" <?php if($div=='administrator'){ echo ''; } else { echo 'disabled="true"'; } ?>>
            </div>
          </div>         
        </div>
        </form>
        <!--<div class="progress progress-small">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
        </div>-->
        <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#paneltest">
                        PANEL UJICOBA KIRIM PESAN
                    </a>
                </h4>
            </div>                                                                           
        </div>
        <div class="panel-body" id="paneltest">
        <div class="form-group">
            <form action="#" id="formupl" enctype="multipart/form-data" method="post">
                <label class="control-label text-left col-md-3">Upload File gambar dahulu sebelum dikirimkan<br>(bila belum ada di pilihan)</label>
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
        <div class="form-group">
            <label class="control-label text-left col-md-3">Isi Pesan yg akan dikirimkan</label>
            <div class="col-md-6">
                <textarea name="isi" id="isinya" class="form-control" rows="5" cols="30"></textarea>
            </div>
            <label class="control-label text-left col-md-2">Pilih Gambar</label>
            <div class="col-md-3">
                <select name="pilgam" id="pilgam" class="form-control select">
                    <option value="kosong">--Tidak Pakai Gambar--</option>
                    <?php
                        $dir = __DIR__."/img_pesan/";
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
        <div class="form-group">
            <label class="control-label text-left col-md-3">Test Kirim Pesan <i
                    class="fa fa-question-circle" data-container="body" data-toggle="popover"
                    data-placement="top"
                    data-content="Test Kirim Hanya untuk Pengiriman 1 Nomor saja."
                    style="cursor: pointer"></i></label>
            <div class="col-md-3">
                <input class="form-control" id="penerima" name="penerima" maxlength="30" required=""
                    placeholder="isikan 1 Nomor Whatsapp penerima disini">
            </div>
            <div class="col-md-2 btn btn-info pull-left" id="kirim_l" onClick="kirlang()">
                Kirim Langsung
            </div>
        </div>
        </div>  
    </div>
    </form>
    </div>

<script type="text/javascript">
/*$( document ).ready(function() {
        var content;
        $('#isinya').on('keyup', function(){
            // count words by whitespace
            var char = $(this).val().length;
            if (char == 0) {
                $('#myWordCount').text("1000 character left");
            }else{
               $('#myWordCount').text(1001-char+" character left");
                // limit message
                if(char>=1001){
                    // $(this).val(content);
                    content = $(this).val().substring(0, 1000);
                    $(this).val(content);
                    $('#myWordCount').text("0 character left");
                    alert('no more than 1000 character, please!');
                } else {    
                    content = $(this).val();
                } 
            }
        });
    });*/
function genqr(){
   popupCenter({url: "<?php echo $data['ipserver']; ?>", title: 'Whatsapp QR Scan Status', w: 330, h: 640}); 
}
const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    newWindow.oncontextmenu = function() {
        return false;
    } 
    if (window.focus) newWindow.focus();
}
function uplimg(){
    var form = $('#formupl')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    $.ajax({
        url: 'admin/uplimg.php',
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
function kirlang(){
    var penerima = $('#penerima').val();
    var pesan = $('#isinya').val();
    var e = document.getElementById("pilgam");
    var pilgam = e.options[e.selectedIndex].value;
    $.ajax({
        url: 'admin/test_kirim.php',
        type: 'post',
        data: {
            "penerima":penerima,
            "pesan":pesan,
            "pilgam":pilgam
        },
        beforeSend: function(){
            $('#kirim_l').html('Proses mengirim...');
        },
        success: function(data){
            console.log(data);
            if(data=="Success" || data=="1" || !isNaN(data)){
                $('#kirim_l').html('Sukses, Kirim Lagi?');
            }else{
                $('#kirim_l').html('ERROR!! Coba Lagi?');
                console.log(data);
            }
        }
    });
}
</script>