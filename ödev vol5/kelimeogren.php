
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> iLearnWords - Kelime Öğren </title>

  <!-- Bootstrap core CSS -->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
<style>
  .kutu{
    padding:20px;
    background-color: red;
    float: left;
	color: white;
  border: 20px solid transparent;
  background-clip: padding-box;
  
  }

  .eklenmetarihi {
float: right;
  }
</style>

</head>
<body>
<div class="container">
                <div id="myNav" class="overlay">
                 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                 <div class="overlay-content">
                  <a href="index.html">Ana Sayfa</a>
                  <a href="kelimeekle.php">Kelime Ekle</a>
                  <a href="#">Kelime Öğren</a>
                  <a href="#">Egzersiz Yap</a>
                  <a href="#">İstatistikler</a>
              </div>
          </div>
            </div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand-lg" href="index.html">
                <svg viewBox="0 0 800 150">
                  <!-- Symbol-->
                  <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">iLearnWords</text>
                </symbol>
                <!-- Duplicate symbols-->
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
            </svg></a>
            <button class="navbar-toggler" onclick="openNav()">
                <span style="font-size:30px;cursor:pointer" >&#9776;</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" href="index.html"> Ana Sayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kelimeekle.php"> Kelime Ekle </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="kelimeler.php"> Kelimeler </a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link" href="kelimeogren.php"> Kelime Öğren </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="egzersizyap.php"> Egzersiz Yap </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#"> İstatistikler </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container">
<div class="row">

<?php  
include('veritabani.php');
date_default_timezone_set('Etc/GMT-3');
$bugun = date("Y-m-d");
$tarih = new DateTime($bugun);
try {

  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $baglan->query("SELECT id, kelime, kelimetipi, kelimeninturkcesi, cumle, ogrenilentarih FROM kelimelerproje.ogrenilecekkelimeler");
    $bugun = date("Y-m-d");

foreach ($sorgu as $cikti) {
      $ogrenilentarih = new DateTime($cikti["ogrenilentarih"]);
      $gunfarki = $ogrenilentarih->diff($tarih);
      echo '<div class="col-md-4 kutu">'.'<div class="col-md-12">'."Kelime :".$cikti["kelime"]."<br>"."Kelime Tipi :".$cikti["kelimetipi"]."<br>"."Kelimenin Türkçesi :".$cikti["kelimeninturkcesi"]."<br>"."Cümle :".$cikti["cumle"]."<br>".'</form>'.'</div>'.'<br>'.'<div class="eklenmetarihi">'.$gunfarki->format('%a').' gün önce eklendi'.'</div>'.'</div>';
    }

} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;

?> 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Custom scripts for this template -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="js/script.js"></script>
</div>

</div>
</body>
</html>