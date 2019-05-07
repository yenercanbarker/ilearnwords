
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> iLearnWords - Kelime Ekle </title>

  <!-- Bootstrap core CSS -->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <style>
    body{
      background-image: url('img/kelimeeklewallpaper.jpg');
      background-size: cover;                      
      background-repeat: no-repeat;
      background-position: center center;   
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
                <li class="nav-item active">
                    <a class="nav-link" href="kelimeekle.php"> Kelime Ekle </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kelimeler.php"> Kelimeler </a>
                </li>
                <li class="nav-item">
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
    
<div class="container ">
<div class="row mt-4 ">
<div class="col-md-8 mt-5 p-4 pr-5 pl-5 mr-auto ml-auto bg-white">
<form method="POST" id="form" action="kelimeekle.php" class="ml-auto mr-auto mt-5">
<div class="form-group">
    <label> Eklemek İstediğiniz Kelime </label>
    <input name="kelime" class="form-control" placeholder="Kelime giriniz...">
  </div>
    <div class="form-group">
    <label> Kelimenin Tipi </label>
    <input name="kelimetipi" class="form-control" placeholder="İsim/fiil/sıfat/zarf vb.">
  </div>
  <div class="form-group">
    <label> Kelimenin Türkçe Karşılığı </label>
    <input name="kelimeninturkcesi" class="form-control" placeholder="Türkçe çevirisini giriniz...">
  </div>
  <div class="form-group">
    <label> Kelimenin İçinde Geçtiği Bir Cümle </label>
    <input name="cumle" class="form-control" placeholder="Bir cümle giriniz...">
  </div>

  <button type="submit" id="buton" class="btn btn-primary mt-2 mb-2 "> Veri Tabanına Kaydet </button>
</form>

<?php
include('veritabani.php');

if (isset($_POST['kelime'], $_POST['kelimetipi'], $_POST['kelimeninturkcesi'],$_POST['cumle'])) {

  $kelime = trim(filter_input(INPUT_POST, 'kelime', FILTER_SANITIZE_STRING));
  $kelimetipi = trim(filter_input(INPUT_POST, 'kelimetipi', FILTER_SANITIZE_STRING));
  $kelimeninturkcesi = trim(filter_input(INPUT_POST, 'kelimeninturkcesi', FILTER_SANITIZE_STRING));
  $cumle = trim(filter_input(INPUT_POST, 'cumle', FILTER_SANITIZE_STRING));

    if (empty($kelime) || empty($kelimetipi) || empty($kelimeninturkcesi)  || empty($cumle)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    try {
        $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sorgu = $baglan->prepare("INSERT INTO kelimelerproje.kelimeler(kelime, kelimetipi, kelimeninturkcesi, cumle) VALUES(?, ?, ?, ?)");
        $sorgu->bindParam(1, $kelime, PDO::PARAM_STR);
        $sorgu->bindParam(2, $kelimetipi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $kelimeninturkcesi, PDO::PARAM_STR);
        $sorgu->bindParam(4, $cumle, PDO::PARAM_STR);
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglan  = null;
}


?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Custom scripts for this template -->
  <script src="js/script.js"></script>


  

  </div>
</div>

</div>
</body>
</html>