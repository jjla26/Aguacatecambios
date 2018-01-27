<?php

$inicial_rut = $_POST['inicial_rut'];
$inicial_vista = $_POST['inicial_vista'];
$inicial_ahorro = $_POST['inicial_ahorro']; 
$inicial_mercantil_mariana = $_POST['inicial_mercantil_mariana'];
$inicial_mercantil_carlos = $_POST['inicial_mercantil_carlos'];
$inicial_mercantil_juridica = $_POST['inicial_mercantil_juridica'];
$inicial_banesco_carlos = $_POST['inicial_banesco_carlos'];
$inicial_banesco_marola = $_POST['inicial_banesco_marola'];
$inicial_banesco_sonalys = $_POST['inicial_banesco_sonalys'];
$inicial_banesco_juridica = $_POST['inicial_banesco_juridica'];

$insertar = "INSERT INTO saldos (saldo_rut, saldo_vista, saldo_ahorro, saldo_mercantil_mariana, saldo_mercantil_carlos, saldo_mercantil_juridica, saldo_banesco_carlos, saldo_banesco_marola, saldo_banesco_sonalys, saldo_banesco_juridica) VALUES ('$inicial_rut','$inicial_vista','$inicial_ahorro','$inicial_mercantil_mariana','$inicial_mercantil_carlos','$inicial_mercantil_juridica','$inicial_banesco_carlos','$inicial_banesco_marola','$inicial_banesco_sonalys','$inicial_banesco_juridica')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{

echo '<script>window.location="depositoofic.php"</script>';

}

mysqli_close($conexion);
