<?php
$prdin1 = $_POST['prdin1'];
$prdin2 = $_POST['prdin2'];
$masuk = $_POST['jnsmsk'];
$prdout1 = $_POST['prdout1'];
$prdout2 = $_POST['prdout2'];
$keluar = $_POST['jnsklr'];
$prdall1 = $_POST['prdall1'];
$prdall2 = $_POST['prdall2'];
switch ($_POST['pil'])
{
    case "trmasuk" : header ("Location: cet_masuk.php?var1=$prdin1&var2=$prdin2&var3=$masuk");
  		          break;
    case "trkeluar" : header ("Location: cet_keluar.php?var1=$prdout1&var2=$prdout2&var3=$keluar");
  		          break;
    case "trsemua" : header ("Location: cet_all.php?var1=$prdall1&var2=$prdall2");
  		          break;
}
?>