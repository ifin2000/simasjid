<?php
session_start();
$login = $_SESSION['nama'];
if (isset($_SESSION["sesi"])){
    include ('incl/koneksi.php');
    $recordSet = mysqli_query($db_link,"select b.nama,b.jabatan,a.tingkatan,a.akses,a.photo from users a,pengurus b where a.id=b.id and a.user='$login'");
    $data = mysqli_fetch_array($recordSet);
    $div = $data["tingkatan"];
    $akses = explode(",",$data["akses"]);
    // lokasi photo
    $folder_photo = "incl/assets/images/users/";
    if ($data["photo"]==""){
    $photo = $folder_photo."logo.png"; }   
    else { $photo = $folder_photo.$data["photo"]; }
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>:: Sistem Informasi Manajemen Masjid [SIMASJID] ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />    
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->       
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="incl/css/theme-forest.css"/>
        <link rel="stylesheet" href="incl/css/summernote/summernote.css">
        <!-- EOF CSS INCLUDE -->                                   
    </head>
    <body>
    <input type="hidden" name="div" id="div" value="<?php echo $div; ?>">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">SIMASJID</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="<?php echo $photo; ?>" alt="Pengurus" />
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                        <a href="?pages=change&login=<?php echo $login; ?>"><img src="<?php echo $photo; ?>" alt="Pengurus" /></a>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?php echo $data['nama'];?></div>
                            <div class="profile-data-title"><?php echo $data['jabatan'];?></div>
                        </div>
                    </div>
                    </li>
                    <li class="xn active">
                        <a href="?pages=home"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">Setting Umum</span></a>
                        <ul>
                            <?php if(in_array('11', $akses)){ ?><li><a href="?pages=organisasi"><span class="fa fa-building"></span> Profil Organisasi</a></li><?php } ?>
                            <?php if(in_array('12', $akses)){ ?><li><a href="?pages=datapengurus"><span class="fa fa-user"></span> Data Pengurus</a></li><?php } ?>
                            <?php if(in_array('13', $akses)){ ?><li><a href="?pages=formsurat"><span class="fa fa-edit"></span> Format Surat</a></li><?php } ?>
                            <?php if(in_array('14', $akses)){ ?><li><a href="?pages=setwablast"><span class="fa fa-bullhorn"></span> WhatsApp Blast</a></li><?php } ?>
                            <?php if(in_array('15', $akses)){ ?><li><a href="?pages=datajamaah"><span class="fa fa-users"></span> Data Jamaah</a></li><?php } ?>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-folder-open"></span> <span class="xn-text">Dokumen & Surat</span></a>
                        <ul>
                            <?php if(in_array('21', $akses)){ ?><li><a href="?pages=usedokumen"><span class="fa fa-download"></span> Akses Dokumen</a></li><?php } ?>
                            <?php if(in_array('22', $akses)){ ?><li><a href="?pages=datasurat"><span class="fa fa-mail-forward"></span> Surat Keluar</a></li><?php } ?>
                            <?php if(in_array('23', $akses)){ ?><li><a href="?pages=notulen"><span class="fa fa-book"></span> Notulen Rapat</a></li><?php } ?>
                            <?php if(in_array('24', $akses)){ ?><li><a href="?pages=kehadiran"><span class="fa fa-check-square-o"></span> Daftar Hadir Rapat</a></li><?php } ?>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">Dakwah Rutin</span></a>
                        <ul>
                            <?php if(in_array('31', $akses)){ ?><li><a href="?pages=jdwimam"><span class="fa fa-bookmark"></span> Jadwal Imam</a></li><?php } ?>
                            <?php if(in_array('32', $akses)){ ?><li><a href="?pages=dataustd"><span class="fa fa-male"></span> Data Ustadz/Khotib</a></li><?php } ?>
                            <?php if(in_array('33', $akses)){ ?><li><a href="?pages=jdwjumat"><span class="fa fa-calendar"></span> Jadwal Khotib</a></li><?php } ?>
                            <?php if(in_array('34', $akses)){ ?><li><a href="?pages=kajianahad"><span class="fa fa-microphone"></span> Kajian Ahad Shubuh</a></li><?php } ?>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-comments"></span> <span class="xn-text">Pengiriman Pesan</span></a>
                        <ul>
                            <?php if(in_array('41', $akses)){ ?><li><a href="?pages=wamanual"><span class="fa fa-comment"></span> Kirim Manual</a></li><?php } ?>
                            <?php if(in_array('42', $akses)){ ?><li><a href="?pages=waauto"><span class="fa fa-bolt"></span> Kirim Otomatis</a></li><?php } ?>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-credit-card"></span> <span class="xn-text">Keuangan Yayasan</span></a>
                        <ul>
                            <?php if(in_array('51', $akses)){ ?><li><a href="?pages=entrydana"><span class="fa fa-money"></span> Keluar/Masuk Dana</a></li><?php } ?>
                            <?php if(in_array('52', $akses)){ ?><li><a href="?pages=laporan"><span class="fa fa-money"></span> Laporan Keuangan</a></li><?php } ?>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION --> 
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>
                                    Sign Out</a></li>
                        </ul>
                    </li>
                <!-- END POWER OFF -->                   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                    <?php
						$tampil= mysqli_query($db_link,"select nama,alamat,kota,telp from organisasi");
                        $data = mysqli_fetch_array($tampil);        
                    ?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                    <?php
						echo $data['nama'] ." - ". $data['alamat'] .", ". $data['kota'] ." - No.Telp: ". $data['telp'];    
                    ?>
                    </li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <!--<div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Page Title</h2>
                </div>-->
                
                <!-- PAGE CONTENT WRAPPER -->
                <?php 
                    include 'content.php'; 
                ?>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box message-box-warning animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-user"> <?php echo $recordSet_data['nama'];?></span> Log
                        <strong>Out</strong> ?
                    </div>
                    <div class="mb-content">
                        <p>Yakin akan keluar ?</p>
                        <p>Tekan TIDAK bila ingin bekerja terus, tekan YA bila memang ingin keluar.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php?log=<?php echo $login; ?>" class="btn btn-success btn-lg">YA</a>
                            <button class="btn btn-default btn-lg mb-control-close">TIDAK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->             
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->  
        <!-- END PLUGINS -->

        <script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="incl/js/plugins/bootstrap/bootstrap.min.js"></script>

        <script type="text/javascript" src="incl/js/plugins.js"></script>        
        <script type="text/javascript" src="incl/js/actions.js"></script>      

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="incl/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="incl/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="incl/js/demo_tables.js"></script>
        <script type='text/javascript' src='incl/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='incl/js/plugins/noty/themes/default.js'></script>
        <script type="text/javascript" src="incl/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="incl/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="incl/js/plugins/bootstrap/bootstrap-file-input.js"></script>

        <script type="text/javascript" src="incl/js/plugins/summernote/summernote.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 250,
                    width: 750,
                });
            });
            var postForm = function() {
                var content = $('textarea[name="content"]').html($('#summernote').code());
            }
        </script>
        
        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
               
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>

<?php
}
else { header("Location: index.php?hasil=logindulu"); }
?>
