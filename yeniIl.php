<html>
<head>


	<title>Yeni İl Ekle</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<div class="ustMenu">
  <a class="active" href="il.php">İl İşlemleri</a>
  <a href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>

<h1 class="baslik">Yeni İl</h1>

	<form action="yeniIlPost.php" method="post">
		<table id="tablo" width="25%" border="0">
			<tr> 
				<td>İl Adı</td>
				<td><input type="text" name="baslik"></td>
			</tr>
			<tr> 
				<td>Kod</td>
				<td><input type="text" name="kod"></td>
			</tr>
	
			<tr> 
				<td></td>
				<td><a href="il.php" class="silButton" style="float:left;padding: 14px 20px;">Listeye Dön</a><input type="submit" name="Submit" value="Tamamla"></td>
			</tr>
		</table>
	</form>
</body>
</html>
