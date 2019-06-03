<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT i.Baslik,k.Id,k.AdSoyad,k.KanGrubu,k.Telefon,k.Tc,k.Yas,k.Adres,k.Cinsiyet FROM Kisi as k join Il as i on k.IlId=i.Id "); 
?>

<html>
<head>	
	<title>Kişiler</title>
<link href="style.css" rel="stylesheet">
	
</head>

<body>
<div class="ustMenu">
  <a href="il.php">İl İşlemleri</a>
  <a class="active" href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>

<div>
<h1 class="baslik">Kişi Listesi</h1>
<a href="yeniKisi.php" class="yeniEkleButton">Yeni Kişi Ekle</a><br/><br/>

	<table id="tablo">

<tr style="background-color:#333;color:white;" >
		<td style="width:15%;font-weight:bold;" >İl</td>
		<td >TC</td>
		<td>Ad Soyad</td>
		<td >Yaş</td>
		<td >Cinsiyet</td>
		<td >Telefon</td>
		<td >Adres</td>
		<td style="font-weight:bold;" >Kan grubu</td>
		<td >İşlem</td>
	
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['Baslik']."</td>";
		echo "<td>".$res['Tc']."</td>";
		echo "<td>".$res['AdSoyad']."</td>";
				echo "<td>".$res['Yas']."</td>";
		echo "<td>".$res['Cinsiyet']."</td>";
		echo "<td>".$res['Telefon']."</td>";
				echo "<td>".$res['Adres']."</td>";
		echo "<td>".$res['KanGrubu']."</td>";
		echo "<td><a class=\"duzenleButton\" href=\"duzenleKisi.php?Id=$res[Id]\">Düzenle</a>  <a class=\"silButton\" href=\"silKisi.php?Id=$res[Id]\" onClick=\"return confirm('Veri Silinecek Emin misiniz?')\">Sil</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>
