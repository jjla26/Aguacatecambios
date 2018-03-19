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

if (isset($_POST['cliente']) && isset($_POST['rut']) && isset($_POST['totalpesos']) &&  isset($_POST['email'])&& isset($_POST['telefono']) && 
isset($_POST['transf2']) && isset($_POST['nombre']) && isset($_POST['tipodoc']) && isset($_POST['iddoc']) && isset($_POST['banco']) && 
isset($_POST['cuenta']) && isset($_POST['pesos']) && isset($_POST['bolivares'])){


if( $tasacalc == $tasa)

echo $cliente = $_POST['cliente'];
echo $rut = $_POST['rut'];
echo $email = $_POST['email'];
echo $telefono = $_POST['telefono'];
echo $transf = $_POST['transf2'];
echo $totalpesos = $_POST['totalpesos'];
echo $nombre = $_POST['nombre'];
echo $nacionalidad = $_POST['tipodoc'];
echo $cedula = $_POST['iddoc'];
echo $banco = $_POST['banco'];
echo $cuenta = $_POST['cuenta'];
echo $pesos = $_POST['pesos'];
echo $bolivares= $_POST['bolivares'];

include 'conexion.php';

$tasa = "SELECT Tasa from Tasa";
$tasa = mysqli_query($conexion, $tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa = $tasa['Tasa'];

$tasaesp = "SELECT Tasa from Tasa1";
$tasaesp = mysqli_query($conexion, $tasaesp);
$tasaesp = mysqli_fetch_array($tasaesp);
$tasaesp = $tasaesp['Tasa'];

$tasacalc = $pesos / $bolivares;

}



if($transf == 2){

  
  if(isset($_POST['nombre2']) && isset($_POST['tipodoc2']) && isset($_POST['iddoc2']) && isset($_POST['banco2']) && 
  isset($_POST['cuenta2']) && isset($_POST['pesos5']) && isset($_POST['bolivares5'])){

echo $nombre1 = $_POST['nombre2'];
echo $nacionalidad1 = $_POST['tipodoc2'];
echo $cedula1 = $_POST['iddoc2'];
echo $banco1 = $_POST['banco2'];
echo $cuenta1 = $_POST['cuenta2'];
echo $pesos1 = $_POST['pesos5'];
echo $bolivares1 = $_POST['bolivares5'];
echo $estatus = 'Internet';


if( $totalpesos >= 14000 && $totalpesos < 100000 && $pesos >= 7000 && $pesos1 >= 7000){

$bolivares = $pesos*$tasa;

$bolivares1 = $pesos*$tasa;

$insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar1 = "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre1, $nacionalidad1, $cedula1, $banco1, $cuenta1, $totalPesos1, $pesos1, $bolilvares1, $estatus) ";

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
}}

  if($totalpesos >= 14000 && $totalpesos >= 100000 && $pesos >= 7000 && $pesos1 >= 7000){
  
$bolivares = $pesos*$tasaesp;

$bolivares1 = $pesos*$tasaesp;

$insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar1 = "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre1, $nacionalidad1, $cedula1, $banco1, $cuenta1, $totalPesos1, $pesos1, $bolilvares1, $estatus) ";

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
}}}}else{
  
$bolivares = $pesos*$tasaesp;

$insertar =  "INSERT INTO transacciones1 (cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar = mysqli_query($conexion, $insertar);

if(!$insertar){

  echo '<script>alert("Error 2"); window.location="index.php"</script>';    
//header('Location: index.php');
    
}else{
  
  echo '<script>alert("Sus datos fueron enviados con exito y el número de su transaccion es el  "); window.location="index.php"</script>';    
//header('Location: index.php');  
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: index.php');  
  
  
  
} }
  




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

