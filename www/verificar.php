<?php
session_start();

date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");

if (isset($_SESSION['user'])){
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
}else{
}

$id = $_POST['ids1'];
$formaPago = $_POST['formaPago2'];
$comprobante = $_POST['comprobante3'];

include 'conexion.php';

$actualizar = "UPDATE transacciones1 SET Forma_pago = '$formaPago', estatus = 'Pendiente', comprobante = '$comprobante' WHERE ID = '$id'" ;

$actualizar=mysqli_query($conexion,$actualizar);

$resultado = mysqli_query($conexion,$datos);

if (!$resultado){

echo 'error';

mysqli_close($conexion);


}else{

mysqli_close($conexion);
}

?>