<?php
session_start();

$usuario = $_SESSION['user'];

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) 
     $key .= $pattern{mt_rand(0,$max)};
 return $key;

}

$key = generarCodigo(6);

include 'conexion.php';

$insertar = "INSERT INTO empresas (codigo, user) VALUES ('$key', '$usuario')";

$seleccionar = " SELECT email FROM empresas WHERE user= '$usuario' ";

mysqli_query($conexion, $insertar);

$sql = mysqli_query($conexion, $seleccionar);


if($campo = mysqli_fetch_array($sql)){
    $email= $campo[0];
}

mysqli_close($conexion);


$asunto= "Codigo VERDE";

$mensaje= "Hola Soci@,\n


Copia el siguiente código y llénalo en la casilla correspondiente junto con los datos bancarios del beneficiario.\n


Codigo Verde: <strong>$key</strong> \n


IMPORTANTE: El código será válido solo para transferir a un beneficiario y/o hasta que caduque la sesión.\n


Si no has realizado esta operación, comunícate con el Centro de Soporte por el +56931407600.\n" 
    ;
    

//para el envío en formato HTML 
//$headers = "MIME-Version: 1.0\r\n"; 
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Aguacatecambios <codigo@aguacatecambios.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: aguacatecambios@gmail.com\r\n"; 

			  
mail($email, utf8_decode($asunto), utf8_decode($mensaje), $headers);
header("location: deposito.php");