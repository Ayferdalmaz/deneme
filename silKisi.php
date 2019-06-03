<?php
include("config.php");

$Id = $_GET['Id'];

$result = mysqli_query($mysqli, "DELETE FROM Kisi WHERE Id=$Id");

header("Location:Kisi.php");
?>

