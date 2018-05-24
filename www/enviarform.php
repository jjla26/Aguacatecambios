<?php

//session_start();
//if (!empty($_SESSION['user'])){
//    $fechaGuardada = $_SESSION['ultimoAcceso'];
//
//    $ahora = date("Y-n-j H:i:s");
//    if($_SESSION['user']!=true){
//        echo '<script>window.location="admin"</script>';
//        return false;
//        
//    }else{
//$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
//if($tiempo_transcurrido >= 8640){ // 1 x 60 x 60 = 1 horas...
//session_destroy();
//
//echo '<script>alert("Su sesion ha caducado");window.location="admin"</script>'; // 
//
//return false;
//
//    
//}else{$_SESSION["ultimoAcceso"] = $ahora;}
//}
//}else{
//echo '<script>window.location="admin"</script>';
//}


date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");


/*if (!empty($_SESSION['user']) && !empty($_POST['cliente']) && !empty($_POST['rut']) && !empty($_POST['email'])&& !empty($_POST['telefono']) && 
!empty($_POST['tranf']) && !empty($_POST['tipodoc']) && !empty($_POST['iddoc']) && !empty($_POST['banco']) && !empty($_POST['cuenta']) && !empty($_POST['pesos']) && !empty($_POST['bolivares'])){
*/

if (empty($_FILES['archivo']['name'])){
	
	
    echo '<script>alert("Por favor adjuntar el comprobante de pago!. "); window.location="principal.php"</script>';    
   //header("location: formulario.php?proceso=falta_indicar_fichero"); //o como se llame el formulario ..
exit;
}

