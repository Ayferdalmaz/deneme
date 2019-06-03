<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Il ORDER BY Kod "); 
?>

<html>
<head>	
	<title>Hakkımda</title>
<link href="style.css" rel="stylesheet">
	
</head>

<body>
<div class="ustMenu">
  <ahref="il.php">İl İşlemleri</a>
  <a href="kisi.php">Kişi İşllemleri</a>
  <a href="rapor.php">Raporlamalar</a>
  <a class="active" href="hakkimda.php">Hakkımda</a>
</div>

<div style="text-align:center;">

<h1 ><span style="Color:green">Ad Soyad : </span>Ayfer Dalmaz</h1>
<h2><span style="Color:red">Okul Numarası : </span> 2016469018</h2><hr/>
<h3>Sunucu Tabanlı Programlama ve Karar Destek Sistemleri</h3><hr/>
</div>
</body>
</html>
