<?php
include('veritabani.php');

if (isset($_POST['kelime'], $_POST['kelimetipi'], $_POST['kelimeninturkcesi'],$_POST['cumle'],$_POST['databasename'])) {
  $kelime = trim(filter_input(INPUT_POST, 'kelime', FILTER_SANITIZE_STRING));
  $kelimetipi = trim(filter_input(INPUT_POST, 'kelimetipi', FILTER_SANITIZE_STRING));
  $kelimeninturkcesi = trim(filter_input(INPUT_POST, 'kelimeninturkcesi', FILTER_SANITIZE_STRING));
  $cumle = trim(filter_input(INPUT_POST, 'cumle', FILTER_SANITIZE_STRING));
  $databasename = trim(filter_input(INPUT_POST, 'databasename', FILTER_SANITIZE_STRING));
  if (empty($kelime) || empty($kelimetipi) || empty($kelimeninturkcesi)  || empty($cumle)) {
    echo json_encode(array("statusCode"=>201));
    die("<p>Lütfen formu eksiksiz doldurun!</p>");
  }
  try {
    if($databasename == "kelimeler")
    {
        $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sorgu = $baglan->prepare("INSERT INTO kelimelerproje.kelimeler(kelime, kelimetipi, kelimeninturkcesi, cumle) VALUES(?, ?, ?, ?)");
        $sorgu->bindParam(1, $kelime, PDO::PARAM_STR);
        $sorgu->bindParam(2, $kelimetipi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $kelimeninturkcesi, PDO::PARAM_STR);
        $sorgu->bindParam(4, $cumle, PDO::PARAM_STR);
        $sorgu->execute();
        echo json_encode(array("statusCode"=>200));
    }
    else if($databasename == "ogrenilecekkelimeler")
    {
        $ogrenilentarih = date("Y-m-d");
        $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sorgu = $baglan->prepare("INSERT INTO kelimelerproje.ogrenilecekkelimeler(kelime, kelimetipi, kelimeninturkcesi, cumle, ogrenilentarih) VALUES(?, ?, ?, ?, ?)");
        $sorgu->bindParam(1, $kelime, PDO::PARAM_STR);
        $sorgu->bindParam(2, $kelimetipi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $kelimeninturkcesi, PDO::PARAM_STR);
        $sorgu->bindParam(4, $cumle, PDO::PARAM_STR);
        $sorgu->bindParam(5, $ogrenilentarih, PDO::PARAM_STR);
        $sorgu->execute();
        echo json_encode(array("statusCode"=>200));
    }
  } 
  catch (PDOException $e) {
    echo json_encode(array("statusCode"=>201));
  }
$baglan  = null;
}
else if (isset($_POST['kelime'],$_POST['databasename']))
{
    $kelime = trim(filter_input(INPUT_POST, 'kelime', FILTER_SANITIZE_STRING));
    $databasename = trim(filter_input(INPUT_POST, 'databasename', FILTER_SANITIZE_STRING));
    if($databasename == "istatistikler")
    {
        $ogrenmetarihi = date("Y-m-d");
        $eklenmetarihi = date("Y-m-d");
        $ogrenimdurumu = 0;
        $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sorgu = $baglan->prepare("INSERT INTO kelimelerproje.istatistikler(kelime, ogrenimdurumu, ogrenmetarihi, eklenmetarihi) VALUES(?, ?, ?, ?)");
        $sorgu->bindParam(1, $kelime, PDO::PARAM_STR);
        $sorgu->bindParam(2, $ogrenimdurumu, PDO::PARAM_STR);
        $sorgu->bindParam(3, $ogrenmetarihi, PDO::PARAM_STR);
        $sorgu->bindParam(4, $eklenmetarihi, PDO::PARAM_STR);
        $sorgu->execute();
        echo json_encode(array("statusCode"=>200));
    }
    else
    echo json_encode(array("statusCode"=>201));
    $baglan  = null;
}

?>