<?php
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");


$inicial_efec = $_POST['inicial_efec'];
$inicial_rut = $_POST['inicial_rut'];
$inicial_vista = $_POST['inicial_vista'];
$inicial_ahorro = $_POST['inicial_ahorro']; 
$inicial_mercantil_mariana = $_POST['inicial_mercantil_mariana'];
$inicial_mercantil_carlos = $_POST['inicial_mercantil_carlos'];
$inicial_mercantil_juridica = $_POST['inicial_mercantil_juridica'];
$inicial_banesco_carlos = $_POST['inicial_banesco_carlos'];
$inicial_banesco_carlos_papa = $_POST['inicial_banesco_carlos_papa'];
$inicial_banesco_marola = $_POST['inicial_banesco_marola'];
$inicial_banesco_sonalys = $_POST['inicial_banesco_sonalys'];
$inicial_banesco_juridica = $_POST['inicial_banesco_juridica'];

$insertar = "INSERT INTO saldos1 (saldo_efec, saldo_rut, saldo_vista, saldo_ahorro, saldo_mercantil_mariana, saldo_mercantil_carlos, saldo_mercantil_juridica, saldo_banesco_carlos, saldo_banesco_carlos_papa, saldo_banesco_marola, saldo_banesco_sonalys, saldo_banesco_juridica, Fecha) VALUES ('$inicial_efec','$inicial_rut','$inicial_vista','$inicial_ahorro','$inicial_mercantil_mariana','$inicial_mercantil_carlos','$inicial_mercantil_juridica','$inicial_banesco_carlos','$inicial_banesco_carlos_papa','$inicial_banesco_marola','$inicial_banesco_sonalys','$inicial_banesco_juridica','$current_date')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{

echo '<script>window.location="transaccionesofic.php"</script>';

}

mysqli_close($conexion);
