<html>
<head>
<title>Mesaj</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$baslik = mysqli_real_escape_string($mysqli, $_POST['baslik']);
	$kod = mysqli_real_escape_string($mysqli, $_POST['kod']);
		
	if(empty($baslik) || empty($kod) ) {
				
		if(empty($baslik)) {
			echo "<div class='hata'><br/><strong> İl Adı Boş Geçilemez..</strong>";
		}
		
		if(empty($kod)) {
			echo "<div class='hata'><br/><strong> Kod Boş Geçilemez..</strong>";
		}
		
		
		
		echo "<br/><br/><a href='javascript:self.history.back();'>Geri Dön</a></div>";
	} else { 

			

		$result = mysqli_query($mysqli, "INSERT INTO Il(Baslik,Kod) VALUES('$baslik','$kod')");
		
		echo "<div class='basarili'><br/><strong>Veri Ekleme Başarılı!</strong>";
		echo "<br/><br/><a href='il.php'>Tüm Listeyi Gör</a></div>";
	}
}
?>
</body>
</html>
