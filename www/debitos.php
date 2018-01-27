<?php

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


$insertar = "INSERT INTO saldos (abono_rut, abono_vista, abono_ahorro, abono_mercantil_mariana, abono_mercantil_carlos, abono_mercantil_juridica, abono_banesco_carlos, abono_banesco_marola, abono_banesco_sonalys, abono_banesco_juridica) VALUES ('$debito_rut','$debito_vista','$debito_ahorro','$debito_mercantil_mariana','$debito_mercantil_carlos','$debito_mercantil_juridica','$debito_banesco_carlos','$debito_banesco_marola','$debito_banesco_sonalys','$debito_banesco_juridica')";





include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{

echo '<script>window.location="depositoofic.php"</script>';

}

mysqli_close($conexion);
