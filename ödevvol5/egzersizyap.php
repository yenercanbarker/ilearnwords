<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> iLearnWords - Egzersiz Yap </title>
  
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
  background-image: url('img/egzersizyapwallpaper.jpg');        
  background-repeat: repeat;
}

.eklenmetarihi {
  float: right;
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

</style>
</head>

<body>

<!-- Responsive navbar buttonları. -->
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
    <!-- Logo -->
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
      <li class="nav-item ">
        <a class="nav-link" href="index.html"> Ana Sayfa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kelimeekle.php"> Kelime Ekle </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="kelimeler.php"> Kelimeler </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kelimeogren.php"> Kelime Öğren </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="egzersizyap.php"> Egzersiz Yap </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="istatistikler.php"> İstatistikler </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
  <div class="container-fluid text-center col-md-12 pt-2">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong> iLearnWords - Egzersiz Yap  </strong> <br> <br> Bu bölümde öğrenmekte olduğunuz kelimeleri sizlere sorarak gelişiminizi görmenizi sağlıyoruz.<br> 1 gün / 1 hafta / 1 ay / 6 ay aralıklarında öğrenmek istediğiniz kelimeleri sizlere soracağız. <br> Bütün bu aşamaları başarılı bir şekilde geçebilirseniz o kelimeyi öğrenmiş kabul edileceksiniz. <br> BOL ŞANS!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

<?php 
// Veri tabanı bağlantısını oluşturuyoruz.
include('veritabani.php');
// Kelimelerin birbirine karışmaması için dizileri oluşturuyoruz.
$kelimelerdizisi = array(array());
$ogrenimdurumu = array();
$eklenmetarihi = array();
$id = array();
$sayac = 0;
$kelimesayisi = 0;
$sorgusayisi = 0;
// Tarih saat işlemlerini yapıyoruz.
date_default_timezone_set('Etc/GMT-3');
$bugun = time();

try {
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Öğrenilen kelimeler ve istatistikler veri tabanlarından veri çekiyoruz.
  $sorgu = $baglan->query("SELECT id, kelime, kelimetipi, kelimeninturkcesi, cumle FROM kelimelerproje.ogrenilecekkelimeler ORDER BY id");
  $istatistiksorgu = $baglan->query("SELECT id, kelime, ogrenimdurumu, ogrenmetarihi, eklenmetarihi FROM kelimelerproje.istatistikler ORDER BY id");
  // $tarih = $tarih->format('Y-m-d');
  foreach ($istatistiksorgu as $istatistik)
  {
    // İstatistikleri veri tabanındaki her kayıt için id, öğrenimdurumu, eklenme tarihi ve öğrenme tarihini çekiyoruz.
    $id[$kelimesayisi] = $istatistik["id"];
    $ogrenimdurumu[$kelimesayisi] = $istatistik["ogrenimdurumu"];
    $eklenmetarihi[$kelimesayisi] = $istatistik["eklenmetarihi"];
    $eklenmetarihi[$kelimesayisi] = strtotime($eklenmetarihi[$kelimesayisi]);
    $fark[$kelimesayisi] = $bugun - $eklenmetarihi[$kelimesayisi];
    $fark[$kelimesayisi] = floor($fark[$kelimesayisi] / (60*60*24) );
    // Bir kelimeyle işlemlerimiz bittiğinda sayacı bir arttırıyoruz.
    $kelimesayisi++;
  }

  foreach ($sorgu as $cikti) {
    // 4 aşamalı testin aşamaları ve aradaki zaman farkları istediğimiz değerde ise ekrana basma işlemini gerçekleştiriyoruz.
    // Eğer kullanıcı sıfırıncı aşamadaysa ve kelimeyi öğrenmek istediği tarih ile bugün arasında en az 1 gün fark varsa test edilmesi için ekrana yazdır.
    if($ogrenimdurumu[$sorgusayisi] == 0 && $fark[$sorgusayisi] >= 1)
    {
      ekranaYazdir($sayac,$cikti,$istatistik,$ogrenimdurumu,$eklenmetarihi,$sorgusayisi,$id);
    }
    // Eğer kullanıcı birinci aşamadaysa ve kelimeyi öğrenmek istediği tarih ile bugün arasında en az 7 gün fark varsa test edilmesi için ekrana yazdır.
    else if($ogrenimdurumu[$sorgusayisi] == 1 && $fark[$sorgusayisi] >= 7)
    {
      ekranaYazdir($sayac,$cikti,$istatistik,$ogrenimdurumu,$eklenmetarihi,$sorgusayisi,$id);
    }
    // Eğer kullanıcı ikinci aşamadaysa ve kelimeyi öğrenmek istediği tarih ile bugün arasında en az 30 gün fark varsa test edilmesi için ekrana yazdır.
    else if($ogrenimdurumu[$sorgusayisi] == 2 && $fark[$sorgusayisi] >= 30)
    {
      ekranaYazdir($sayac,$cikti,$istatistik,$ogrenimdurumu,$eklenmetarihi,$sorgusayisi,$id);
    }
    // Eğer kullanıcı üçüncü aşamadaysa ve kelimeyi öğrenmek istediği tarih ile bugün arasında en az 180 gün fark varsa test edilmesi için ekrana yazdır.
    else if($ogrenimdurumu[$sorgusayisi] == 3 && $fark[$sorgusayisi]  >= 180)
    {
      ekranaYazdir($sayac,$cikti,$istatistik,$ogrenimdurumu,$eklenmetarihi,$sorgusayisi,$id);
    }
    // Her sorgudan sonra sayaçları 1 arttır.
    $sorgusayisi++;
    $sayac++;
  }
} 
catch (PDOException $e) {
  // Veri tabanı ile ilgili bir sorun oluşursa sorunu ekrana yaz.
  die($e->getMessage());
}

// Veri tabanı işlemleri bittikten sonra bağlantıyı kapat.
$baglan = null;

function ekranaYazdir($sayac,$cikti,$istatistik,$ogrenimdurumu,$eklenmetarihi,$sorgusayisi,$id){
  // Ekrana yazdırma işlemlerini gerçekleştirildiği fonksiyon.
  // Testi yapılacak her kelime için bir div, ve o divde o kelime ile ilgili bilgiler tutuluyor.
  echo '<div class="container-fluid mt-3">'.
  '<form class="mt-2">'.
  '<div class="card">'.
  '<div class="card-header">'.
  "<input id='kelime$sayac' name='kelime' type='hidden' value='$cikti[kelime]' />".
  "<input id='kelimeninturkcesi$sayac' name='kelimeninturkcesi' type='hidden' value='$cikti[kelimeninturkcesi]' />".
  "<input  name='id' type='hidden'  />".$cikti["kelime"].
  "<input id='ogrenimdurumu$sayac' name='ogrenimdurumu' type='hidden' value='$ogrenimdurumu[$sorgusayisi]' />".
  "<input id='eklenmetarihi$sayac' name='eklenmetarihi' type='hidden' value='$eklenmetarihi[$sorgusayisi]' />".
  "<input id='id$sayac' name='eklenmetarihi' type='hidden' value='$id[$sorgusayisi]' />".
  '</div>'.
  '<div class="main-description">'.
  "<input id='cevap$sayac' class='mt-3' type='text'>"."<br>".
  '</div>'.
  "<button id='$sayac' type='button' class='butKontrol btn btn-primary mt-4 center'> Kontrol Et </button>".
  '</form>'.'</div>'.'</div>';
}

?>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/sweetalert2.min.js"></script>

<!-- Custom scripts for this template -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="js/script.js"></script>

<script>


  $(document).ready(function() {
    // Butona tıklandığında
	  $('.butKontrol').on('click', function() { 
      $(".butKontrol").attr("disabled", "disabled");
      // O div içerisindeki kelimeler değişkenlere atanır.
      var kelimeId = $(this).attr('id');
      var id = $('#id' + kelimeId).val();
      var kelime = $('#kelime' + kelimeId).val();
		  var kelimeninturkcesi = $('#kelimeninturkcesi' + kelimeId).val();
      var ogrenimdurumu = $('#ogrenimdurumu' + kelimeId).val();
      var eklenmetarihi = $('#eklenmetarihi' + kelimeId).val();
		  var cevap = $('#cevap' + kelimeId).val();
		  if(kelimeninturkcesi !="" && cevap!=""){
        // Eğer kelimeninturkcesi ve cevap boş değilse ajax ile post işlemi başlar.
			  $.ajax({
				  url: "kontrol.php",
				  type: "POST",
				  data: {
            kelime: kelime,
					  kelimeninturkcesi: kelimeninturkcesi,
					  cevap: cevap,
            ogrenimdurumu: ogrenimdurumu,
            eklenmetarihi: eklenmetarihi,
            id: id	
				  },
				  cache: false,
				  success: function(dataResult){
            // Eğer dataResult döndüyse yani post işlemi başarılıysa
					  var dataResult = JSON.parse(dataResult);
					  if(dataResult.statusCode==200){
              // Eğer 200 numaralı kod döndüyse (kullanıcı kelimenin türkçesini doğru bildiyse)
              ogrenimdurumu++;
              // Öğrenim durumunu bir arttır ve kullanıcıya SweetAlert'i gönder.
              Swal.fire({
  title: '<strong> <span class="text-success"> İŞTE BU </span> </strong>',
  type: 'success',
  html: '<br><b>' + kelime +' = </b>' + kelimeninturkcesi + '<br>' + '<br>' +
    'Bu kelimeyi öğrenim durumun ' + ogrenimdurumu + '/4' +
    '<br> Bir testi daha başarıyla geçtin. Haydi öğrenmeye devam et.' +
    '<br> <br> <a href="egzersizyap.php" class="btn text-info" style="text-decoration:none;"> Devam Et </a>',
    showCancelButton: false,
    showConfirmButton: false,
    closeOnClickOutside: false,
    allowOutsideClick: false
})
					  }
					  else if(dataResult.statusCode==201)
            {
              // Eğer 201 numaralı kod döndüyse (kullanıcı kelimenin türkçesini yanlış bildiyse)
              Swal.fire({
              // SweetAlert ile kullanıcıyı bilgilendir.
  title: '<strong> <span class="text-danger"> HAY AKSİ </span> </strong>',
  type: 'error',
  html:
    '<br><b>' + kelime +' = </b>' + kelimeninturkcesi + '<br>' +
    '<br> Bu kelimeye biraz daha çalışman gerekiyor. <br> 1 gün sonra tekrar dene!' + 
    '<br> <br> <a href="egzersizyap.php" class="btn text-info" style="text-decoration:none;"> Devam Et </a>',
    showCancelButton: false,
    showConfirmButton: false,
    closeOnClickOutside: false,
    allowOutsideClick: false
})
					  }
				  }
			  });
		  }
		  else {
        Swal.fire(
          'Başarısız!',
          'Lütfen cevap giriniz!',
          'error'
        )
		  }
    $(".butKontrol").removeAttr("disabled");
    // window.location.reload(false);
	});
});

</script>

</body>
</html>