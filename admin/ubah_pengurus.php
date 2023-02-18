<?php
   $kode=$_GET['kode'];
   include ('../incl/koneksi.php');
   $query = "select id,nama,alamat,telp,jabatan,ket_jabatan,periode,aktif from pengurus where id='$kode'";
   $result = mysqli_query($db_link,$query);
   $data = mysqli_fetch_array($result);
?>

        <div class="page-content-wrap form-horizontal">
        <form action="admin/upd_pengurus.php" method="post" name="trans">

        <div class="panel panel-info">
        			<div class="panel-heading">
                  <h3 class="panel-title">Edit Pengurus Baru</h3>
                  <ul class="panel-controls">
                      <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                      <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  </ul>
              </div>
        </div>

        <div class="panel-body">
                                
          <div class="form-group">
            <label class="control-label text-left col-md-3">Nama Pengurus</label>
            <div class="col-md-6 has-success">
              <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $data['nama']; ?>"/>
            </div>
            <div class="col-md-3">
              [ tidak perlu pakai Ust/Bpk/Ibu/Prof/Dr/dr/dll.. ]
            </div> 
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Alamat Rumah </label>
            <div class="col-md-9">
              <input class="form-control" name="alamat" type="text" value="<?php echo $data['alamat']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">No.Telp/WhatsApp </label>
            <div class="col-md-3">
              <input class="form-control" name="telp" type="text" value="<?php echo $data['telp']; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label text-left col-md-3">Jabatan </label>
            <div class="col-md-3">
                <select class="form-control select" name="jabatan">
                    <option value="">[ pilih salah satu ]</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Pembina"); ?>>Ketua Pembina</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Pembina"); ?>>Anggota Pembina</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Pengawas"); ?>>Ketua Pengawas</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Pengawas"); ?>>Anggota Pengawas</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Yayasan"); ?>>Ketua Yayasan</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Yayasan"); ?>>Sekretaris Yayasan</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Yayasan"); ?>>Bendahara Yayasan</option>
                    <option value=<?php pilih($data["jabatan"],"Humas Yayasan"); ?>>Humas Yayasan</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Bidang 1"); ?>>Ketua Bidang 1</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Bidang 2"); ?>>Ketua Bidang 2</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Bidang 3"); ?>>Ketua Bidang 3</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Bidang 4"); ?>>Ketua Bidang 4</option>
                    <option value=<?php pilih($data["jabatan"],"Ketua Bidang 5"); ?>>Ketua Bidang 5</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Bidang 1"); ?>>Sekretaris Bidang 1</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Bidang 2"); ?>>Sekretaris Bidang 2</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Bidang 3"); ?>>Sekretaris Bidang 3</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Bidang 4"); ?>>Sekretaris Bidang 4</option>
                    <option value=<?php pilih($data["jabatan"],"Sekretaris Bidang 5"); ?>>Sekretaris Bidang 5</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Bidang 1"); ?>>Bendahara Bidang 1</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Bidang 2"); ?>>Bendahara Bidang 2</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Bidang 3"); ?>>Bendahara Bidang 3</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Bidang 4"); ?>>Bendahara Bidang 4</option>
                    <option value=<?php pilih($data["jabatan"],"Bendahara Bidang 5"); ?>>Bendahara Bidang 5</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Tim Bidang 1"); ?>>Anggota Tim Bidang 1</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Tim Bidang 2"); ?>>Anggota Tim Bidang 2</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Tim Bidang 3"); ?>>Anggota Tim Bidang 3</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Tim Bidang 4"); ?>>Anggota Tim Bidang 4</option>
                    <option value=<?php pilih($data["jabatan"],"Anggota Tim Bidang 5"); ?>>Anggota Tim Bidang 5</option>
                </select>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Keterangan Jabatan</label>
              <div class="col-md-9">
              <input class="form-control" name="ketjabatan" type="text" value="<?php echo $data['ket_jabatan']; ?>"/>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Periode Jabatan</label>
              <div class="col-md-3">
              <input class="form-control" name="periode"  type="text" value="<?php echo $data['periode']; ?>"/>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label text-left col-md-3">Aktif ?</label>
              <div class="col-md-1">
                <select class="form-control select" name="aktif">
                    <option value=<?php pilih($data["aktif"],"1"); ?>>Aktif</option>
                    <option value=<?php pilih($data["aktif"],"0"); ?>>Tidak Aktif</option>
                </select>
              </div>
              <label class="control-label text-left col-md-6">[saat statusnya 'tidak aktif' maka pengurus ini hak akses ke sistem ikut dimatikan!]</label>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-9">
            <input class="form-control" name="kode"  type="hidden" value="<?php echo $data['id']; ?>"/>
              <input type="submit" class="btn btn-warning" value="Tambahkan" name="simpan" id="simpan">
            </div>
          </div>
          
        </div>
          
    </div>
    </form>
    </div>

<?php
function pilih($var,$isi){
    if ($var==$isi){ $isi="'".$isi."' selected"; }
    else { $isi="'".$isi."'"; }
    echo $isi;
}
?>