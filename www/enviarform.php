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

$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$transf = $_POST['transf'];
$totalpesos = $POST['totalpesos'];
$nombre = $_POST['nombre'];
$nacionalidad = $_POST['tipodoc'];
$cedula = $_POST['iddoc'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$pesos = $_POST['pesos'];
$bolivares= $_POST['bolivares'];

$nombre1 = $_POST['nombre1'];
$nacionalidad1 = $_POST['tipodoc1'];
$cedula1 = $_POST['iddoc1'];
$banco1 = $_POST['banco1'];
$cuenta1 = $_POST['cuenta1'];
$pesos1 = $_POST['pesos1'];
$bolivares1 = $_POST['bolivares1'];
$estatus = 'Internet';


if (isset($_SESSION['user']) && isset($nombre) && isset($rut) && isset($email)&& isset($telefono) && 
isset($nombre) && isset($nacionalidad) && isset($cedula) && isset($banco) && isset($cuenta) && isset($pesos) && isset($bolivares)){
    
    
}

else{
    
  echo '<script>alert("Faltan campos por llenar. Intente de nuevo"); window.location="index"</script>';    
    
//header('Location: index.php');
}


if($tranf == 2){

$insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 

$insertar1 = $insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre1, $nacionalidad1, $cedula1, $banco1, $cuenta1, $totalPesos1, $pesos1, $bolilvares1, $estatus) ";

include 'conexion.php';

$insertar = mysqli_query($insertar, $conexion);
$insertar1 = mysqli_query($insertar1, $conexion);

if(!$insertar && !$insertar1){

  echo '<script>alert("Faltan campos por llenar"); window.location="index"</script>';    
//header('Location: index.php');
    
}else{
  
  echo '<script>alert("Faltan campos por llenar1"); window.location="index"</script>';    
//header('Location: index.php');  
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: index.php');

    
}}

else{

$insertar= "INSERT INTO transacciones1(cliente, rut, Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Total_pessos, Cantidad_pesos, Cantidad_bs, estatus) VALUES($cliente, $rut, $nombre, $nacionalidad, $cedula, $banco, $cuenta, $totalPesos, $pesos, $bolilvares, $estatus) "; 
include 'conexion.php';

$insertar = mysqli_query($conexion, $insertar);

if(!$insertar){

  echo '<script>alert("Faltan campos por llenar2); window.location="index"</script>';    
//header('Location: index.php');
//echo '<script>alert("Sus datos no fueron enviados, por favor intente de nuevo")"</script>';    
//header('Location: index.php');
    
}else{

  echo '<script>alert("Faltan campos por llenar3"); window.location="index"</script>';    
//header('Location: index.php');
    
//echo '<script>alert("Sus datos fueron enviados con exito. Agradecemos su confianza")"</script>';    
//header('Location: index.php');

    
}}

?>

