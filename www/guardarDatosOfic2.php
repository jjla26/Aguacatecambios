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

$usuario= $_SESSION['user'];
$ids  = $_GET['ids'];
$tasa = $_GET['tasa'];
$cliente = $_GET['cliente'];
$rut = $_GET['rut'];
$comprobante = $_GET['comprobante'];
$estatus = $_GET['transf'];
$nombre = $_GET['nombre'];
$tipodoc = $_GET['tipodoc']; 
$iddoc = $_GET['iddoc'];
$formaPago = $_GET['formaPago'];
$banco = $_GET['banco'];
$cuenta =$_GET['cuenta'];
$totalPesos=$_GET['totalpesos'];
$pesos = $_GET['pesos2'];
$bolivares = $_GET['bolivares2'];
$email = $_GET['email'];
$telefono = $_GET['telefono'];

if($pesos<=$totalPesos){
    
    if($estatus== 'Pendiente'){

include 'conexion.php';

$comprobante_exist = "SELECT comprobante FROM transacciones1 WHERE comprobante= '$comprobante' AND comprobante != ''";
$comprobante_exist = mysqli_query($conexion,$comprobante_exist);
$comprobante_exist = mysqli_fetch_array($comprobante_exist);

if (!$comprobante_exist){


$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($totalPesos != $pesos){
    
    echo $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares =  floor(bcmul($dif,$tasa,15)*100)/100;
    echo $dif2 = floor($dif*100)/100;
    
    $insertar1 = "INSERT INTO transacciones1 ( tasa , cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0','$dif','$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);

}

if (!$resultado && !$resultado1){

echo 'error';

mysqli_close($conexion);


}else{


echo '<script>window.location="transaccionesofic.php"</script>';

mysqli_close($conexion);

    
}

}else {
    

$seleccionar = "SELECT Total_pesos FROM transacciones1 WHERE comprobante= '$comprobante' ORDER BY Total_pesos desc LIMIT 1 ";
$seleccionar = mysqli_query($conexion,$seleccionar);
$seleccionar = mysqli_fetch_array($seleccionar);
echo $seleccionar = $seleccionar['Total_pesos'];

$suma = "SELECT SUM(Cantidad_pesos) FROM transacciones1 WHERE comprobante= '$comprobante'";
$suma = mysqli_query($conexion, $suma);
$suma = mysqli_fetch_array($suma);
echo $suma = $suma['SUM(Cantidad_pesos)']+$pesos;


if($suma <= $seleccionar+1){

$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($seleccionar-$suma >= 5 ){

    echo $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares =  floor(bcmul($dif,$tasa,15)*100)/100;
    echo $dif2 = floor($dif*100)/100;
    $insertar1 = "INSERT INTO transacciones1 (tasa,cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0',$dif,'$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);
    
}

if (!$resultado && !$resultado1){

echo 'error';

mysqli_close($conexion);

}else{


echo '<script>window.location="transaccionesofic.php"</script>';

mysqli_close($conexion);

    
}
    
}else{
    
echo '<script>alert("COMPROBANTE DUPLICADO");window.location="transaccionesofic.php"</script>';
mysqli_close($conexion);

    
}}}else{
    
include 'conexion.php';

$comprobante_exist = "SELECT comprobante FROM transacciones1 WHERE comprobante= '$comprobante' AND comprobante != ''";
$comprobante_exist = mysqli_query($conexion,$comprobante_exist);
$comprobante_exist = mysqli_fetch_array($comprobante_exist);

if (!$comprobante_exist){


$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($totalPesos != $pesos){
    
   echo  $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares = floor(bcmul($dif,$tasa,15)*100)/100; 
    echo $dif2 = floor($dif*100)/100;
    
    $insertar1 = "INSERT INTO transacciones1 ( tasa , cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha,comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0','$dif','$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);

}

if (!$resultado){

echo 'error';

mysqli_close($conexion);


}else{


echo '<script>window.location="transaccionesofic.php"</script>';

mysqli_close($conexion);

    
}

}else {

$seleccionar = "SELECT Total_pesos FROM transacciones1 WHERE comprobante= '$comprobante' ORDER BY Total_pesos desc LIMIT 1 ";
$seleccionar = mysqli_query($conexion,$seleccionar);
$seleccionar = mysqli_fetch_array($seleccionar);
echo $seleccionar = $seleccionar['Total_pesos'];

$suma = "SELECT SUM(Cantidad_pesos) FROM transacciones1 WHERE comprobante= '$comprobante'";
$suma = mysqli_query($conexion, $suma);
$suma = mysqli_fetch_array($suma);
echo $suma = $suma['SUM(Cantidad_pesos)']+$pesos;

if($suma <= $seleccionar+1){

$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($seleccionar-$suma >= 5 ){

    echo $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares = floor(bcmul($dif,$tasa,15)*100)/100; 
    echo $dif2 = floor($dif*100)/100;
    $insertar1 = "INSERT INTO transacciones1 (tasa,cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0',$dif,'$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);
    
}

if (!$resultado && !$resultado1){

echo 'error';

mysqli_close($conexion);

}else{


echo '<script>window.location="transaccionesofic.php"</script>';

mysqli_close($conexion);

    
}
    
}else{
    
echo '<script>alert("COMPROBANTE DUPLICADO");window.location="transaccionesofic.php"</script>';
mysqli_close($conexion);

    
}}
}
    
  
}else{
    
echo '<script>alert("No puedes solicitar mas pesos que lo disponible");window.location="transaccionesofic.php"</script>';    
}    

?>