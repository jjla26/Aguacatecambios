<?php

//session_start();
//if (isset($_SESSION['user'])){
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


/*if (isset($_SESSION['user']) && isset($_POST['cliente']) && isset($_POST['rut']) && isset($_POST['email'])&& isset($_POST['telefono']) && 
isset($_POST['tranf']) && isset($_POST['tipodoc']) && isset($_POST['iddoc']) && isset($_POST['banco']) && isset($_POST['cuenta']) && isset($_POST['pesos']) && isset($_POST['bolivares'])){
*/

if (isset($_POST['tasap']) && isset($_POST['cliente']) && isset($_POST['rut']) && isset($_POST['totalpesos']) &&  isset($_POST['email'])&& isset($_POST['telefono']) && 
isset($_POST['transf2']) && isset($_POST['nombre']) && isset($_POST['tipodoc']) && isset($_POST['iddoc']) && isset($_POST['banco']) && 
isset($_POST['cuenta']) && isset($_POST['pesos']) && isset($_POST['bolivares'])){

  $tasap = $_POST['tasap'];
  $totalpesos = $_POST['totalpesos'];
  $pesos = $_POST['pesos'];
  
  include 'conexion.php';
  
  $tasa = "SELECT Tasa from Tasa";
  $tasa = mysqli_query($conexion, $tasa);
  $tasa = mysqli_fetch_array($tasa);
  $tasa = $tasa['Tasa'];
  
  $tasaesp = "SELECT Tasa from Tasa1";
  $tasaesp = mysqli_query($conexion, $tasaesp);
  $tasaesp = mysqli_fetch_array($tasaesp);
  $tasaesp = $tasaesp['Tasa'];
  
  if( $tasap == $tasa && $pesos >= 7000 && $totalpesos >= 7000){


  $cliente = $_POST['cliente'];
  $rut = $_POST['rut'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $transf = $_POST['transf2'];
  
  $nombre = $_POST['nombre'];
  $nacionalidad = $_POST['tipodoc'];
  $cedula = $_POST['iddoc'];
  $banco = $_POST['banco'];
  $cuenta = $_POST['cuenta'];
  
  $bolivares= $_POST['bolivares'];
  $estatus = 'Internet';


  if($transf == 2){

  $pesos1 = $_POST['pesos5'];
  
    if(isset($_POST['nombre2']) && isset($_POST['tipodoc2']) && isset($_POST['iddoc2']) && isset($_POST['banco2']) && 
    isset($_POST['cuenta2']) && isset($_POST['pesos5']) && isset($_POST['bolivares5']) && $pesos>=7000){

      $nombre1 = $_POST['nombre2'];
      $nacionalidad1 = $_POST['tipodoc2'];
      $cedula1 = $_POST['iddoc2'];
      $banco1 = $_POST['banco2'];
      $cuenta1 = $_POST['cuenta2'];
      
      $bolivares1 = $_POST['bolivares5'];
     
      if(round((bcadd($pesos,$pesos1,15))) <= $totalpesos){
      
        if( $totalpesos >= 14000 && $totalpesos < 100000 && $pesos >= 7000 && $pesos1 >= 7000){

        $bolivares = bcmul($pesos,$tasa,15);
        $bolivares1 = bcmul($pesos1,$tasa,15);
        $bolivares = floor($bolivares);
        $bolivares1 = floor($bolivares1);
        $pesos = floor($pesos);
        $pesos1 = floor($pesos1);
        
        $insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES('$cliente', '$rut', '$nombre', '$nacionalidad', '$cedula', '$banco','$cuenta', '$totalPesos', '$pesos', '$bolivares', '$estatus') "; 
        
        $insertar1 = "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES('$cliente', '$rut', '$nombre1', '$nacionalidad1', '$cedula1', '$banco1', '$cuenta1','$totalPesos1', '$pesos1', '$bolivares1', '$estatus') ";
        
        $insertar  = mysqli_query($conexion, $insertar);
        $insertar1 = mysqli_query($conexion, $insertar1);
        
        if(!$insertar || !$insertar1){


          echo '<script>alert("Error 3"); window.location="index.php"</script>';    
          //header('Location: index.php');
              
          }else{
            
          echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="index.php"</script>';    
          //header('Location: index.php');  
          //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
          //header('Location: index.php');
          }
        
      }

        if($totalpesos >= 14000 && $totalpesos >= 100000 && $pesos >= 7000 && $pesos1 >= 7000){
  
          $bolivares = bcmul($pesos,$tasa,15);
          $bolivares1 = bcmul($pesos1,$tasa,15);
          $bolivares = floor($bolivares);
          $bolivares1 = floor($bolivares1);
          $pesos = floor($pesos);
          $pesos1 = floor($pesos1);
          
          $insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES('$cliente', '$rut', '$nombre', '$nacionalidad', '$cedula', '$banco', '$cuenta', '$totalPesos', '$pesos', '$bolivares', '$estatus') "; 
          
          $insertar1 = "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES('$cliente', '$rut', '$nombre1', '$nacionalidad1', '$cedula1', '$banco1', '$cuenta1', '$totalPesos1', '$pesos1', '$bolivares1', '$estatus') ";
          
          $insertar =  mysqli_query($conexion, $insertar);
          $insertar1 = mysqli_query($conexion, $insertar1);
          
          if(!$insertar || !$insertar1){

            echo '<script>alert("Error 1"); window.location="index.php"</script>';    
            //header('Location: index.php');
                
            }else{
              
            echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="index.php"</script>';    
            //header('Location: index.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: index.php');
            }
          }
    }else{
      echo '<script>alert("Los cantidades a transferir no pueden ser mayores al deposito"); window.location="index.php"</script>';    
            //header('Location: index.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: index.php');
      
    }
    
   }
  }else{
    
    if(round($pesos) <= $totalpesos){
  
    $bolivares = floor($bolivares);
    $pesos = floor($pesos);
    
    $insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES ('$cliente', '$rut', '$nombre', '$nacionalidad','$cedula', '$banco', '$cuenta', '$totalpesos', '$pesos', '$bolivares', '$estatus') "; 
    
    $insertar = mysqli_query($conexion, $insertar);
    
    if(!$insertar){

      echo '<script>alert("Error 2"); window.location="index.php"</script>';    
      //header('Location: index.php');
          
      }else{
        
      echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="index.php"</script>';    
      //header('Location: index.php');  
      //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
      //header('Location: index.php');  
        
  
  
      }
  }else{
    echo '<script>alert("Los cantidades a transferir no pueden ser mayores al deposito"); window.location="index.php"</script>';    
            //header('Location: index.php');  
            //echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
            //header('Location: index.php');
  }
    }
    
  }else{
  echo '<script>alert("Por favor envie los datos nuevamente, datos erroneos"); window.location="index.php"</script>';
  
    
  }
}
  




/*
$insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar1 = $insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre1, $nacionalidad1, $cedula1, $banco1, $cuenta1, $totalPesos1, $pesos1, $bolilvares1, $estatus) ";

include 'conexion.php';

$insertar = mysqli_query($insertar, $conexion);
$insertar1 = mysqli_query($insertar1, $conexion);

if(!$insertar && !$insertar1){

  echo '<script>alert("Intente Nuevamente"); window.location="index.php"</script>';    
//header('Location: index.php');
    
}else{
  
  echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="index.php"</script>';    
//header('Location: index.php');  
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: index.php');

    
}}}else{
  
  
  
  
  
  
  
  
  
  $insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 
include 'conexion.php';

$insertar = mysqli_query($conexion, $insertar);

if(!$insertar){

  echo '<script>alert("Faltan campos por llenar2); window.location="index.php"</script>';    
//header('Location: index.php');
//echo '<script>alert("Sus datos no fueron enviados, por favor intente de nuevo")"</script>';    
//header('Location: index.php');
    
}else{

  echo '<script>alert("Sus datos fueron enviados con existos y su numero de transaccion es el "); window.location="index.php"</script>';    
//header('Location: index.php.php');
    
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: index.php.php');

    
}}}else{

  
  
  echo '<script>alert("Faltan campos por llenar. Intente de nuevo"); window.location="index.php"</script>';    
    
//header('Location: index.php');

}
*/
?>

