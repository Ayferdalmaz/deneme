<html>
<head>


	<title>Kişi Düzenle</title>
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
$Iller = mysqli_query($mysqli, "SELECT * FROM Il ORDER BY Kod "); 
$Id = $_GET['Id'];



$result = mysqli_query($mysqli, "SELECT * FROM Kisi WHERE Id='$Id'");
while($res = mysqli_fetch_array($result))
{
    $Tc = $res['Tc'];
    $AdSoyad = $res['AdSoyad'];
	$Yas = $res['Yas'];
	$Cinsiyet = (string)$res['Cinsiyet'];
	$Telefon = $res['Telefon'];
	$Adres = $res['Adres'];
	$KanGrubu = $res['KanGrubu'];
	$IlId = $res['IlId'];
	}


?>
<h1 class="baslik">Kişi Düzenle</h1>

	
	
		<form action="duzenleKisiPost.php" method="post">
		
			<input type="hidden" name="Id" value="<?php echo $Id;?>">
		<table id="tablo" width="25%" border="0">
			<tr> 
				<td>Tc No</td>
				<td><input type="text" name="Tc" value="<?php echo $Tc;?>"></td>
			</tr>
			<tr> 
				<td>Ad Soyad</td>
				<td><input type="text" name="AdSoyad" value="<?php echo $AdSoyad;?>"></td>
			</tr>
		<tr> 
				<td>Yaş</td>
				<td><input type="number" name="Yas" value="<?php echo $Yas;?>"></td>
			</tr>
	<tr> 
				<td>Cinsiyet</td>
				<td>
				<select name="Cinsiyet">
					<?php
					
					if(strcmp($Cinsiyet, 'Erkek') == 0 ){
						echo "<option selected value='Erkek'>Erkek</option>";
						echo "<option value='Kadın'>Kadın</option>";
					}
					else{
						
							echo "<option value='Erkek'>Erkek</option>";
						echo "<option selected value='Kadın'>Kadın</option>";
					}
					
					?>
				
				
				</select>
				
			</tr>
			
				<tr> 
				<td>Telefon</td>
				<td><input type="text" name="Telefon" value="<?php echo $Telefon;?>"></td>
			</tr>
			
			
			<tr> 
				<td>Adres</td>
				<td><input type="text" name="Adres" value="<?php echo $Adres;?>"></td>
			</tr>
			<tr> 
				<td>Kan Grubu</td>
				<td>
			
						<select name="KanGrubu">
				<option <?php if($KanGrubu=='SifirRH-'){echo "selected";}  ?> value="SifirRH-">SifirRH-</option>
				<option <?php if($KanGrubu=='SifirRH+'){echo "selected";}  ?> value="SifirRH+">SifirRH+</option>
				<option <?php if($KanGrubu=='ARH-'){echo "selected";}  ?> value="ARH-">ARH-</option>
				<option <?php if($KanGrubu=='ARH+'){echo "selected";}  ?> value="ARH+">ARH+</option>
				<option <?php if($KanGrubu=='BRH-'){echo "selected";}  ?> value="BRH-">BRH-</option>
				<option <?php if($KanGrubu=='BRH+'){echo "selected";}  ?>  value="BRH+">BRH+</option>
				<option <?php if($KanGrubu=='ABRH-'){echo "selected";}  ?> value="ABRH-">ABRH-</option>
				<option <?php if($KanGrubu=='ABRH+'){echo "selected";}  ?> value="ABRH+">ABRH+</option>
				</select>
				
				</td>
			</tr>
			
				<tr> 
				<td>İl</td>
				<td>
				<select name="IlId">
		<?php
			while($res2 = mysqli_fetch_array($Iller)) { 		
			
			if($res2['Id']==$IlId){
			echo "<option selected value=".$res2['Id'].">".$res2['Baslik']."</option>";}
			else{
				echo "<option value=".$res2['Id'].">".$res2['Baslik']."</option>";
			}
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
