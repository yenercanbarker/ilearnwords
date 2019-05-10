
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> iLearnWords - Kelimeler </title>

  <!-- Bootstrap core CSS -->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sweetalert2.min.css" rel="stylesheet">
<style>

body{
      background-image: url('img/kelimelerwallpaper.jpg');
      background-size: cover;                      
      background-repeat: no-repeat;
      background-position: center center;   
    }

.card {
  display: flex;
  flex-direction: column;
  border: 1px solid #04ba77;
  border-radius: 4px;
  overflow: hidden;
  margin: 5px;
  background-color: powderblue;
}

.card-header {
  color: #04ba77;
  text-align: center;
  font-size: 22px;
  font-weight: 600;
  border-bottom: 1px solid #04ba77;
  background-color: #c2f3e1;
}

.card-main {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 15px 0;
  background-color: powderblue;
  color: white;
}

.main-description {
  color: #04ba77;
  font-size: 12px;
  text-align: center;

}

.btn {
  background-color: #c2f3e1;
  color: black;
}

.turkcekelime {
  color: black;
  font-weight: bold;
  font-size: 18px;
}

.kelimetip {
  color: grey;
  font-weight: bold;
  font-size: 16px;
}

.cumlesi {
  color: black;
  font-style: italic;
  font-size: 14px;
}

div .cumlesi{
  white-space: nowrap; 
  width: 250px; 
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap:break-word;
  white-space: pre-line;
  padding: 0 25px;
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
                <li class="nav-item active">
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
<div class="container">
<div class="row">

<?php  
include('veritabani.php');

try {
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sorgu = $baglan->query("SELECT id, kelime, kelimetipi, kelimeninturkcesi, cumle FROM kelimelerproje.kelimeler");
  $bugun = date("Y-m-d");

foreach ($sorgu as $cikti) {
      echo '<div class="col-md-4 mt-3">'.
      '<div class="card">'.
      '<div class="card-header">'.
      '<form method="POST" action="kelimeler.php" class="ml-auto mr-auto mt-2">'.
      "<input name='kelime' type='hidden' value='$cikti[kelime]'/>"."<b class='ingkelime'>".$cikti["kelime"]."</b>".'</input>'."<br>".
      "</div>".
      "<div class='card-main'>".
      "<input name='kelimeninturkcesi' type='hidden' value='$cikti[kelimeninturkcesi]' />"."<span class='turkcekelime'>".$cikti["kelimeninturkcesi"]."</span>".
      "<div class='main-description'>".
      "<input name='kelimetipi' type='hidden' value='$cikti[kelimetipi]' />"."<span class='kelimetip'>".$cikti["kelimetipi"]."</span>"."<br>"."<br>".
      "<input name='cumle' type='hidden' value='$cikti[cumle]' />".'<div class="cumlesi">'.$cikti["cumle"]."</div>".
      '</div>'.
      '</div>'.
      "<input name='bugun' type='hidden' value='$bugun' />".
      '<button type="submit" class="btn btn-sm btn-secondary mt-3 mb-3 mx-auto"> Öğren </button>
      </form>'.
      '</div>'.
      '</div>';
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
$baglanti = null;
?> 

<?php
include('veritabani.php');
if (isset($_POST['kelime'], $_POST['kelimetipi'], $_POST['kelimeninturkcesi'],$_POST['cumle'],$_POST['bugun'])) {

  $kelime = trim(filter_input(INPUT_POST, 'kelime', FILTER_SANITIZE_STRING));
  $kelimetipi = trim(filter_input(INPUT_POST, 'kelimetipi', FILTER_SANITIZE_STRING));
  $kelimeninturkcesi = trim(filter_input(INPUT_POST, 'kelimeninturkcesi', FILTER_SANITIZE_STRING));
  $cumle = trim(filter_input(INPUT_POST, 'cumle', FILTER_SANITIZE_STRING));
  $bugun = trim(filter_input(INPUT_POST, 'bugun', FILTER_SANITIZE_STRING));

    if (empty($kelime) || empty($kelimetipi) || empty($kelimeninturkcesi)  || empty($cumle) || empty($bugun)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    try {
        $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sorgu = $baglan->prepare("INSERT INTO kelimelerproje.ogrenilecekkelimeler(kelime, kelimetipi, kelimeninturkcesi, cumle, ogrenilentarih) VALUES(?, ?, ?, ?, ?)");
        $sorgu->bindParam(1, $kelime, PDO::PARAM_STR);
        $sorgu->bindParam(2, $kelimetipi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $kelimeninturkcesi, PDO::PARAM_STR);
        $sorgu->bindParam(4, $cumle, PDO::PARAM_STR);
        $sorgu->bindParam(5, $bugun, PDO::PARAM_STR);
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

    } catch (PDOException $e) {
        echo "<script>  alert('hata');
         </script>";
    }
    $baglan  = null;
}
?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
  <!-- Custom scripts for this template -->
  <script src="js/script.js"></script>
  <script src="js/sweetalert2.min.js"></script>

</div>

</div>
</body>
</html>