<?php
    if ( !isset($_REQUEST['term']) )
    exit;
    //$jbt = $_GET["var"];
    include ('../incl/koneksi.php');
    $rs = mysqli_query($db_link,'select distinct jabatan from pengurus where jabatan like "%'. mysqli_real_escape_string($db_link,$_REQUEST['term']) .'%" order by jabatan asc limit 0,10');
    $data = array();
    if ( $rs && mysqli_num_rows($rs) )
    {
        while( $row = mysqli_fetch_array($rs) )
        {
            $data[] = array(
                'label' => $row['jabatan'] ,
                'value' => $row['jabatan']
            );
        }
    }
    echo json_encode($data);
    flush();
?>