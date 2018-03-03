<?php

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) 
     $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
 
$cantidad = $_POST["cantidadpp"];
$nombre = $_POST["nombresolpp"];
$email = $_POST["emailsolpp"];
$cedula = $_POST["cedulasolpp"];
$key = generarCodigo(6);

$insertar = "INSERT INTO cambio_divisas(cantidad, nombresol, emailsol, cedulasol, codigo) VALUES ('$cantidad','$nombre','$email','$cedula','$key')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado){
    
echo 'error';
    
}

else{
    
echo 'procede';

}

mysqli_close($conexion);
$asunto= "Datos para transferencia en Pesos";
$mensaje= "Hola, Gracias por preferirnos! Esperamos por tu transferencia de fondos para proseguir con el proceso 

Nuestros datos son:
Cuenta de Ahorro 32962601927
Banco Estado
Carlos Aldazoro
RUT: 25201829-8

";
			  
mail($email,$asunto,$mensaje);


