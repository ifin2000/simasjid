<?php
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	/* Database connection information */
	include ('koneksi.php');
	$gaSql['user']       = "$dbUser";
	$gaSql['password']   = "$dbPass";
	$gaSql['db']         = "$dbName";
	$gaSql['server']     = "localhost";
	$var = $_GET['var'];
	$div = $_GET['div'];
	if ($var=='khotib'){
		$sTable = "jumatan"; 		/* DB table to use */	
		$aColumns = array( 'id', 'tgl', 'khotib', 'bilal' , 'muadzin' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
	}
	elseif ($var=='ustadz'){
		$sTable = "data_aktivis"; 		/* DB table to use */	
		$aColumns = array( 'id', 'nama', 'alamat', 'telp' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		//$isi = "WHERE";
		$ekstraWhere = "where jabatan='ustadz'";
		$isi = "AND";
	}
	elseif ($var=='dokumen'){
		$sTable = "dokumen"; 		/* DB table to use */	
		$aColumns = array( 'id', 'nama_dokumen', 'keterangan', 'uploader', 'waktu_upload' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
	}
	elseif ($var=='surat'){
		$sTable = "persuratan"; 		/* DB table to use */	
		$aColumns = array( 'id', 'no_surat', 'tgl_buat', 'keterangan', 'jenis_surat', 'pembuat' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
	}
	elseif ($var=='jamaah'){
		$sTable = "warga_muslim"; 		/* DB table to use */	
		$aColumns = array( 'id', 'nama_lengkap', 'alamat', 'rt', 'nohp' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
		//$ekstraWhere = "where hub_keluarga='Kepala Keluarga'";
		//$isi = "AND";
	}
	elseif ($var=='notulen'){
		$sTable = "notulen_rapat"; 		/* DB table to use */	
		$aColumns = array( 'id', 'waktu', 'lokasi', 'pengundang' );
		$sIndexColumn = "id";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
	}
	elseif ($var=='dattrans'){
		$sTable = "dat_trans"; 		/* DB table to use */	
		$aColumns = array( 'kode', 'tgl', 'uraian', 'jenis', 'nilai' );
		$sIndexColumn = "kode";		/* Indexed column (used for fast and accurate table cardinality) */
		$isi = "WHERE";
		//$ekstraWhere = "where hub_keluarga='Kepala Keluarga'";
		//$isi = "AND";
	}
	elseif ($var=='perawatan'){
		$namaad = $_GET['nama'];
		$sTable = "antrian"; 		/* DB table to use */	
		$aColumns = array( 'nomtri', 'tgl', 'pasien', 'dokter', 'poli');
		$sIndexColumn = "nomtri";		/* Indexed column (used for fast and accurate table cardinality) */
		if($namaad != "") {
			$ekstraWhere = "where (notes!='antri' and notes!='periksa' and nomtri like '$cbg%') and pasien like '%$namaad%'";
		} else {
			$ekstraWhere = "where (notes!='antri' and notes!='periksa' and nomtri like '$cbg%')";
		}
		$isi = "AND";
	}
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysqli_select_db( $gaSql['link'],$gaSql['db'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'],$_GET['iDisplayStart'] ).", ".
			mysqli_real_escape_string( $gaSql['link'],$_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysqli_real_escape_string( $gaSql['link'],$_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$sWhere = $isi." (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'],$_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = $isi." ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'],$_GET['sSearch_'.$i])."%' ";
		}
	}
	
	/*
	* SQL queries
	* Get data to display
	*/
	$sQuery = "
	SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
	FROM   $sTable
	$ekstraWhere
	$sWhere
	$sOrder
	$sLimit";
 	$rResult = mysqli_query( $gaSql['link'],$sQuery ) or die(mysql_error());
	
 	/* Data set length after filtering */
 	$sQuery = "
		 SELECT FOUND_ROWS()
 	";
 	$rResultFilterTotal = mysqli_query( $gaSql['link'],$sQuery ) or die(mysql_error());
 	$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
 	$iFilteredTotal = $aResultFilterTotal[0];
	
 	/* Total data set length */
 	$sQuery = "
		 SELECT COUNT(".$sIndexColumn.")
		 FROM   $sTable
 	";
 	$rResultTotal = mysqli_query( $gaSql['link'],$sQuery ) or die(mysql_error());
 	$aResultTotal = mysqli_fetch_array($rResultTotal);
 	$iTotal = $aResultTotal[0];
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysqli_fetch_array( $rResult ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		if ($var=='khotib'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_khot = "<a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Jadwal\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_khot = "";
			}
			$row[] = $akses_khot.""; 
		}
		if ($var=='ustadz'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_ustd = "<a href=\"?pages=ubahustadz&kode=".$aRow["id"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Ustadz\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Ustadz\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_ustd = "";
			}
			$row[] = $akses_ustd.""; 
		}
		if ($var=='dokumen'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_dok = "<a href=\"?pages=ubahdokumen&kode=".$aRow["id"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Dokumen\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Dokumen\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_dok = "";
			}
			$row[] = "<a href=\"../yayasan/arsip/dldok.php?kode=".$aRow["id"]."\" target=_blank><button class=\"btn btn-warning btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Download Dokumen\"><span class=\"fa fa-download\"></span></button></a> - ".$akses_dok; 
		}
		if ($var=='surat'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_dok = "<a href=\"?pages=ubahsurat&kode=".$aRow["id"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Surat\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Surat\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_dok = "";
			}
			$row[] = "<a href=\"../yayasan/arsip/createpdf.php?kode=".$aRow["id"]."\" target=_blank><button class=\"btn btn-warning btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Cetak Surat\"><span class=\"fa fa-print\"></span></button></a> - ".$akses_dok; 
		}
		if ($var=='notulen'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_dok = "<a href=\"?pages=ubahnotulen&kode=".$aRow["id"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Notulen\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Notulen\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_dok = "";
			}
			$row[] = $akses_dok.""; 
		}
		if ($var=='jamaah'){
        	$ide = $aRow["id"];
        	if ($div == 'administrator') {
        		$akses_jamaah = "<a href=\"?pages=ubahjamaah&kode=".$aRow["id"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Jamaah\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Jamaah\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_jamaah = "";
			}
			$row[] = $akses_jamaah.""; 
		}
		if ($var=='dattrans'){
        	$ide = $aRow["kode"];
        	if ($div == 'administrator') {
        		$akses_jamaah = "<a href=\"?pages=ubahtrans&kode=".$aRow["kode"]."\"><button class=\"btn btn-success btn-rounded btn-condensed btn-sm\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit Transaksi\"><span class=\"fa fa-pencil\"></span></button></a> - <a href=\"#\"><button class=\"btn btn-danger btn-rounded btn-condensed btn-sm mb-control\" onclick=\"buka('". $ide ."')\" id=".$ide." data-toggle=\"tooltip\" data-placement=\"left\" title=\"Hapus Transaksi\"><span class=\"fa fa-times\"></span></button></a>";
			} else {
				$akses_jamaah = "";
			}
			$row[] = $akses_jamaah.""; 
		}
		
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
?>