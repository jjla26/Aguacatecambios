<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa1";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa = $tasa['Tasa'];

?>
