<?php

include('veritabani.php');
date_default_timezone_set('Etc/GMT-3');
if (isset($_POST['id'],$_POST['kelime'],$_POST['cevap'],$_POST['ogrenimdurumu'],$_POST['eklenmetarihi'])) 
{
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $id = $_POST['id'];
  $kelimeninturkcesi = $_POST['kelimeninturkcesi'];
  $kelime = trim(filter_input(INPUT_POST, 'kelime', FILTER_SANITIZE_STRING));
  $ogrenimdurumu = $_POST['ogrenimdurumu'];
  $eklenmetarihi = trim(filter_input(INPUT_POST, 'eklenmetarihi', FILTER_SANITIZE_STRING));
  $cevap = $_POST['cevap'];
  $bugun = date("Y-m-d");
  $ogrenmetarihi = $bugun;
  if($kelimeninturkcesi == $cevap)
  {
    if($ogrenimdurumu == 0)
      $ogrenimdurumu = 1;
    else if($ogrenimdurumu == 1)
      $ogrenimdurumu = 2;
    else if($ogrenimdurumu == 2)
      $ogrenimdurumu = 3;
    else if($ogrenimdurumu == 3)
    {
      $ogrenimdurumu = 4;
      $guncelle = $baglan->exec("UPDATE kelimelerproje.istatistikler SET ogrenimdurumu = '$ogrenimdurumu', ogrenmetarihi = '$ogrenmetarihi'  WHERE id = '$id' ORDER BY id");
    }  
    echo json_encode(array("statusCode"=>200));
  }
  else
  {
    $ogrenimdurumu = 0;
    echo json_encode(array("statusCode"=>201));
  }
  $eklenmetarihi = $bugun;
  $guncelle = $baglan->exec("UPDATE kelimelerproje.istatistikler SET ogrenimdurumu = '$ogrenimdurumu', eklenmetarihi = '$eklenmetarihi'  WHERE id = '$id' ORDER BY id");  
  
  $baglan = null;
}  
 
?> 
