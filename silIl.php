<?php
include("config.php");

$Id = $_GET['Id'];

$result = mysqli_query($mysqli, "DELETE FROM Il WHERE Id=$Id");

header("Location:il.php");
?>

