<?php
session_start();

if(isset($_POST['codigo'])){

$usuario= $_SESSION['user'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$pesos = $_POST['pesos'];
$bolivares = $_POST['bolivares'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];



include 'conexion.php';
mysqli_select_db($conexion,'aguacatecambios');
    
$result = mysqli_query($conexion , "SELECT * FROM empresas WHERE codigo = '$codigo' and cuenta = '' ");

if($row = mysqli_fetch_array($result)){
$actualizar = "UPDATE empresas SET nombre = '$nombre', tipodoc='$tipodoc', iddoc = '$iddoc', banco = '$banco', cuenta = '$cuenta', pesos='$pesos', bolivares='$bolivares', email='$email', telefono = '$telefono' WHERE codigo= '$codigo'";



$resultado = mysqli_query($conexion, $actualizar);


if (!$resultado)
    
    
echo 'error';

else{

echo '<script>alert("Los datos han sido enviados satisfactoriamente!");window.location="deposito.php"</script>';

}

mysqli_close($conexion);

}else{
   echo '<script>alert("Codigo Verde Incorrecto, Intenta nuevamente");window.location="deposito.php"</script>';
}}