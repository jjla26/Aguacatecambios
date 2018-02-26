<?php

session_start();
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
echo '<script>window.location="admin"</script>';
}


date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");

$ids  = $_POST['ids'];

include 'conexion.php';

$actualizar = "UPDATE transacciones1 SET estatus = 'Pendiente' WHERE ID ='$ids'";

$resultado = mysqli_query($conexion, $actualizar);

if (!$resultado){

echo 'error';

mysqli_close($conexion);


}else{


echo '<script>window.location="transaccionesofic.php"</script>';

mysqli_close($conexion);

}

?>