if (!empty($_POST['tasap']) && !empty($_POST['cliente']) && !empty($_POST['rut']) && !empty($_POST['totalpesos']) &&  !empty($_POST['email'])&& !empty($_POST['telefono']) && 
!empty($_POST['transf2']) && !empty($_POST['nombre']) && !empty($_POST['tipodoc']) && !empty($_POST['iddoc']) && !empty($_POST['banco']) && 
!empty($_POST['cuenta']) && !empty($_POST['pesos']) && !empty($_POST['bolivares'])){

echo  $tasap = $_POST['tasap'];
echo  $totalpesos = $_POST['totalpesos10'];

echo  $pesos = $_POST['pesos11'];
  include 'conexion.php';
  
  $tasa = "SELECT Tasa from Tasa";
  $tasa = mysqli_query($conexion, $tasa);
  $tasa = mysqli_fetch_array($tasa);
echo  $tasa = $tasa['Tasa'];
 
  $tasaesp = "SELECT Tasa from Tasa1";
  $tasaesp = mysqli_query($conexion, $tasaesp);
  $tasaesp = mysqli_fetch_array($tasaesp);
echo  $tasaesp = $tasaesp['Tasa'];

  if( $tasap == $tasa){
    if ($pesos >= 10000 && $totalpesos >= 10000){

$binario_nombre_temporal=$_FILES['archivo']['tmp_name'] ;
// leer del archvio temporal .. el binario subido.
// "rb" para Windows .. Linux parece q con "r" sobra ...
$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));

// Obtener del array FILES (superglobal) los datos del binario .. nombre, tabamo y tipo.
$binario_nombre=$_FILES['archivo']['name'];
$binario_peso=$_FILES['archivo']['size'];
$binario_tipo=$_FILES['archivo']['type'];

echo  $cliente = $_POST['cliente'];

echo  $rut = $_POST['rut'];

echo  $email = $_POST['email'];

echo  $telefono = $_POST['telefono'];

echo  $transf = $_POST['transf2'];
  
echo  $nombre = $_POST['nombre'];

echo  $nacionalidad = $_POST['tipodoc'];

echo  $cedula = $_POST['iddoc'];

echo  $banco = $_POST['banco'];

echo  $cuenta = $_POST['cuenta'];
  
echo  $bolivares= $_POST['bolivares11'];

echo  $estatus = 'Recibida';


  if($transf == 2){

  echo $pesos1 = $_POST['pesos8'];
  
    if(!empty($_POST['nombre2']) && !empty($_POST['tipodoc2']) && !empty($_POST['iddoc2']) && !empty($_POST['banco2']) && 
    !empty($_POST['cuenta2']) && !empty($_POST['pesos5']) && !empty($_POST['bolivares5']) && $pesos>=7000){

      echo $nombre1 = $_POST['nombre2'];
      echo $nacionalidad1 = $_POST['tipodoc2'];
      echo $cedula1 = $_POST['iddoc2'];
      echo $banco1 = $_POST['banco2'];
      echo $cuenta1 = $_POST['cuenta2'];
      echo $bolivares1 = $_POST['bolivares8'];
     
      if(round((bcadd($pesos,$pesos1,15))) <= $totalpesos){
      
        if( $totalpesos >= 20000 && $totalpesos < 100000 && $pesos >= 10000){

        echo $bolivares = bcmul($pesos,$tasa,15);
        echo $bolivares1 = bcmul($pesos1,$tasa,15);
        echo $bolivares = floor($bolivares);
        echo $bolivares1 = floor($bolivares1);
        echo $pesos = floor($pesos);
        echo $pesos1 = floor($pesos1);
        
        $insertar =  "INSERT INTO transacciones1 (tasa, transaccion, archivo_binario, archivo_nombre, archivo_peso, archivo_tipo, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, Email, Telefono, estatus) VALUES('$tasa', '1','$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo', '$cliente', '$rut', '$nombre', '$nacionalidad', '$cedula', '$banco','$cuenta', '$totalpesos', '$pesos', '$bolivares','$email','$telefono', '$estatus') "; 
        
        $insertar1 = "INSERT INTO transacciones1 (tasa, transaccion, archivo_binario, archivo_nombre, archivo_peso, archivo_tipo, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, Email, Telefono, estatus) VALUES('$tasa', '2', '$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo', '$cliente', '$rut', '$nombre1', '$nacionalidad1', '$cedula1', '$banco1', '$cuenta1','$totalpesos', '$pesos1', '$bolivares1','$email','$telefono', '$estatus') ";
        
        $insertar  = mysqli_query($conexion, $insertar);
        $insertar1 = mysqli_query($conexion, $insertar1);
        
        if(!$insertar || !$insertar1){


          echo '<script>alert("Error 3"); window.location="principal.php"</script>';    
          //header('Location: principal.php');
              
          }else{
            
      $to = 'julioj.lopeza@gmail.com'; // <– replace with your address here
      $subject = 'Transaccion en proceso';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Aguacatecambios <support@aguacatecambios.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	  $message = "<html><body>";
	  $message .= "<p>Estimado, <b>$cliente</b></p>
	  
	  <p>Cumplimos con informarle que su transacción será verificada y de cumplir con los requerimientos mínimos le avisaremos apenas este lista. Los datos suministrados fueron:</p>
	  
	  <h4>Beneficiario 1</h4>
	  <p><b>- Beneficiario:</b> $nombre</p>
	  <p><b>- Cedula:</b> $nacionalidad - $cedula</p>
	  <p><b>- Banco:</b> $banco</p>
	  <p><b>- Cuenta:</b> $cuenta</p>
	  <p><b>- Cantidad de pesos depositados:</b> $pesos</p>
	  <p><b>- Cantidad de bolivares a recibir:</b> $bolivares</p>
	  
	  <h4>Beneficiario 2</h4>
	  <p><b>- Beneficiario:</b> $nombre1</p>
	  <p><b>- Cedula:</b> $nacionalidad1 - $cedula1</p>
	  <p><b>- Banco:</b> $banco1</p>
	  <p><b>- Cuenta:</b> $cuenta1</p>
	  <p><b>- Cantidad de pesos depositados:</b> $pesos1</p>
	  <p><b>- Cantidad de bolivares a recibir:</b> $bolivares1</p>
	  
	  
	  <p>Si falta algún requerimiento es posible que existan retrasos y nos estaremos comunicando con ud para solicitar informacion extra.</p>
	  
	  <p>El identificador de su transacción es el <b>$id</b>, y su turno actual es el <b>$turno</b>.</p>
	  
	  <p>Gracias por su preferencia,</p>
	  
	  <p><b>Aguacatecambios</b></p>";
	  
	  $message .= "</body></html>";
	  
      mail($to,$subject,$message,$headers);
      echo 'Mail Sent';
            
          echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="principal.php"</script>';    
          //header('Location: principal.php');  
          //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
          //header('Location: principal.php');
          }
        
      }

        if($totalpesos >= 20000 && $totalpesos >= 100000 && $pesos >= 10000){
  
          $bolivares = bcmul($pesos,$tasa,15);
          $bolivares1 = bcmul($pesos1,$tasa,15);
          $bolivares = floor($bolivares);
          $bolivares1 = floor($bolivares1);
          $pesos = floor($pesos);
          $pesos1 = floor($pesos1);
          
          $insertar =  "INSERT INTO transacciones1 (tasa, transaccion ,archivo_binario, archivo_nombre, archivo_peso, archivo_tipo, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, Email, Telefono, estatus) VALUES('$tasa', '1', '$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo', '$cliente', '$rut', '$nombre', '$nacionalidad', '$cedula', '$banco', '$cuenta', '$totalpesos', '$pesos', '$bolivares','$email','$telefono', '$estatus') "; 
          
          $insertar1 = "INSERT INTO transacciones1 (tasa, transaccion ,archivo_binario, archivo_nombre, archivo_peso, archivo_tipo, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, Email, Telefono, estatus) VALUES('$tasa', '2','$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo', '$cliente', '$rut', '$nombre1', '$nacionalidad1', '$cedula1', '$banco1', '$cuenta1', '$totalpesos', '$pesos1', '$bolivares1','$email','$telefono', '$estatus') ";
          
          $insertar =  mysqli_query($conexion, $insertar);
          $insertar1 = mysqli_query($conexion, $insertar1);
          
          if(!$insertar || !$insertar1){

            echo '<script>alert("Error 1"); window.location="principal.php"</script>';    
            //header('Location: principal.php');
                
            }else{
              
          $to = 'julioj.lopeza@gmail.com'; // <– replace with your address here
      $subject = 'Transaccion en proceso';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Aguacatecambios <support@aguacatecambios.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	  $message = "<html><body>";
	  $message .= "<p>Estimado, <b>$cliente</b></p>
	  
	  <p>Cumplimos con informarle que su transacción será verificada y de cumplir con los requerimientos mínimos le avisaremos apenas este lista. Los datos suministrados fueron:</p>
	  
	  <h4>Beneficiario 1</h4>
	  <p><b>- Beneficiario:</b> $nombre</p>
	  <p><b>- Cedula:</b> $nacionalidad - $cedula</p>
	  <p><b>- Banco:</b> $banco</p>
	  <p><b>- Cuenta:</b> $cuenta</p>
	  <p><b>- Cantidad de pesos depositados:</b> $pesos</p>
	  <p><b>- Cantidad de bolivares a recibir:</b> $bolivares</p>
	  
	  <h4>Beneficiario 2</h4>
	  <p><b>- Beneficiario:</b> $nombre1</p>
	  <p><b>- Cedula:</b> $nacionalidad1 - $cedula1</p>
	  <p><b>- Banco:</b> $banco1</p>
	  <p><b>- Cuenta:</b> $cuenta1</p>
	  <p><b>- Cantidad de pesos depositados:</b> $pesos1</p>
	  <p><b>- Cantidad de bolivares a recibir:</b> $bolivares1</p>
	  
	  
	  <p>Si falta algún requerimiento es posible que existan retrasos y nos estaremos comunicando con ud para solicitar informacion extra.</p>
	  
	  <p>El identificador de su transacción es el <b>$id</b>, y su turno actual es el <b>$turno</b>.</p>
	  
	  <p>Gracias por su preferencia,</p>
	  
	  <p><b>Aguacatecambios</b></p>";
	  
	  $message .= "</body></html>";
	  
      mail($to,$subject,$message,$headers);
      echo 'Mail Sent';
              
            echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="principal.php"</script>';    
            //header('Location: principal.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: principal.php');
            }
          }
    }else{
      echo '<script>alert("Los cantidades a transferir no pueden ser mayores al deposito"); window.location="principal.php"</script>';    
            //header('Location: principal.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: principal.php');
      
    }
    
   }
  }else{
    
    if(round($pesos) <= $totalpesos){
  
    $bolivares = floor($bolivares);
    $pesos = floor($pesos);
    
    $insertar =  "INSERT INTO transacciones1 (tasa, transaccion, archivo_binario, archivo_nombre, archivo_peso, archivo_tipo, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, Email, Telefono, estatus) VALUES ('$tasa', '0','$binario_contenido', '$binario_nombre', '$binario_peso', '$binario_tipo', '$cliente', '$rut', '$nombre', '$nacionalidad','$cedula', '$banco', '$cuenta', '$totalpesos', '$pesos', '$bolivares', '$email', '$telefono', '$estatus') "; 
    
    $insertar = mysqli_query($conexion, $insertar);
    
    if(!$insertar){

      echo '<script>alert("Error 2"); window.location="principal.php"</script>';    
      //header('Location: principal.php');
          
      }else{
		  
		  
  $id = "SELECT Tasa from Tasa";
  $tasa = mysqli_query($conexion, $tasa);
  $tasa = mysqli_fetch_array($tasa);
echo  $tasa = $tasa['Tasa'];


  $tasa = "SELECT Tasa from Tasa";
  $tasa = mysqli_query($conexion, $tasa);
  $tasa = mysqli_fetch_array($tasa);
echo  $tasa = $tasa['Tasa'];
        
      $to = 'julioj.lopeza@gmail.com'; // <– replace with your address here
      $subject = 'Transaccion en proceso';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Aguacatecambios <support@aguacatecambios.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	  $message = "<html><body>";
	  $message .= "<p>Estimado, <b>$cliente</b></p>
	  
	  <p>Cumplimos con informarle que su transacción será verificada y de cumplir con los requerimientos mínimos le avisaremos apenas este lista. Los datos suministrados fueron:</p>
	  
	  <p><b>- Beneficiario:</b> $nombre</p>
	  <p><b>- Cedula:</b> $nacionalidad - $cedula</p>
	  <p><b>- Banco:</b> $banco</p>
	  <p><b>- Cuenta:</b> $cuenta</p>
	  <p><b>- Cantidad de pesos depositados:</b> $pesos</p>
	  <p><b>- Cantidad de bolivares a recibir:</b> $bolivares</p>
	  	
		
	  <p>Si falta algún requerimiento es posible que existan retrasos y nos estaremos comunicando con ud para solicitar informacion extra.</p>
	  
	  <p>El identificador de su transacción es el <b>$id</b>, y su turno actual es el <b>$turno</b>.</p>
	  
	  <p>Gracias por su preferencia,</p>
	  
	  <p><b>Aguacatecambios</b></p>";
	  
	  $message .= "</body></html>";
	  
      mail($to,$subject,$message,$headers);
      echo 'Mail Sent';
      
      echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="principal.php"</script>';    
      //header('Location: principal.php');  
      //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
      //header('Location: principal.php');  
      
        
        
        
  
  
      }
  }else{
    echo '<script>alert("Los cantidades a transferir no pueden ser mayores al deposito"); window.location="principal.php"</script>';    
            //header('Location: principal.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: principal.php');
         
            
  }
    }
    
  }else{
  echo '<script>alert("El mínimo a enviar por transferencia es de 10mil pesos!"); window.location="principal.php"</script>';
  
    
  }
  }else{
  echo '<script>alert("La TASA ha cambiado!.. Llenar el formulario nuevamente "); window.location="principal.php"</script>'; 
}
}else{
  echo '<script>alert("Por favor llene todos los datos del formulario!!! "); window.location="principal.php"</script>';  
}
  




