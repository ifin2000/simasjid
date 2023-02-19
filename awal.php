<?php
session_start();
$login = $_SESSION['nama'];
// GET FROM API
date_default_timezone_set('Asia/Jakarta');
$thn = date('Y');
$bln = date('m');
$tgl = date('d');
$url = 'https://api.myquran.com/v1/sholat/jadwal/1204/'.$thn.'/'.$bln.'/'.$tgl;     // 1204: kode kab.bogor -> sumber API https://documenter.getpostman.com/view/841292/Tz5p7yHS#intro
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
$shubuh = $response['data']['jadwal']['subuh'];
$terbit = $response['data']['jadwal']['terbit'];
$dhuhur = $response['data']['jadwal']['dzuhur'];
$ashar = $response['data']['jadwal']['ashar'];
$maghrib = $response['data']['jadwal']['maghrib'];
$isya = $response['data']['jadwal']['isya'];
// ambil database
include ('incl/koneksi.php');
$now = date("Y-m-d");
$ago = date('Y-m-d',strtotime('-31 days',strtotime($now))) . PHP_EOL;
// PENGAMBILAN DATA DARI DATABASE UNTUK Pemasukan
$quercit    = "select a.nama,sum(b.nilai) as total from jns_transaksi a, dat_trans b where (b.tgl BETWEEN '$ago' AND '$now') and a.jenis='Pemasukan' and a.nama=b.nama group by b.nama";
$myquercit = mysqli_query($db_link,$quercit);
$rowscit = array();
while ($rowcit  = mysqli_fetch_assoc($myquercit)) {
    $rowscit[] = $rowcit;
}
$bimcit = json_encode($rowscit,JSON_NUMERIC_CHECK);
// PENGAMBILAN DATA DARI DATABASE UNTUK Pengeluaran
$querpot    = "select a.nama,sum(b.nilai) as total from jns_transaksi a, dat_trans b where (b.tgl BETWEEN '$ago' AND '$now') and a.jenis='Pengeluaran' and a.nama=b.nama group by b.nama";
$myquerpot = mysqli_query($db_link,$querpot);
$rowspot = array();
while ($rowpot  = mysqli_fetch_assoc($myquerpot)) {
    $rowspot[] = $rowpot;
}
$bimpot = json_encode($rowspot,JSON_NUMERIC_CHECK);
// PENGAMBILAN DATA UTK GRAFIK PEMASUKAN/PENGELUARAN
$rows = array();
$kueri = mysqli_query($db_link,"select tgl,sum(if(jenis='Pemasukan',nilai,0)) as masuk,sum(if(jenis='Pengeluaran',nilai,0)) as keluar from dat_trans where (tgl BETWEEN '$ago' AND '$now') group by tgl");
while($row = mysqli_fetch_assoc($kueri)){
    $rows[] = $row;
}
$datgraf=json_encode($rows);
// fungsi tgl indonesia
function tanggal_indo($tanggal, $cetak_hari = false){
	$hari = array ( 1 => 'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Ahad'
			);			
	$bulan = array (1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
<div class="page-content-wrap">
    <div class="row">
    <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Jadwal Sholat Harian </h3>
                        <span>Jadwal Sholat berdasar data Kementerian Agama Republik Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="panel-body padding-0">
                <div class="row" style="text-align: center; padding-top: 10px;">
        <div class="col-md-2">
            <div class="widget widget-default widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="">&nbsp;</div>
                <div class="widget-title"><?php echo tanggal_indo (date('Y-m-d'), true); ?></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-info widget-item-icon">
                <div class="widget-subtitle">Jadwal Sholat</div>
                <div class="widget-title">Shubuh</div>
                <div class="widget-int"><?php echo $shubuh; ?> WIB</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-warning widget-item-icon">
                <div class="widget-subtitle">Jadwal Sholat</div>
                <div class="widget-title">Dhuhur</div>
                <div class="widget-int"><?php echo $dhuhur; ?> WIB</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-success widget-item-icon">
                <div class="widget-subtitle">Jadwal Sholat</div>
                <div class="widget-title">Ashar</div>
                <div class="widget-int"><?php echo $ashar; ?> WIB</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-danger widget-item-icon">
                <div class="widget-subtitle">Jadwal Sholat</div>
                <div class="widget-title">Maghrib</div>
                <div class="widget-int"><?php echo $maghrib; ?> WIB</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-primary widget-item-icon">
                <div class="widget-subtitle">Jadwal Sholat</div>
                <div class="widget-title">Isya</div>
                <div class="widget-int"><?php echo $isya; ?> WIB</div>
            </div>
        </div>
        </div></div></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Grafik Analisa Keuangan Yayasan </h3>
                        <span><?php echo date('d-m-Y',strtotime('-31 days',strtotime($now))) . PHP_EOL; ?> s/d <?php echo date('d-m-Y'); ?> [data sebulan terakhir]</span>
                    </div>
                </div>
            </div>
            <div class="panel-body padding-0">
                <div class="row" style="text-align: center; padding-top: 10px;">
                    <div class="col-md-6">
                        <!-- START DISCRETE CHART -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div>
                                    <h3>Pemasukan menurut jenisnya</h3>
                                </div>
                                <div id="chart-masuk" style="height: 300px;"><svg></svg></div>
                            </div>
                        </div>
                        <!-- END DISCRETE CHART -->
                    </div>
                    <div class="col-md-6">
                            <!-- START LINE CHART -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div>
                                        <h3>Pengeluaran menurut jenisnya</h3>
                                    </div>
                                    <div id="chart-keluar" style="height: 300px;"><svg></svg></div>
                                </div>
                            </div>
                            <!-- END LINE CHART -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <!-- START SALES & EVENTS BLOCK -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Perkembangan Keuangan Yayasan Dari Tgl <?php echo date('d-m-Y',strtotime('-31 days',strtotime($now))) . PHP_EOL; ?> s/d <?php echo date('d-m-Y'); ?></h3>
                    <span>Pemasukan & Pengeluaran [data sebulan terakhir]</span>
                </div>
            </div>
            <div class="panel-body padding-0">
                <div id="areachart" style="height: 350px;"></div>
            </div>
        </div>
        <!-- END SALES & EVENTS BLOCK -->
        </div>
    </div>

</div>

<link rel="stylesheet" href="incl/js/plugins/morris2/morris.css"></link>
<script type="text/javascript" src="incl/js/plugins/morris2/spec/vendor/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/morris2/spec/vendor/raphael-2.1.0.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/morris2/morris.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/nvd3/lib/d3.v3.js"></script>
<script type="text/javascript" src="incl/js/plugins/nvd3/nv.d3.min.js"></script>
<script type="text/javascript">
Morris.Area({
    element: 'areachart',
    data: <?php echo $datgraf; ?>,
    xkey: 'tgl',
    ykeys: ['masuk', 'keluar'],
    labels: ['Pemasukan', 'Pengeluaran']
}).on('click', function(i, row) {
    console.log(i, row);
});
</script>
<script type="text/javascript">
var nvd3Charts = function() {
    var myColorsz = ["#8C510A", "#F7EC37", "#33414E", "#8DCA35", "#00BFDD", "#FF702A", "#DA3610",
        "#80CDC2", "#D9EF8B", "#FFFF99", "#F46D43",
        "#E08215", "#D73026", "#A12235", "#542688", "#14514B", "#A6D969", "#4D9220",
        "#4575B4", "#74ACD1", "#B8E1DE", "#FEE0B6", "#FDB863",
        "#C51B7D", "#DE77AE", "#EDD3F2"
    ];
    var myColorsx = ["#8C510A", "#F7EC37", "#33414E", "#8DCA35", "#00BFDD", "#FF702A", "#DA3610",
        "#80CDC2", "#D9EF8B", "#FFFF99", "#F46D43",
        "#E08215", "#D73026", "#A12235", "#542688", "#14514B", "#A6D969", "#4D9220",
        "#4575B4", "#74ACD1", "#B8E1DE", "#FEE0B6", "#FDB863",
        "#C51B7D", "#DE77AE", "#EDD3F2"
    ];
    d3.scale.myColorsz = function() {
        return d3.scale.ordinal().range(myColorsz);
    };
    d3.scale.myColorsx = function() {
        return d3.scale.ordinal().range(myColorsx);
    };
    var startChartMasuk = function() {
        nv.addGraph(function() {
            var chart = nv.models.discreteBarChart()
                .x(function(d) {
                    return d.nama;
                }) //Specify the data accessors.
                .y(function(d) {
                    return d.total;
                }).staggerLabels(true) //Too many bars and not enough room? Try staggering labels.
                .tooltips(false) //Don't show tooltips
                .showValues(true) //...instead, show the bar value right on top of each bar.
                .transitionDuration(350)
                .color(d3.scale.myColorsz().range());;

            d3.select('#chart-masuk svg').datum(exampleData()).call(chart);

            nv.utils.windowResize(chart.update);

            return chart;
        });
        //Each bar represents a single discrete quantity.
        function exampleData() {
            return [{
                key: "Cumulative Return",
                values: <?=$bimcit?>
            }];
        }
    };
    var startChartKeluar = function() {
        nv.addGraph(function() {
            var chart = nv.models.discreteBarChart().x(function(d) {
                    return d.nama;
                }) //Specify the data accessors.
                .y(function(d) {
                    return d.total;
                }).staggerLabels(true) //Too many bars and not enough room? Try staggering labels.
                .tooltips(false) //Don't show tooltips
                .showValues(true) //...instead, show the bar value right on top of each bar.
                .transitionDuration(350)
                .color(d3.scale.myColorsx().range());;

            d3.select('#chart-keluar svg').datum(exampleDato()).call(chart);

            nv.utils.windowResize(chart.update);

            return chart;
        });
        //Each bar represents a single discrete quantity.
        function exampleDato() {
            return [{
                key: "Cumulative Return",
                values: <?=$bimpot?>
            }];
        }
    };

    return {
        init: function() {
            startChartMasuk();
            startChartKeluar();
        }
    };
}();

nvd3Charts.init();
</script>