<html>
<head>


	<title>Yeni Kişi Ekle</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<div class="ustMenu">
  <a href="il.php">İl İşlemleri</a>
  <a class="active" href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>
<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Il ORDER BY Kod "); 
?>

<h1 class="baslik">Yeni Kişi</h1>
	<form action="yeniKisiPost.php" method="post">
		<table id="tablo" width="25%" border="0">
			<tr> 
				<td>Tc No</td>
				<td><input type="text" name="Tc"></td>
			</tr>
			<tr> 
				<td>Ad Soyad</td>
				<td><input type="text" name="AdSoyad"></td>
			</tr>
		<tr> 
				<td>Yaş</td>
				<td><input type="number" name="Yas"></td>
			</tr>
	<tr> 
				<td>Cinsiyet</td>
				<td>
				<select name="Cinsiyet">
				<option value="Erkek">Erkek</option>
				<option value="Kadın">Kadın</option>
				</select>
				
			</tr>
			
				<tr> 
				<td>Telefon</td>
				<td><input type="text" name="Telefon"></td>
			</tr>
			
			
			<tr> 
				<td>Adres</td>
				<td><input type="text" name="Adres"></td>
			</tr>
			<tr> 
				<td>Kan Grubu</td>
				<td>
				<select name="KanGrubu">
				<option value="SifirRH-">SifirRH-</option>
				<option value="SifirRH+">SifirRH+</option>
				<option value="ARH-">ARH-</option>
				<option value="ARH+">ARH+</option>
				<option value="BRH-">BRH-</option>
				<option value="BRH+">BRH+</option>
				<option value="ABRH-">ABRH-</option>
				<option value="ABRH+">ABRH+</option>
				</select>
				</td>
			</tr>
			
				<tr> 
				<td>İl</td>
				<td>
				<select name="IlId">
		<?php
			while($res = mysqli_fetch_array($result)) { 		
		echo "<option value=".$res['Id'].">".$res['Baslik']."</option>";
		
	}?>
		
				</select>
				
			</tr>
			<tr> 
				<td></td>
				<td><a href="kisi.php" class="silButton" style="float:left;padding: 14px 20px;">Listeye Dön</a><input type="submit" name="Submit" value="Tamamla"></td>
			</tr>
		</table>
	</form>
</body>
</html>
