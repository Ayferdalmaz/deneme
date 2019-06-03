<?php

include_once("config.php");

$iller= mysqli_query($mysqli, "SELECT i.Baslik,i.Id FROM Il as i ORDER BY i.Baslik"); 

 $array=array();
  $array2=array();
while($il = mysqli_fetch_array($iller))
{

$Id=$il['Id'];
$IlAdi=$il['Baslik'];

$kanlar=array("SifirRH-","SifirRH+","ARH-","ARH+","BRH-","BRH+","ABRH-","ABRH+");
 $arrayKisi=array();
foreach ($kanlar as $kan)
{
$kisiler = mysqli_query($mysqli, "SELECT Count(k.Id) as total FROM Kisi as k WHERE k.IlId=$Id and k.KanGrubu='$kan' ");


while($kisi = mysqli_fetch_array($kisiler))
{
$totalKisi= $kisi['total'];
array_push($arrayKisi,array("label" => $kan,"y" =>$totalKisi ));
}


}

array_push($array,array(

"type" => "column",
"name" => $IlAdi,
"showInLegend" => true,
"indexLabel" => $IlAdi,
"dataPoints" => $arrayKisi

));
}





 
$kanlar=array("SifirRH-","SifirRH+","ARH-","ARH+","BRH-","BRH+","ABRH-","ABRH+");
foreach ($kanlar as $kan)
{

$arrayIleGoreKan=array();
$iller= mysqli_query($mysqli, "SELECT i.Baslik,i.Id FROM Il as i ORDER BY i.Baslik");
while($ill = mysqli_fetch_array($iller))
{
$IlAdi=$ill["Baslik"];
	$Ids=$ill['Id'];
	$kisiListesiIleGore = mysqli_query($mysqli, "SELECT Count(Id) as total FROM Kisi WHERE IlId='$Ids' and KanGrubu='$kan'");
	

	while($ks = mysqli_fetch_array($kisiListesiIleGore))
		{

		$totalKisiVerisi=$ks["total"];
		

		array_push($arrayIleGoreKan,array("label" => $IlAdi,"y" =>$totalKisiVerisi ));
		}




}

array_push($array2,array(

"type" => "column",
"name" => $kan,
"showInLegend" => true,
"indexLabel" => $kan,
"dataPoints" => $arrayIleGoreKan

));
}

?>

<html>
<head>	
	<title>Raporlar</title>
<link href="style.css" rel="stylesheet">
	
</head>

<body>
<div class="ustMenu">
  <a href="il.php">İl İşlemleri</a>
  <a href="kisi.php">Kişi İşllemleri</a>
  <a class="active" href="rapor.php">Raporlamalar</a>
  <a href="hakkimda.php">Hakkımda</a>
</div>
<h1 class="baslik">Raporlar</h1><br/><br/><br/><br/><br/>

<div id="chartContainer" style="height: 470px; width: 100%;"></div><br/><br/><br/>

<h2 style="text-align:center;color:red;">
Kan Grubu İhtiyaçları <span style="color:black;font-size:15px;">( 5 ve altı ihtiyaç dahilinde sayılır..)</span>

</h2><hr/>
<?php 

	foreach ($kanlar as $kan)
	{

		$iller= mysqli_query($mysqli, "SELECT i.Baslik,i.Id FROM Il as i ORDER BY i.Baslik"); 

			$arrayList="";
				while($il = mysqli_fetch_array($iller))
				{
				$Id=$il['Id'];
				$IlAdi=$il['Baslik'];

				$oranlama = mysqli_query($mysqli, "SELECT Count(k.Id) as total FROM 
																		Kisi as k 
																		WHERE k.KanGrubu='$kan' 
																		and k.IlId='$Id' ORDER BY total DESC");
	

						while($oran = mysqli_fetch_array($oranlama))
						{
						if ($oran["total"]>=0 && $oran["total"]<6) {
								
									$adet=(string)$oran["total"];
									$arrayList .= "<div style='float:left;margin-left:5px;margin-right:5px;'><span style='color:red;font-weight:bold;font-size:20px;'>".$IlAdi."</span><span style='color:darkblue;font-size:12px;'> ( <span style='color:orange;font-weight:bold;background-color:black;padding-left-right:6px;padding-left:6px;'> &nbsp&nbsp ".$adet."&nbsp&nbsp  </span> &nbsp&nbsp Adet Kaldı )</span></div>   ";
				
							}
							else		{					
							
							$adet=(string)$oran["total"];
									$arrayList .= "<div style='float:right;margin-left:5px;margin-right:5px;'><span style='color:green;font-weight:bold;font-size:20px;'>".$IlAdi."</span><span style='color:darkblue;font-size:12px;'> ( <span style='color:orange;font-weight:bold;background-color:black;padding-left-right:6px;padding-left:6px;'> &nbsp&nbsp ".$adet."&nbsp&nbsp  </span> &nbsp&nbsp Adet Var )</span></div>    ";
				
							
							}		
							
						}
		
								
							
													
				 
						
				}
				
		echo "<br/><div style='float:left;'><span style='font-weight:bold;color:darkblue;margin-left:50px;font-size:25px;'>$kan : </span></div>$arrayList <br/><hr/><br/>";
	}
?>




<br/><br/><br/>
<hr/><br/><br/><br/>
<div id="chartContainer2" style="height: 470px; width: 100%;"></div><br/><br/><br/>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: false,
	animationEnabled: true,
	title:{
		text: "Kan Grubuna Göre İl Dağılımları"
	},
	subtitles: [{
		text: "Aşşağıda Kan Grubuna Göre İl Dağılımları Yer Almaktadır.Üstüne Gelerek Tam Rakamı Görebilirsiniz."
	}], 
	axisX: {
		title: "İller"
	},
	axisY: {
		title: "Oranlama",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",	
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
	},
	data: <?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>
});
chart.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	exportEnabled: false,
	animationEnabled: true,theme: "dark2",
	title:{
		text: "İllere Göre Kan Grubu Dağılımları"
	},
	subtitles: [{
		text: "Aşşağıda İllere Göre Kan Grubu Dağılımları Yer Almaktadır.Üstüne Gelerek Tam Rakamı Görebilirsiniz."
	}], 
	axisX: {
		title: "Kan Grupları"
	},
	axisY: {
		title: "Oranlama",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",	
	},
	toolTip: {
		shared: true,
	},
	legend: {
		cursor: "pointer",
	},
	data: <?php echo json_encode($array2, JSON_NUMERIC_CHECK); ?>
});
chart2.render();

}
</script>
</body>
</html>
