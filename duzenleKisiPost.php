<html>
<head>
<title>Mesaj</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Id = mysqli_real_escape_string($mysqli, $_POST['Id']);
	$Tc = mysqli_real_escape_string($mysqli, $_POST['Tc']);
	$AdSoyad = mysqli_real_escape_string($mysqli, $_POST['AdSoyad']);
	$Yas = mysqli_real_escape_string($mysqli, $_POST['Yas']);	
	$Cinsiyet = mysqli_real_escape_string($mysqli, $_POST['Cinsiyet']);
	$Telefon = mysqli_real_escape_string($mysqli, $_POST['Telefon']);
	$Adres = mysqli_real_escape_string($mysqli, $_POST['Adres']);
	$IlId = mysqli_real_escape_string($mysqli, $_POST['IlId']);
	$KanGrubu = mysqli_real_escape_string($mysqli, $_POST['KanGrubu']);
		
	if(empty($Tc) || empty($AdSoyad)|| empty($KanGrubu) ) {
				
		if(empty($Tc)) {
			echo "<div class='hata'><br/><strong> TC Boş Geçilemez..</strong>";
		}
		
		if(empty($AdSoyad)) {
			echo "<div class='hata'><br/><strong> Ad Soyad Boş Geçilemez..</strong>";
		}
		
			if(empty($KanGrubu)) {
			echo "<div class='hata'><br/><strong> Kan Grubu Boş Geçilemez..</strong>";
		}
		
		
		echo "<br/><br/><a href='javascript:self.history.back();'>Geri Dön</a></div>";
	} else { 

			
			
		$result = mysqli_query($mysqli,"UPDATE Kisi Set AdSoyad='$AdSoyad',Yas='$Yas',Cinsiyet='$Cinsiyet',Telefon='$Telefon',Adres='$Adres',IlId='$IlId', KanGrubu='$KanGrubu', Tc='$Tc' WHERE Id=$Id");
		
		echo "<div class='basarili'><br/><strong>Veri Düzenleme Başarılı!</strong>";
		echo "<br/><br/><a href='kisi.php'>Tüm Listeyi Gör</a></div>";
	}
}
?>
</body>
</html>
