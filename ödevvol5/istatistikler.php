<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> iLearnWords - İstatistikler </title>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='https://cdn.anychart.com/css/latest/anychart-ui.css'>
  
  <!-- Custom styles for this template -->
  <link href="css\style.css" rel="stylesheet">

<style>

.btn {
  margin: 3px;
}

</style>
</head>

<body id="page-top">

<!-- Responsive navbar butonları -->
<div class="container">
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="index.html">Ana Sayfa</a>
      <a href="kelimeekle.php">Kelime Ekle</a>
      <a href="kelimeogren.php">Kelime Öğren</a>
      <a href="egzersizyap.php">Egzersiz Yap</a>
      <a href="istatistikler.php">İstatistikler</a>
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
  </svg>
  </a>
  <button class="navbar-toggler" onclick="openNav()">
    <span style="font-size:30px;cursor:pointer" >&#9776;</span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html"> Ana Sayfa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
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
      <li class="nav-item active">
        <a class="nav-link " href="istatistikler.php"> İstatistikler </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
  <div class="container-fluid text-center col-md-12 pt-2">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong> iLearnWords - İstatistikler  </strong> <br> <br> Bu bölümde öğrenmiş olduğunuz kelimeleri aylara / yıllara göre grafik ile görmektesiniz.<br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>


<?php
 // Aylara ve yıllara göre veriler tutmak için matris oluşturuyoruz.
$ogrenilenkelimesayisi = array(array());
// Oluşturduğumuz bu matrisi default olarak 0'larla dolduruyoruz.
// Eğer bu işlemi yapmazsak veri tabanından veri çektiğimizde sorun çıkartabilir.
$ogrenilenkelimesayisi = array_fill(2019, 17, array_fill(0, 12, 0));
$sayac = 0;

// Veri tabanını bağlıyoruz.
include('veritabani.php');
try 
{
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sorgu = $baglan->query("SELECT id, kelime, ogrenimdurumu, ogrenmetarihi, eklenmetarihi FROM kelimelerproje.istatistikler ORDER BY ogrenimdurumu"); 
  foreach ($sorgu as $cikti) 
  {
    // Öğrenme tarihini veri tabanından çekiyoruz.
    $ogrenmetarihi = $cikti["ogrenmetarihi"];
    $ogrenmetarihi = strtotime($ogrenmetarihi);
    // Bu tarihin ayını ve yılını buluyoruz.
    $ay = date("m",$ogrenmetarihi);
    $yil = date("Y",$ogrenmetarihi);
    $ay--;
    if($cikti["ogrenimdurumu"] == 4)
    {
     // Öğrenim durumunu kontrol ediyoruz.
     // Öğrenim durumu 4 ise yani kullanıcı kelimenin bütün testlerinden geçmiş ise, bu kelimeyi o yılın o ayında öğrenmiş oluyor.
     // O yılın o ayında öğrenilen kelime sayısını bir arttırıyoruz.
      $ogrenilenkelimesayisi[$yil][$ay]++;
      }
      else
      {
        // hatanın sebebi bu, bu kod varken order by ogrenim durumu ile hata çözülebilir.
        $ogrenilenkelimesayisi[$yil][$ay] = 0; 
      }
    }
} 
catch (PDOException $e) 
{
  // Veri tabanı işlemlerinde herhangi bir hata çıkması durumunda hata mesajını ekrana yazıyoruz.
  die($e->getMessage());
}
// Veri tabanı bağlantısını kapatıyoruz.
$baglanti = null;

// Yıllara göre butonlar oluşturuyoruz.
echo "<div class='container col-md-12 mt-2 pl-4 mb-4'>";
echo "<div class='row'>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2019)'> 2019 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2020)'> 2020 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2021)'> 2021 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2022)'> 2022 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2023)'> 2023 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2024)'> 2024 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2025)'> 2025 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2026)'> 2026 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2027)'> 2027 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2028)'> 2028 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2029)'> 2029 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2030)'> 2030 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2031)'> 2031 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2032)'> 2032 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2033)'> 2033 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2034)'> 2034 </button>";
echo "<br> <br> <button id='1' class='btn btn-primary' onClick='veriBas(2035)'> 2035 </button>";
echo "</div>";
echo "</div>";

?>


</div>
</div>

<!-- İstatistikler tablosu için canvas oluşturuyoruz. -->
<div class="container tablo" class="col-md-12">
  <canvas id="myChart"></canvas>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
<!-- Custom scripts for this template -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

<script>

$(document).ready(function() 
{
  // Sayfa açılır açılmaz 2019 verilerini tabloya basıyoruz.
  veriBas(2019);
});

// Veri bas adında bir fonksiyonumuz var ve yil parametresini alıyor.
function veriBas(yil)
{
  // Birden fazla tablo açıldığında üst üste binmesini engellemek için her yeni tablo açıldığında bir öncekini remove'luyoruz.
  $("canvas").remove();
  $("div.tablo").append('<canvas id="myChart" class="animated fadeIn"></canvas>');
  var yiltoplam = 0;
  // Geçici bir dizi oluşturup phpdeki matrisi ekliyoruz.
  var tempArray = <?php echo json_encode($ogrenilenkelimesayisi); ?>;
  // 12 aydaki öğrenilmiş kelimeleri toplayıp, o yıldaki toplam sayıyı buluyoruz.
  for(var i=0;i<=11;i++)
    yiltoplam += tempArray[yil][i];
  // Chart.js ile istatistikler tablomuzu oluşturuyoruz.
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık', 'Toplam'],
        datasets: [{
            label: yil + ' Aylara Göre Öğrenilen Kelime Sayisi',
            data: [tempArray[yil][0], tempArray[yil][1], tempArray[yil][2],tempArray[yil][3], tempArray[yil][4], tempArray[yil][5],tempArray[yil][6], tempArray[yil][7], tempArray[yil][8],tempArray[yil][9], tempArray[yil][10], tempArray[yil][11],yiltoplam],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
      responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

}

</script>

</body>
</html>
