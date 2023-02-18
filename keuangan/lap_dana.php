    <div class="page-content-wrap form-horizontal">      
	    <form action="keuangan/cet_lap.php" method="post" enctype="application/x-www-form-urlencoded" target="_blank" autocomplete="off">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Laporan Keuangan</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                        <label class="check"><input class="iradio" name="pil" value="trmasuk" type="radio" checked="true" /> Transaksi Pemasukan</label>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdin1" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="text-center col-md-1">
                	    <strong>s/d</strong>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdin2" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="col-md-4">
                	    <?php
                        include ('../incl/koneksi.php');
                        $intr = mysqli_query($db_link,"select nama from jns_transaksi where jenis='Pemasukan' order by id asc");
                        ?>
                         <select name="jnsmsk" class="form-control select">
                            <option value="semua">Semua Pemasukan</option>
                            <?php 
                            while($pickasr = mysqli_fetch_array($intr)){ 
                                echo "<option value='".$pickasr['nama']."'>".$pickasr['nama']."</option>";
                            } 
                            ?>
                         </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <label class="check"><input class="iradio" name="pil" value="trkeluar" type="radio" /> Transaksi Pengeluaran</label>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdout1" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="text-center col-md-1">
                	    <strong>s/d</strong>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdout2" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="col-md-4">
                	    <?php
                        $intr = mysqli_query($db_link,"select nama from jns_transaksi where jenis='Pengeluaran' order by id asc");
                        ?>
                         <select name="jnsklr" class="form-control select">
                            <option value="semua">Semua Pengeluaran</option>
                            <?php 
                            while($pickasr = mysqli_fetch_array($intr)){ 
                                echo "<option value='".$pickasr['nama']."'>".$pickasr['nama']."</option>";
                            } 
                            ?>
                         </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <label class="check"><input class="iradio" name="pil" value="trsemua" type="radio" /> Transaksi Semua</label>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdall1" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="text-center col-md-1">
                	    <strong>s/d</strong>
                    </div>
                    <div class="col-md-2">
                	    <input type="text" name="prdall2" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $kini;?>">
                    </div>
                    <div class="col-md-4">               	    
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin-bottom: 10px;">
                <button class="btn btn-warning"><span class="glyphicon glyphicon-print"></span>Tampilkan Data Untuk DiCetak</button>
            </div>        
        </form>
    </div>
<script type="text/javascript" src="incl/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="incl/js/plugins/jquery/jquery-ui.min.js"></script>