/*
$insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar1 = $insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre1, $nacionalidad1, $cedula1, $banco1, $cuenta1, $totalPesos1, $pesos1, $bolilvares1, $estatus) ";

include 'conexion.php';

$insertar = mysqli_query($insertar, $conexion);
$insertar1 = mysqli_query($insertar1, $conexion);

if(!$insertar && !$insertar1){

  echo '<script>alert("Intente Nuevamente"); window.location="principal.php"</script>';    
//header('Location: principal.php');
    
}else{
  
  echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="principal.php"</script>';    
//header('Location: principal.php');  
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: principal.php');

    
}}}else{
  
  
  
  
  
  
  
  
  
  $insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 
include 'conexion.php';

$insertar = mysqli_query($conexion, $insertar);

if(!$insertar){

  echo '<script>alert("Faltan campos por llenar2); window.location="principal.php"</script>';    
//header('Location: principal.php');
//echo '<script>alert("Sus datos no fueron enviados, por favor intente de nuevo")"</script>';    
//header('Location: principal.php');
    
}else{

  echo '<script>alert("Sus datos fueron enviados con existos y su numero de transaccion es el "); window.location="principal.php"</script>';    
//header('Location: principal.php.php');
    
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: principal.php.php');

    
}}}else{

  
  
  echo '<script>alert("Faltan campos por llenar. Intente de nuevo"); window.location="principal.php"</script>';    
    
//header('Location: principal.php');

}
*/
?>