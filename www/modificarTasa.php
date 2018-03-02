<?php

session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");

if (isset($_SESSION['user'])){
    
        if($_SESSION['user'] == 'jlopez'|| $_SESSION['user'] == 'caldazoro'){
                
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
    
header('Location: transaccionesofic.php');

}
}else{
echo '<script>window.location="admin"</script>';
}


include 'conexion.php';
$tasa    = $_POST['tasa'];
$tasaesp = $_POST['tasaesp'];

$tasa = "UPDATE Tasa2 SET Tasa = '$tasa'";
$tasaesp = "UPDATE Tasa3 SET Tasa = '$tasaesp'";

$tasa= mysqli_query($conexion, $tasa);
$tasaesp= mysqli_query($conexion, $tasaesp);

if (!$tasa || !$tasaesp)
    
    echo error;
    
else

header('Location: transaccionesofic.php');

?>