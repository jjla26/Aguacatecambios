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
echo '<script>window.location="admin"</script>';
}


echo $cuenta = $_POST['cuentab'];

$consulta = "SELECT * FROM transacciones WHERE Numero_cuenta = '$cuenta' AND Transferimos_desde = 'Mercantil Juridica'";

include 'conexion.php';

$resultado = mysqli_query($conexion, $consulta);
$resultado = mysqli_fetch_array($resultado);

if (!$resultado){
    
    echo '<script>alert("NO se ha transferido desde mercantil juridica"); window.location="transaccionesofic.php"</script>';

    
}else{
    
    echo '<script>alert("SI se ha transferido desde mercantil juridica"); window.location="transaccionesofic.php"</script>';
    mysqli_close($conexion);
}


?>