<?php

$emailem = $_POST["cantidadpp"];
$cedulaem = $_POST["nombresolpp"];
$numcomprobante = $_POST["emailsolpp"];
$nombreem = $_POST["cedulasolpp"];
$nombreben = $_POST[""];
$cedulaben = $_POST[""];
$emailben = $_POST[""];
$numcuenta = $_POST[""];
$codigo =$_POST["codigoverde"];

if($key == $codigo ){

$insertar = "REPLACE INTO cambio_divisas(cantidad, nombresol, emailsol, cedulasol, codigo) VALUES ('$cantidad','$nombre','$email','$cedula','$key')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado){
    
echo 'error';
    
}

else{
    
echo 'pro
cede';

}

mysqli_close($conexion);
$asunto= "Recibimos tus datos";
$mensaje= " Hola, dejanos informarte que tu solicitud será procesada en un lapso no mayor a 4horas hábiles. Todos los pagos se realizan entre las 10:00hrs y las 20:00hrs.

Gracias por preferirnos

Aguacatecambios

";
			  
mail($email,$asunto,$mensaje);
} 

else{
    mysqli_close($conexion);
$asunto= "Recibimos tus datos";
$mensaje= " El codigo ingresado es erróneo, por favor te invitamos a realizar el proceso nuevamente, verificando bien tus datos. Ten en cuenta que un error en el envío de tus datos puede retrasar considerablemente el proceso. Gracias

Aguacatecambios

";
			  
mail($email,$asunto,$mensaje);
}
