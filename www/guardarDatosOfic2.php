<?php
session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");


$usuario= $_SESSION['user'];
$ids=$_POST['ids'];
$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$formaPago = $_POST['formaPago'];
$banco = $_POST['banco'];
$cuenta =$_POST['cuenta'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$estatus = $_POST['trans'];

include 'tasa.php';
include 'conexion.php';

$insertar = "UPDATE transacciones SET cliente='$cliente', rut='$rut', Nombre_apellido='$nombre',Tipo_doc='$tipodoc',Cedula='$iddoc',Cuenta_destino='$banco',Numero_cuenta='$cuenta',Bolivares_com='$bolivaresCom', estatus='$estatus', Email='$email', Telefono='$telefono' WHERE ID= '$ids'";

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
    
    
echo 'error';

else{


echo '<script>window.location="transaccionesofic.php"</script>';

    
}

mysqli_close($conexion);
    


