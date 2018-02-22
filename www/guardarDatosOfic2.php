<?php

session_start();

date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");

$usuario= $_SESSION['user'];
$ids  = $_POST['ids'];
$tasa = $_POST['tasa'];
$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
$comprobante = $_POST['comprobante'];
$estatus = $_POST['transf'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$formaPago = $_POST['formaPago'];
$banco = $_POST['banco'];
$cuenta =$_POST['cuenta'];
$totalPesos=$_POST['totalpesos'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

if($pesos<=$totalPesos){

include 'conexion.php';

$comprobante_exist = "SELECT comprobante FROM transacciones1 WHERE comprobante= '$comprobante' AND comprobante != ''";
$comprobante_exist = mysqli_query($conexion,$comprobante_exist);
$comprobante_exist = mysqli_fetch_array($comprobante_exist);

if (!$comprobante_exist){


$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($totalPesos != $pesos){
    
    $dif = $totalPesos-$pesos;
    $bolivares = ($totalPesos-$pesos)*$tasa;    
    
    $insertar1 = "INSERT INTO transacciones1 ( tasa , cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, estatus, Fecha, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0','$dif','$bolivares','NR','$current_date','$usuario')";
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

if($suma <= $seleccionar){

$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', comprobante='$comprobante', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Total_pesos='$totalPesos', Cantidad_pesos='$pesos', Diferencia='0', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if ($seleccionar != $suma ){

    $dif = $totalPesos-$pesos;
    $bolivares = $dif*$tasa;
    $insertar1 = "INSERT INTO transacciones1 (tasa,cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, estatus, Fecha, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0',$dif,'$bolivares','NR','$current_date','$usuario')";
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
    
echo '<script>alert("No puedes solicitar mas pesos que lo disponible");window.location="transaccionesofic.php"</script>';    
}    

?>