<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

$saldo_rut = "SELECT saldo_rut FROM saldos order by ID desc Limit 1";
$saldo_rut = mysqli_query($conexion,$saldo_rut);
$saldo_rut = mysqli_fetch_array($saldo_rut);
$saldo_rut = $saldo_rut['saldo_rut'];

$saldo_vista = "SELECT saldo_vista FROM saldos order by ID desc Limit 1";
$saldo_vista = mysqli_query($conexion,$saldo_vista);
$saldo_vista = mysqli_fetch_array($saldo_vista);
$saldo_vista = $saldo_vista['saldo_rut'];
echo $saldo_vista;

$saldo_ahorro = "SELECT saldo_ahorro FROM saldos order by ID desc Limit 1";
$saldo_ahorro = mysqli_query($conexion,$saldo_ahorro);
$saldo_ahorro = mysqli_fetch_array($saldo_ahorro);
$saldo_ahorro = $saldo_ahorro['saldo_ahorro'];
echo $saldo_ahorro;

$saldo_banesco_juridica = "SELECT saldo_banesco_juridica FROM saldos order by ID desc Limit 1";
$saldo_banesco_juridica = mysqli_query($conexion,$saldo_banesco_juridica);
$saldo_banesco_juridica = mysqli_fetch_array($saldo_banesco_juridica);
$saldo_banesco_juridica = $saldo_banesco_juridica['saldo_banesco_juridica'];
echo $saldo_banesco_juridica;

$saldo_banesco_carlos = "SELECT saldo_banesco_carlos FROM saldos order by ID desc Limit 1";
$saldo_banesco_carlos = mysqli_query($conexion,$saldo_banesco_carlos);
$saldo_banesco_carlos = mysqli_fetch_array($saldo_banesco_carlos);
$saldo_banesco_carlos = $saldo_banesco_carlos['saldo_banesco_carlos'];
echo $saldo_banesco_carlos;


$saldo_banesco_marola = "SELECT saldo_banesco_marola FROM saldos order by ID desc Limit 1";
$saldo_banesco_marola = mysqli_query($conexion,$saldo_banesco_marola);
$saldo_banesco_marola = mysqli_fetch_array($saldo_banesco_marola);
$saldo_banesco_marola = $saldo_banesco_marola['saldo_banesco_marola'];
echo $saldo_banesco_marola;

$saldo_banesco_sonalys = "SELECT saldo_banesco_sonalys FROM saldos order by ID desc Limit 1";
$saldo_banesco_sonalys = mysqli_query($conexion,$saldo_banesco_sonalys);
$saldo_banesco_sonalys = mysqli_fetch_array($saldo_banesco_sonalys);
$saldo_banesco_sonalys = $saldo_banesco_sonalys['saldo_banesco_sonalys'];
echo $saldo_banesco_sonalys;

$saldo_mercantil_carlos = "SELECT saldo_mercantil_carlos FROM saldos order by ID desc Limit 1";
$saldo_mercantil_carlos = mysqli_query($conexion,$saldo_mercantil_carlos);
$saldo_mercantil_carlos = mysqli_fetch_array($saldo_mercantil_carlos);
$saldo_mercantil_carlos = $saldo_mercantil_carlos['saldo_mercantil_carlos'];
echo $saldo_mercantil_carlos;


$saldo_mercantil_mariana = "SELECT saldo_mercantil_mariana FROM saldos order by ID desc Limit 1";
$saldo_mercantil_mariana = mysqli_query($conexion,$saldo_mercantil_mariana);
$saldo_mercantil_mariana = mysqli_fetch_array($saldo_mercantil_mariana);
$saldo_mercantil_mariana = $saldo_mercantil_mariana['saldo_mercantil_mariana'];
echo $saldo_mercantil_mariana;

$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];


?>