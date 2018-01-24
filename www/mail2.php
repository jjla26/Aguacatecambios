<?php

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) 
     $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

$deseacambiar = "Bolivares";
$cantidad = $_POST["cantidadbb"];
$nombre = $_POST["nombresolbb"];
$email = $_POST["emailsolbb"];
$cedula = $_POST["cedulasolbb"];
$key = generarCodigo(6);

$insertar = "INSERT INTO cambio_divisas(deseacambiar,cantidad, nombresol, emailsol, cedulasol, codigo) VALUES ('$deseacambiar','$cantidad','$nombre','$email','$cedula','$key')";

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
Banesco Cuenta Corriente 01341009700003002008
Carlos Aldazoro
Cedula: 19.196.247
Email: aguacatecambios@gmail.com
Tu codigo verde es: $key

";
			  
mail($email,$asunto,$mensaje);
header("location: /index.html#formulario");