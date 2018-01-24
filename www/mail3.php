<?php

$emailem = $_POST["emailem"];
$documentoem = $_POST["documentoem"];
$comprobante = $_POST["comprobante"];
$nombreem = $_POST["nombreem"];
$nombreben = $_POST["nombreben"];
$documentoben = $_POST["documentoben"];
$emailben = $_POST["emailben"];
$banco = $_POST["banco"];
$numdecuenta = $_POST["numdecuenta"];
$codigo = $_POST["codigo"];

$actualizar = "UPDATE cambio_divisas SET emailem ='$emailem', cedulaem = '$documentoem', numcomprobante = '$comprobante', nombreyapellidoem = '$nombreem', cedulaben = '$documentoben', nombreyapellidoben = '$nombreben', emailben = '$emailben', bancoben = '$banco', numerodecuenta = '$numdecuenta', codigo = '$codigo' WHERE codigo = '$codigo' ";

include 'conexion.php';

$resultado = mysqli_query($conexion, $actualizar);

if (!$resultado){
    
echo 'error';
    
}

else{
    
echo 'procede';

}

mysqli_close($conexion);
header("location: /index.html");