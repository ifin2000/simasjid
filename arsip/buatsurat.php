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
                  <h3 class="panel-title">Buat Surat Keluar</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">    
          <form action="arsip/new_buatsurat.php" method="post" name="trans">
          <div class="form-group">
            <label class="control-label text-left col-md-2">Keterangan</label>
            <div class="col-md-4 has-success">
              <input class="form-control" name="keterangan" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Jenis Surat</label>
            <div class="col-md-2">
                <select class="form-control select" name="jenis" id="jenis" onchange="kodesurat()">
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
            <label class="control-label text-left col-md-1">Pembuat </label>
            <div class="col-md-2">
                <select class="form-control select" name="jabat" id="jabat" onchange="kodejabatan()">
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
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">No.Surat </label>
            <div class="col-md-2 has-success">
              <input class="form-control" name="nosur1" id="nosur1" type="text" readonly="true">
            </div>
            <div class="col-md-1 has-success">
              <input class="form-control" name="nosur3" id="nosur3" type="text" readonly="true">
            </div>
            <div class="col-md-1 has-success">
              <input class="form-control" name="nosur4" id="nosur4" type="text" value="<?php echo $data1['kode']; ?>" readonly="true">
            </div>
            <div class="col-md-1 has-success">
              <input class="form-control" name="nosur5" id="nosur5" type="text" value="<?php echo getRomawi(date('m')); ?>" readonly="true">
            </div>
            <div class="col-md-1 has-success">
              <input class="form-control" name="nosur6" id="nosur6" type="text" value="<?php echo date('Y'); ?>" readonly="true">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Pilih Template Surat</label>
            <div class="col-md-3">
                <select class="form-control select" name="template" id="template" onchange="cpkonten()">
                    <option value=""> -- pilih template surat -- </option>
                    <?php
                        $result3 = mysqli_query($db_link,"select id,nama,jenis from template_surat");
                        while ($data3 = mysqli_fetch_array($result3)){
                          echo "<option value='".$data3['id']."'>".$data3['nama']." [".$data3['jenis']."]</option>";
                        }
                    ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Kalimat Pembuka<br>[isinya bisa dihapus dan/atau digabung dengan isi surat dibawah ini]</label>
            <div class="col-md-6">
                <textarea name="header" class="form-control" rows="3" cols="20"><?php echo $data2['header']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Isi Surat</label>
            <div class="col-md-9 has-success">
              <textarea name="konten" id="summernote"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-2">Kalimat Penutup<br>[isinya bisa Anda hapus dan/atau digabung dengan isi surat diatas]</label>
            <div class="col-md-6">
                <textarea name="footer" class="form-control" rows="3" cols="20"><?php echo $data2['footer']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-warning" value="SIMPAN SURAT" name="simpan" id="simpan">
            </div>
          </div>
          </form>
        </div>
</div>
<?php
  function getRomawi($bln){
      switch ($bln){
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
      }
  }
?>
<script type="text/javascript">
    function kodesurat(){
        var jenis = $('#jenis').val();
        $.ajax({
            url: '../simasjid/admin/cekkdsrt.php',
            type: 'post',
            data: {
                "jenis": jenis
            },
            beforeSend: function(){
                //
            },
            success: function(data){
                //alert(data);
                document.getElementById('nosur1').value = data;
            }
        });
    }
    function kodejabatan(){
        var jenis = $('#jabat').val();
        $.ajax({
            url: '../simasjid/admin/cekkdjbt.php',
            type: 'post',
            data: {
                "jenis": jenis
            },
            beforeSend: function(){
                //
            },
            success: function(data){
                //alert(data);
                document.getElementById('nosur3').value = data;
            }
        });
    }
    function cpkonten(){
        var idt = $('#template').val();
        $.ajax({
            url: 'arsip/copytemplate.php',
            type: 'post',
            data: {
              "idt": idt
            },
            beforeSend: function(){
              //
            },
            success: function(data){
              $("#summernote").code(data);
            }
        });
    }
</script>
