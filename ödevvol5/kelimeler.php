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
  background-image: url('img/egzersizyapwallpaper.jpg');   
  background-repeat: repeat;
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
        <a class="nav-link " href="istatistikler.php"> İstatistikler </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="container-fluid col-md-12 pt-2">
      <div class="alert text-center alert-info alert-dismissible fade show" role="alert">
        <strong> iLearnWords - Kelimeler  </strong> <br> <br> Bu bölümde veri tabanındaki öğrenebileceğiniz kelimeler gösterilmektedir.<br> Öğren tuşuna basarak o kelimeyi öğrenme sürecine başlayabilirsiniz.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

<?php
// Veri tabanı kodlarını bu sayfaya entegre ediyoruz.
include('veritabani.php');
try {
  // try-catch metodu ile kelimeler veri tabanından kelimeleri çekiyoruz.
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sorgu = $baglan->query("SELECT id, kelime, kelimetipi, kelimeninturkcesi, cumle FROM kelimelerproje.kelimeler");
  $kelimeId = 0;
  foreach ($sorgu as $cikti) {
    // Çektiğimiz her kelimeyi bir div içerisine ekliyoruz.
    // input id'lerine sayaç ekleyerek her kelime ve o kelimenin bilgileri için ona özel bir id vermiş oluyoruz.
    echo '<div class="col-md-4 mt-3">'.
      '<div class="card">'.
      '<div class="card-header">'.
      '<form class="ml-auto mr-auto mt-2">'.
      "<input id='kelime$kelimeId' class='kelime' name='kelime' type='hidden' value='$cikti[kelime]'/>".'<b class="ingkelime">'.$cikti["kelime"].'</b>'.'</input>'."<br>".
      "</div>".
      "<div class='card-main'>".
      "<input id='kelimeninturkcesi$kelimeId' class='kelimeninturkcesi' name='kelimeninturkcesi' type='hidden' value='$cikti[kelimeninturkcesi]' />"."<span class='turkcekelime'>".$cikti["kelimeninturkcesi"]."</span>".
      "<div class='main-description'>".
      "<input id='kelimetipi$kelimeId' name='kelimetipi' class='kelimetipi' type='hidden' value='$cikti[kelimetipi]' />"."<span class='kelimetip'>".$cikti["kelimetipi"]."</span>"."<br>"."<br>".
      "<input id='cumle$kelimeId' name='cumle' type='hidden' class='cumle' value='$cikti[cumle]' />".'<div class="cumlesi">'.$cikti["cumle"]."</div>".
      '</div>'.
      '</div>'.
      "<button type='button' id='$kelimeId' class='butsave btn btn-sm btn-secondary mt-3 mb-3 mx-auto'> Öğren </button>
      </form>".
      '</div>'.
      '</div>';
    // Kelime yazdırıldıktan sonra sayacı arttırıyoruz.
    $kelimeId = $kelimeId + 1;
  }
} 
catch (PDOException $e) {
  // Veri tabanında sorun oluşursa catch'e düşer ve hata mesajını ekrana basar.
  die($e->getMessage());
}
$baglanti = null;
?>

  </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/sweetalert2.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/script.js"></script>

<script>

$(document).ready(function() {
	$('.butsave').on('click', function() {
    // Butona tıklandığında sayaç(id) ile o kelimeyi postlama işlemi gerçekleştirilir.
    var kelimeId = $(this).attr('id');
		$(".butsave").attr("disabled", "disabled");
    var databasename = "ogrenilecekkelimeler";
		var kelime = $('#kelime' + kelimeId).val();
		var kelimetipi = $('#kelimetipi' + kelimeId).val();
		var kelimeninturkcesi = $('#kelimeninturkcesi' + kelimeId).val();
		var cumle = $('#cumle' + kelimeId).val();
		if(kelime!="" && kelimetipi!="" && kelimeninturkcesi!="" && cumle!=""){
			$.ajax({
				url: "kayit.php",
				type: "POST",
				data: {
          databasename: databasename,
					kelime: kelime,
					kelimetipi: kelimetipi,
					kelimeninturkcesi: kelimeninturkcesi,
					cumle: cumle				
				},
				cache: false,
				success: function(dataResult){
          // Eğer POST işlemi başarılıysa bu alana giriş yapıyoruz.
          var dataResult = JSON.parse(dataResult);
          // Eğer veri tabanına ekleme işlemi başarılıysa (dönen statusode ile kontrolü yapılan) SweetAlert'i çalıştırıyoruz. 
					if(dataResult.statusCode==200){
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000
            });
            Toast.fire({
              type: 'success',
              title: 'Öğrenilecek kelimelere eklendi.'
            })
            // Seçilen kelime öğrenilen kelimeler veri tabanına eklenirken, istatistiklere de eklenir. 
            var istatistikDatabase = "istatistikler";
            istatistiklereEkle(kelime,istatistikDatabase);
					}
					else if(dataResult.statusCode==201){
					   
					}
				}
			});
		}
		else{
      Swal.fire(
        'Başarısız!',
        'Lütfen bütün boşlukları doldurun!',
        'error'
        )
		}
    $(".butsave").removeAttr("disabled");
    setTimeout(Sil(kelime), 1000);
	});
});

// Bu fonksiyon ile kelimeler veri tabanından öğrenilen kelimelere ve istatistiklere eklenen kelime silinir.
// Böylece kullanıcı kelimeler.php sitesinde öğrenmemiş olduğu kelimeleri görüntüler.
function Sil(kelime){
  // kelime fonksiyona parametre olarak alındıktan sonra kelime sil.php'ye gönderilir.
  $.ajax({
				url: "sil.php",
				type: "GET",
				data: {
					kelime: kelime,		
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
            // İşlem başarılıysa sweetalert çalıştırılır.
            Swal.fire({
              // SweetAlert ile kullanıcıyı bilgilendir.
  title: '<strong> <span class="text-danger"> HAY AKSİ </span> </strong>',
  type: 'error',
  html:
    '<br> Bu kelime daha önce öğrenilen kelimelere eklendi! <br>' + 'Devam Et butonuna basarak daha önce eklememiş olduğunuz kelimeleri görebilirsiniz.' +  
    '<br> <br> <a href="kelimeler.php" class="btn text-info" style="text-decoration:none;"> Devam Et </a>',
    showCancelButton: false,
    showConfirmButton: false,
    closeOnClickOutside: false,
    allowOutsideClick: false,
})
          }
					else if(dataResult.statusCode==201){
					  
					}
				}
			});
    $(".butsave").removeAttr("disabled");
}
/*
function refreshPage() {
  window.location.reload(false);
}
*/

// Bu fonksiyon ile kelime ve veri tabanı ismi parametreleriyle istatistiklere ekleme işlemi gerçekleştirilir.
function istatistiklereEkle(kelime,databasename){
  $.ajax({
				url: "kayit.php",
				type: "POST",
				data: {
          databasename: databasename,
					kelime: kelime
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000
            });
            Toast.fire({
              type: 'success',
              title: 'Öğrenilecek kelimelere eklendi.'
            })
					}
					else if(dataResult.statusCode==201){
					  
					}
				}
			});
}

</script>
</body>
</html>