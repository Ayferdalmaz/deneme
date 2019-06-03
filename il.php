<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Il ORDER BY Kod "); 
?>

<html>
<head>	
	<title>İller</title>
<link href="style.css" rel="stylesheet">
	
</head>

<body>
<div class="ustMenu">
  <a class="active" href="il.php">İl İşlemleri</a>
  <a href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>

<div>
<h1 class="baslik">İl Listesi</h1>
<a href="yeniIl.php" class="yeniEkleButton">Yeni İl Ekle</a><br/><br/>

	<table id="tablo">

	<tr style="background-color:#333;color:white;" >
		<td style="width:40%">İl</td>
		<td style="width:40%">Kod</td>
				<td style="width:20%">İşlem</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['Baslik']."</td>";
		echo "<td>".$res['Kod']."</td>";
		echo "<td><a class=\"duzenleButton\" href=\"duzenleIl.php?Id=$res[Id]\">Düzenle</a>  <a class=\"silButton\" href=\"silIl.php?Id=$res[Id]\" onClick=\"return confirm('Veri Silinecek Emin misiniz?')\">Sil</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>
