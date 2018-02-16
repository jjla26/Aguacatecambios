<?php
session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");


$usuario= $_SESSION['user'];
$ids=$_POST['ids'];
$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
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

include 'tasa.php';
include 'conexion.php';
$seleccionar = "SELECT Total_deposito FROM transacciones1 WHERE comprobante= '$comprobante' ";
$seleccionar = mysqli_query($conexion,$seleccionar);
$seleccionar = mysqli_fetch_array($seleccionar);
$seleccionar = $seleccionar['Total_pesos'];

$comprobante_exist = "SELECT comprobante FROM transacciones1 WHERE comprobante= '$comprobante' AND comprobante != ''";
$suma = "SELECT SUM(Cantidad_pesos) FROM transacciones1 WHERE comprobante= '$comprobante'";
$comprobante_exist = mysqli_query($conexion,$comprobante_exist);
$comprobante_exist = mysqli_fetch_array($comprobante_exist);
$suma = mysqli_query($conexion, $suma);
$suma = mysqli_fetch_array($suma);
$suma = $suma['SUM(Cantidad_pesos'];

if (!$comprobante_exist){


$insertar = "UPDATE transacciones1 SET cliente='$cliente', rut='$rut', Nombre_apellido='$nombre',Tipo_doc='$tipodoc', Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta', Cantidad_pesos='$pesos', Cantidad_bs='$bolivares' ,Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

}else if ($suma <= $totalPesos){

$insertar = "INSERT INTO transacciones1(tasa,cliente, rut, comprobante,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Total_pesos, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$totalPesos','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$usuario')";

$resultado = mysqli_query($conexion, $insertar);

    
}else{
        
echo '<script>alert("COMPROBANTE DUPLICADO");window.location="transaccionesofic.php"</script>';

    
};

if (!$resultado)
    
    
echo 'error';

else{


echo '<script>window.location="transaccionesofic.php"</script>';

    
}

mysqli_close($conexion);
    


