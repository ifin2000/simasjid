<?php
include('incl/koneksi.php');
$mod = $_GET['pages'];

if ($mod=='organisasi'){
	include "admin/organisasi.php";
}
elseif ($mod=='change'){
    include "admin/change.php";
}
elseif ($mod=='datapengurus'){
	include "admin/datapengurus.php";
}
elseif ($mod=='addpengurus'){
	include "admin/add_pengurus.php";
}
elseif ($mod=='newpengurus'){
	include "admin/new_pengurus.php";
}
elseif ($mod=='ubahpengurus'){
	include "admin/ubah_pengurus.php";
}
elseif ($mod=='setuser'){
	include "admin/setup_user.php";
}
elseif ($mod=='formsurat'){
	include "admin/formatsurat.php";
}
elseif ($mod=='addtempsurat'){
	include "admin/addtempsurat.php";
}
elseif ($mod=='ubahtempsurat'){
	include "admin/ubahtempsurat.php";
}
elseif ($mod=='setwablast'){
	include "admin/setwablast.php";
}
elseif ($mod=='addjamaah'){
	include "admin/add_jamaah.php";
}
elseif ($mod=='datajamaah'){
	include "admin/datajamaah.php";
}
elseif ($mod=='ubahjamaah'){
	include "admin/ubah_jamaah.php";
}
elseif ($mod=='usedokumen'){
	include "arsip/datadokumen.php";
}
elseif ($mod=='adddokumen'){
	include "arsip/add_dokumen.php";
}
elseif ($mod=='ubahdokumen'){
	include "arsip/ubah_dokumen.php";
}
elseif ($mod=='dldok'){
	include "arsip/dldok.php";
}
elseif ($mod=='datasurat'){
	include "arsip/datasurat.php";
}
elseif ($mod=='buatsurat'){
	include "arsip/buatsurat.php";
}
elseif ($mod=='ubahsurat'){
	include "arsip/ubah_surat.php";
}
elseif ($mod=='cetaksurat'){
	include "arsip/createpdf.php";
}
elseif ($mod=='kehadiran'){
	include "arsip/kehadiran.php";
}
elseif ($mod=='notulen'){
	include "arsip/datanotulen.php";
}
elseif ($mod=='buatnotulen'){
	include "arsip/buatnotulen.php";
}
elseif ($mod=='ubahnotulen'){
	include "arsip/ubah_notulen.php";
}
elseif ($mod=='wamanual'){
	include "wablast/manualsend.php";
}
elseif ($mod=='waauto'){
	include "wablast/autosend.php";
}
elseif ($mod=='addustadz'){
	include "tvmasjid/add_ustd.php";
}
elseif ($mod=='ubahustadz'){
	include "tvmasjid/ubah_ustd.php";
}
elseif ($mod=='dataustd'){
	include "tvmasjid/data_ustd.php";
}
elseif ($mod=='jdwjumat'){
	include "tvmasjid/jdw_jumat.php";
}
elseif ($mod=='addkhotib'){
	include "tvmasjid/add_khotib.php";
}
elseif ($mod=='jdwimam'){
	include "tvmasjid/jdw_imam.php";
}
elseif ($mod=='ubahjdwimam'){
	include "tvmasjid/ubah_jdwimam.php";
}
elseif ($mod=='kajianahad'){
	include "tvmasjid/kajian_ahad.php";
}
elseif ($mod=='ubahkajahad'){
	include "tvmasjid/ubah_kajahad.php";
}
elseif ($mod=='entrydana'){
	include "keuangan/inoutdana.php";
}
elseif ($mod=='ubahtrans'){
	include "keuangan/ubahtrans.php";
}
elseif ($mod=='laporan'){
	include "keuangan/lap_dana.php";
}
elseif ($mod=='home'){
	include "awal.php";
}
else{
	include "awal.php";
}
?>