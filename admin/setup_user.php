<?php
$kode = $_GET['kode'];
include ('../incl/koneksi.php');
$query = "select user,password,akses,tingkatan from users where id='$kode'";
$result = mysqli_query($db_link,$query);
$data = mysqli_fetch_array($result);
$akses = explode(",",$data["akses"]);
?>

<div class="page-content-wrap form-horizontal">
    <form action="admin/pr_setuser.php" method="post" name="trans" autocomplete="off">

        <div class="panel panel-info">
        	<div class="panel-heading">
                <h3 class="panel-title">Setup User [Login Akses ke Sistem]</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label class="control-label text-left col-md-3">Username</label>
                <div class="col-md-2">
                    <input class="form-control" name="user"  type="text" value="<?php echo $data['user']; ?>"  placeholder="User Anda"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label text-left col-md-3">Password</label>
                <div class="col-md-2">
                    <input class="form-control" name="passw"  type="password" value="" placeholder="Password Anda"/>
                </div>
                <label class="control-label text-left col-md-6">[ kosongkan sj bila tidak ingin mengganti password yg sudah ada! ]</label>
            </div>
            <div class="form-group">
              <label class="control-label text-left col-md-3">Tingkatan</label>
              <div class="col-md-3">
                <select class="form-control select" name="adminz">
                    <option value=<?php pilih2($data["tingkatan"],"administrator"); ?>>Administrator</option>
                    <option value=<?php pilih2($data["tingkatan"],"biasa"); ?>>User Biasa</option>
                </select>
              </div>
              <label class="control-label text-left col-md-6">[ jabatan 'Administrator' berhak UBAH & HAPUS data, sesuai Hak Akses yg dimiliki! ]</label>
          </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Hak Akses User</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="control-label text-left col-md-2">Setting Umum </label>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="master1" value=<?php pilih($akses[0],'11'); ?>> Profil Organisasi
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="master2" value=<?php pilih($akses[1],'12'); ?>> Data Pengurus
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="master3" value=<?php pilih($akses[2],'13'); ?>> Format Surat
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="master4" value=<?php pilih($akses[3],'14'); ?>> Setup WA Blast
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="master5" value=<?php pilih($akses[4],'15'); ?>> Data Jamaah
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label text-left col-md-2">Dokumen & Surat </label>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dokumen1" value=<?php pilih($akses[5],'21'); ?>> Akses Dokumen
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dokumen2" value=<?php pilih($akses[6],'22'); ?>> Surat Keluar
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dokumen3" value=<?php pilih($akses[7],'23'); ?>> Notulen Rapat
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label text-left col-md-2">Dakwah Rutin </label>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dakwah1" value=<?php pilih($akses[9],'31'); ?>> Jadwal Imam
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dakwah2" value=<?php pilih($akses[10],'32'); ?>> Data Ustadz/Khotib
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dakwah3" value=<?php pilih($akses[11],'33'); ?>> Jadwal Khotib
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="dakwah4" value=<?php pilih($akses[12],'34'); ?>> Kajian Ahad Shubuh
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label text-left col-md-2">Pengiriman Pesan </label>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="kirim1" value=<?php pilih($akses[13],'41'); ?>> Pengiriman Manual
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="kirim2" value=<?php pilih($akses[14],'42'); ?>> Pengiriman Otomatis
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label text-left col-md-2">Keuangan Yayasan </label>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="finance1" value=<?php pilih($akses[15],'51'); ?>> Entry Data Keuangan
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="check">
                            <input type="checkbox" name="finance2" value=<?php pilih($akses[16],'52'); ?>> Laporan Keuangan Yayasan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3"></label>
                    <div class="col-md-9">
                        <input name="kode" type=hidden value="<?php echo $kode; ?>">
                        <input type="submit" class="btn btn-warning" value=" SIMPAN " name="simpan" id="simpan">
                    </div>
                </div>  

            </div>
        </div>
          
    </form>
</div>

<?php
function pilih($var,$isi2)
{
 if ($var==$isi2){ $isi2="'".$isi2."' checked"; }
 else { $isi2="'".$isi2."'"; }
 echo $isi2;
}

function pilih2($var,$isi)
{
 if ($var==$isi){ $isi="'".$isi."' selected"; }
 else { $isi="'".$isi."'"; }
 echo $isi;
}
?>