
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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sweetalert2.min.css" rel="stylesheet">
  <style>

    header.masthead {
  padding-top: 7rem;
  padding-bottom: calc(12rem - 56px);
  background-image: url('img/kelimeeklewallpaper.jpg');
  background-position: center center;
  background-size: cover;
}
@media (min-width: 992px) {
  header.masthead {
    height: 75vh;
    min-height: 651px;
    padding-top: 0;
    padding-bottom: 0;
  }
  header.masthead h1 {
    font-size: 3rem;
  }
}

@media (max-width: 992px) {
  header.masthead {
    height: 77vh;
    min-height: 608px;
    padding-top: 0;
    padding-bottom: 0;
  }
  header.masthead h1 {
    font-size: 3rem;
  }
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

<header class="masthead">
<div class="container mx-auto ml-2 mr-2">
<div class="row ml-1 mr-1">
<div class="col-md-8 mt-5 p-4 pr-5 pl-5 mr-auto ml-auto bg-white">
<form id="fupForm" class="ml-auto mr-auto mt-5" method="post">
<div class="form-group">
    <label> Eklemek İstediğiniz Kelime </label>
    <input id="kelime" type="text" class="form-control text-lowercase" placeholder="Kelime giriniz...">
  </div>
    <div class="form-group">
    <label> Kelimenin Tipi </label>
    <input id="kelimetipi" type="text" class="form-control text-lowercase" placeholder="İsim/fiil/sıfat/zarf vb.">
  </div>
  <div class="form-group">
    <label> Kelimenin Türkçe Karşılığı </label>
    <input id="kelimeninturkcesi"  type="text" class="form-control text-lowercase" placeholder="Türkçe çevirisini giriniz...">
  </div>
  <div class="form-group">
    <label> Kelimenin İçinde Geçtiği Bir Cümle </label>
    <input id="cumle" type="text"  class="form-control text-lowercase" placeholder="Bir cümle giriniz...">
  </div>

  <button id="butsave" type="button"  class="btn btn-primary mt-2 mb-2 "> Veri Tabanına Kaydet </button>
</form>
</header>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/sweetalert2.min.js"></script>

    <!-- Custom scripts for this template -->
  <script src="js/script.js"></script>
  <script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var kelime = $('#kelime').val();
		var kelimetipi = $('#kelimetipi').val();
		var kelimeninturkcesi = $('#kelimeninturkcesi').val();
		var cumle = $('#cumle').val();
		if(kelime!="" && kelimetipi!="" && kelimeninturkcesi!="" && cumle!=""){
			$.ajax({
				url: "kayit.php",
				type: "POST",
				data: {
					kelime: kelime,
					kelimetipi: kelimetipi,
					kelimeninturkcesi: kelimeninturkcesi,
					cumle: cumle				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						
						$('#fupForm').find('input:text').val('');
            Swal.fire(
  'Başarılı!',
  'Kelime veri tabanına eklendi!',
  'success'
)
					}
					else if(dataResult.statusCode==201){
					  alert("Beklenmedik bir hata oluştu!");
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
    $("#butsave").removeAttr("disabled");
	});
});
</script>
  
  </div>
</div>

</div>
</body>
</html>