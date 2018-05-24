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


echo "usuario: " . $usuario = $_SESSION['user']; echo "<br>";
echo "cliente: " . $cliente = $_POST['cliente']; echo "<br>";
echo "rut: " . $rut = $_POST['rut']; echo "<br>";
echo "tasa: " . $tasa = $_POST['tasa']; echo "<br>";
echo "estatus: " . $estatus1 = $_POST['transf1']; echo "<br>";
echo "estatus: " . $estatus = $_POST['transf']; echo "<br>";
echo "comprobante: " . $comprobante = $_POST['comprobante']; echo "<br>";
echo "nombre: " . $nombre = $_POST['nombre']; echo "<br>";
echo "nacionaldiad: " . $tipodoc = $_POST['tipodoc']; echo "<br>"; 
echo "cedula: " . $iddoc = $_POST['iddoc']; echo "<br>";
echo "forma de pago: " . $formaPago = $_POST['formaPago']; echo "<br>";
echo "banco: " . $banco = $_POST['banco']; echo "<br>";
echo "cuenta: " . $cuenta =$_POST['cuenta']; echo "<br>";
echo "pesostotal: " . $totalPesos = $_POST['totalpesos']; echo "<br>";
echo "pesos: " . $pesos = $_POST['pesos2']; echo "<br>";
echo "bolivares: " . $bolivares = $_POST['bolivares2']; echo "<br>";
echo "email: " . $email = $_POST['email']; echo "<br>";
echo "telefono: " . $telefono = $_POST['telefono']; echo "<br>";
echo "comentarios: " . $comentarios = $_POST['comentarios']; echo "<br>";
echo "id:" . $idi = $_POST['idi']; echo "<br>";

include 'conexion.php';

if($estatus == 'Recibida'){
    
    $actualizar = "UPDATE transacciones1 SET estatus = '$estatus' WHERE ID = '$ID'";
}



/*include 'conexion.php';

$actualizar = "UPDATE transacciones1 SET Forma_pago = '$formaPago', estatus = 'Pendiente', comprobante = '$comprobante' WHERE ID = '$id'" ;

$actualizar=mysqli_query($conexion,$actualizar);

$resultado = mysqli_query($conexion,$datos);

if (!$resultado){

echo 'error';

mysqli_close($conexion);


}else{

mysqli_close($conexion);
}
*/

?>