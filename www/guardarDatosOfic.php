<?php


$tasa = $_POST['tasa'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$banco1 = $_POST['banco1'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$insertar = "INSERT INTO Oficina(tasa,Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Transferimos_desde, Cantidad_pesos, Cantidad_bs, Email, Telefono) VALUES ('$tasa','$nombre','$tipodoc','$iddoc','$banco','$cuenta','$banco1','$pesos','$bolivares','$email','$telefono')";

if($banco !== $banco1 ){
    if($bolivares < 10000000){
    $comision= 1659+27;
    $bolivares = $bolivares+$comision; 
    }else{
    $comision=    27;
    $bolivares = $bolivares+$comision; 
    }
}

if($banco1 = "Mercantil Mariana")
$insertar1 = "INSERT INTO saldos( abono_mercantil_juridica)VALUES('$')";

if($banco1 = "Mercantil Carlos")
$insertar1 = "INSERT INTO saldos( abono_mercantil_juridica)VALUES";

if($banco1 = "Mercantil Juridica")
$insertar1 = "INSERT INTO saldos( abono_mercantil_juridica)";

if($banco1 = "Banesco Carlos")
$insertar1 = "INSERT INTO saldos( abono_banesco_carlos)";

if($banco1 = "Banesco Marola")
$insertar1 = "INSERT INTO saldos( abono_banesco_marola)";

if($banco1 = "Banesco Sonalys")
$insertar1 = "INSERT INTO saldos( abono_banesco_sonalys)";

if($banco1 = "Banesco Juridica")
$insertar1 = "INSERT INTO saldos( abono_banesco_juridica)";
include 'conexion.php';

if($banco !== $banco1 )
    
    


$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{

}

mysqli_close($conexion);

?>