<?php

session_start();

$tasa = $_POST['tasa'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$insertar = "INSERT INTO Oficina(tasa,Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Cantidad_pesos, Cantidad_bs, Email, Telefono) VALUES ('$tasa','$nombre','$tipodoc','$iddoc','$banco','$cuenta','$pesos','$bolivares','$email','$telefono')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{

}

mysqli_close($conexion);

?>