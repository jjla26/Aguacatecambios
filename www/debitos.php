<?php

$debito_efec = $_POST['debito_efec']*-1;
$debito_rut = $_POST['debito_rut'] *-1;
$debito_vista = $_POST['debito_vista']*-1;
$debito_ahorro = $_POST['debito_ahorro']*-1; 
$debito_mercantil_mariana = $_POST['debito_mercantil_mariana']*-1;
$debito_mercantil_carlos = $_POST['debito_mercantil_carlos']*-1;
$debito_mercantil_juridica = $_POST['debito_mercantil_juridica']*-1;
$debito_banesco_carlos = $_POST['debito_banesco_carlos'] *-1;
$debito_banesco_marola = $_POST['debito_banesco_marola']*-1;
$debito_banesco_sonalys = $_POST['debito_banesco_sonalys']*-1;
$debito_banesco_juridica = $_POST['debito_banesco_juridica']*-1;


$insertar = "INSERT INTO saldos (abono_efec, abono_rut, abono_vista, abono_ahorro, abono_mercantil_mariana, abono_mercantil_carlos, abono_mercantil_juridica, abono_banesco_carlos, abono_banesco_marola, abono_banesco_sonalys, abono_banesco_juridica, disp_mercantil_mariana, disp_mercantil_carlos, disp_mercantil_juridica, disp_banesco_carlos, disp_banesco_marola, disp_banesco_sonalys, disp_banesco_juridica) VALUES ('$debito_efec',$debito_rut','$debito_vista','$debito_ahorro','$debito_mercantil_mariana','$debito_mercantil_carlos','$debito_mercantil_juridica','$debito_banesco_carlos','$debito_banesco_marola','$debito_banesco_sonalys','$debito_banesco_juridica', '$debito_mercantil_mariana','$debito_mercantil_carlos','$debito_mercantil_juridica','$debito_banesco_carlos','$debito_banesco_marola','$debito_banesco_sonalys','$debito_banesco_juridica')";


include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

$ID=mysqli_insert_id($conexion)-1;


$abono_efec1 = "SELECT saldo_efec FROM saldos WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1 = $abono_efec1['saldo_efec']+$debito_efec;


$abono_rut1 = "SELECT saldo_rut FROM saldos WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut']+$debito_rut;

$abono_vista1 = "SELECT saldo_vista FROM saldos WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista']+$debito_vista;

$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$debito_ahorro;

$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']+$debito_mercantil_mariana;

$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']+$debito_mercantil_carlos;

$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']+$debito_mercantil_juridica;

$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']+$debito_banesco_carlos;

$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']+$debito_banesco_marola;

$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']+$debito_banesco_sonalys;

$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']+$debito_banesco_juridica;

$ID=$ID+1;

$insertar1 = "UPDATE saldos SET saldo_efec='$saldo_efect', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$abono_mercantil_mariana1', disp_mercantil_carlos='$abono_mercantil_carlos1', disp_mercantil_juridica='$abono_mercantil_juridica1', disp_banesco_carlos='$abono_banesco_carlos1', disp_banesco_marola='$abono_banesco_marola1', disp_banesco_sonalys='$abono_banesco_sonalys1', disp_banesco_juridica ='$abono_banesco_juridica1' WHERE ID= '$ID'";

$resultado1 = mysqli_query($conexion, $insertar1);

if (!$resultado && !$resultado1)

    
echo 'error';

else{

echo '<script>window.location="depositoofic.php"</script>';

}

mysqli_close($conexion);
