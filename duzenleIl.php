<html>
<head>


	<title>İl Düzenle</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<div class="ustMenu">
  <a class="active" href="il.php">İl İşlemleri</a>
  <a href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>

<?php
include_once("config.php");

$Id = $_GET['Id'];

$kod='';
$baslik='';

$result = mysqli_query($mysqli, "SELECT * FROM Il WHERE Id='$Id'");
while($res = mysqli_fetch_array($result))
{
    $kod = $res['Kod'];
    $baslik = $res['Baslik'];
}
?>
<h1 class="baslik">İl Düzenle</h1>
	<form action="duzenleIlPost.php" method="post">
	<input type="hidden" name="Id" value="<?php echo $Id;?>">
		<table id="tablo" width="25%" border="0">
			<tr> 
				<td>İl Adı</td>
				<td><input type="text" name="baslik" value="<?php echo $baslik;?>"></td>
			</tr>
			<tr> 
				<td>Kod</td>
				<td><input type="text" name="kod" value="<?php echo $kod;?>"></td>
			</tr>
	
			<tr> 
				<td></td>
				<td><a href="il.php" class="silButton" style="float:left;padding: 14px 20px;">Listeye Dön</a><input type="submit" name="Submit" value="Tamamla"></td>
			</tr>
		</table>
	</form>
</body>
</html>
