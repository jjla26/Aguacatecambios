	
<?php
	
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    	
 
	
// Crear una nueva  instancia de PHPMailer habilitando el tratamiento de excepciones
	
$mail = new PHPMailer(true); 
	
 
	
// Configuramos el protocolo SMTP con autenticación
	
$mail->IsSMTP();
	
$mail->SMTPAuth = true;
	
 
	
// Configuración del servidor SMTP
	
$mail->Port = 587;
	
$mail->Host = 'smtp.gmail.com';
	
$mail->Username   = "aguacatecambios@gmail.com";

$mail->Password = "edu19471962";
	
 

// Configuración cabeceras del mensaje
	
$mail->From = "support@aguacatecambios.com";
	
$mail->FromName = "Aguacatecambios";
	
 
	
$mail->AddAddress("julioj.lopeza@gmail.com","Julio");
	
//$mail->AddAddress("destino2@correo.com","Nombre 2");
	
 
	
//$mail->AddCC("copia1@correo.com","Nombre copia 1");
	
 
	
//$mail->AddBCC(“copia1@correo.com”,”Nombre copia 1″);
	
 
	
$mail->Subject = "Asunto del correo";
	
 
	
// Creamos en una variable el cuerpo, contenido HMTL, del correo
	
$body  = "Proebando los correos con un tutorial<br>";
	
$body .= "hecho por <strong>Developando</strong>.<br>";
	
$body .= "<font color='red'>Visitanos pronto</font>";
	
 
	
$mail->Body = $body;
	
 
	
// Ficheros adjuntos
	
//$mail->AddAttachment("misImagenes/foto1.jpg", "developandoFoto.jpg");
	
//$mail->AddAttachment("files/proyecto.zip", "demo-proyecto.zip");
	
 
	
// Enviar el correo

$mail->Send(); 
	

	
?>