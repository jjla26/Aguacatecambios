<?php

session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d H:i:s");

if (!empty($_SESSION['user'])){
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


echo $usuario= $_SESSION['user'];
echo $cliente = $_POST['cliente'];
echo $transaccion = $_POST['transaccion'];
$rut = $_POST['rut'];
$tasa = $_POST['tasa'];
$estatus1 = $_POST['transf1'];
$estatus = $_POST['transf'];
$comprobante = $_POST['comprobante'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$formaPago = $_POST['formaPago'];
$banco = $_POST['banco'];
$cuenta =$_POST['cuenta'];
$bancoOrigen = $_POST['bancoOrigen'];
$cuentaOrigen = $_POST['cuentaOrigen'];
$totalPesos = $_POST['totalpesos'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$comentarios = $_POST['comentarios'];
$idi = $_POST['idi'];

include 'conexion.php';

if($totalPesos>=100000){
    $tasa = "SELECT Tasa FROM Tasa3";
    $tasa = mysqli_query($conexion,$tasa);
    $tasa = mysqli_fetch_array($tasa);
    $tasa = $tasa['Tasa'];
}else{
    $tasa = "SELECT Tasa FROM Tasa2";
    $tasa = mysqli_query($conexion,$tasa);
    $tasa = mysqli_fetch_array($tasa);
    $tasa = $tasa['Tasa'];
}


if($pesos <= $totalPesos){

//$upload_name=$_FILES["attachment"]["name"];
//$upload_type=$_FILES["attachment"]["type"];
//$upload_size=$_FILES["attachment"]["size"];
//$upload_temp=$_FILES["attachment"]["tmp_name"];


include 'conexion.php';

$comprobante_exist = "SELECT comprobante FROM transacciones1 WHERE comprobante= '$comprobante' AND comprobante != ''";
$comprobante_exist = mysqli_query($conexion,$comprobante_exist);
$comprobante_exist = mysqli_fetch_array($comprobante_exist);

if (!$comprobante_exist){

goto a;

}else {
    
    
$seleccionar = "SELECT Total_pesos FROM transacciones1 WHERE comprobante= '$comprobante' ORDER BY Total_pesos desc LIMIT 1 ";
$seleccionar = mysqli_query($conexion,$seleccionar);
$seleccionar = mysqli_fetch_array($seleccionar);
$seleccionar = $seleccionar['Total_pesos'];
$suma = "SELECT SUM(Cantidad_pesos) FROM transacciones1 WHERE comprobante= '$comprobante'";
$suma = mysqli_query($conexion, $suma);
$suma = mysqli_fetch_array($suma);
$suma = $suma['SUM(Cantidad_pesos)']+$pesos;

if($suma <= $seleccionar){

goto a;    
    
}else{
    
echo '<script>alert("COMPROBANTE DUPLICADO");window.location="transaccionesofic1.php.php"</script>';
mysqli_close($conexion);
}}    

a:
    
if ($estatus == 'NR'){

$bolivaresCom = $bolivares;

/*if($banco !== $bancoOrigen ){
//    if($bolivares >= 10000000){
//    $comision= 1659.0+27.0;
//    $bolivaresCom = $bolivares+$comision; 
//        
//    }else{
//    $comision=  27.0;
//    $bolivaresCom = $bolivares+$comision; 
//
//    }
//    }else{
//        $bolivaresCom = $bolivares;
}*/


$insertar1 = "INSERT INTO saldos1( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";

$insertar = "INSERT INTO transacciones1(tasa, cliente, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus, comentarios, idi, user) VALUES ('$tasa','$cliente','$comprobante','$formaPago','$totalPesos','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$comentarios','$idi','$usuario')";

$resultado = mysqli_query($conexion, $insertar);

$resultado1 = mysqli_query($conexion, $insertar1);

$ID=mysqli_insert_id($conexion)-1;


if($formaPago == "Efectivo" &&  $transaccion != '2'){
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec']+$totalPesos;

}else{
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

    
}

if($formaPago == "DepositoRut" &&  $transaccion != '2'){
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut']+$totalPesos;    
    
}else{
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
}
if($formaPago == "DepositoVista" &&  $transaccion != '2'){

$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista']+$totalPesos;

}else{
    
$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];
    
}
if($formaPago == "DepositoAhorro" &&  $transaccion != '2'){
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$totalPesos;

}else{
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];

}


if($cuentaOrigen == "Mercantil Mariana"){
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;

}else{
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
}

if($bancoOrigen == $banco && $cuentaOrigen == "Mercantil Mariana"){
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana']-$bolivaresCom;
}else{
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana'];
}  


if($cuentaOrigen =="Mercantil Carlos"){
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;

    
}else{
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
}

if($bancoOrigen == $banco && $cuentaOrigen =="Mercantil Carlos"){
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos']-$bolivaresCom;
}else{
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos'];
}      

if($cuentaOrigen =="Mercantil Juridica"){
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
    
}else{
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
}
if($bancoOrigen == $banco & $cuentaOrigen =="Mercantil Juridica"){
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica']-$bolivaresCom;
}else{
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica'];
}  


if($cuentaOrigen =="Banesco Carlos"){
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;

}else{
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos"){
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos']-$bolivaresCom;
}else{
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos'];

}  


if($cuentaOrigen =="Banesco Carlos Papa"){
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1= $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa']-$bolivaresCom;

}else{
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1= $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos Papa"){
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa']-$bolivaresCom;
}else{
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa'];

}

if($cuentaOrigen == "Banesco Marola"){
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;

}else{
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Marola"){
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola']-$bolivaresCom;
}else{
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola'];
}  


if($cuentaOrigen == "Banesco Sonalys"){
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
    
}else{
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Sonalys"){
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys']-$bolivaresCom;
}else{
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys'];
}  


if($cuentaOrigen == "Banesco Juridica"){
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;

}else{
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
}

if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Juridica"){
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica']-$bolivaresCom;

    
} else{
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica'];
} 
    




$ID=$ID+1;

$insertar3 = "UPDATE saldos1 SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_carlos_papa='$abono_banesco_carlos_papa1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_carlos_papa='$disponible_banesco_carlos_papa', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica', Fecha='$current_date', transaccion= '$ID' WHERE ID= '$ID'";

$resultado3 = mysqli_query($conexion, $insertar3);

if (!$resultado || !$resultado1 || !$resultado3){
    
    
echo 'error';
mysqli_close($conexion);

}else{


echo '<script>window.location="transaccionesofic1.php.php"</script>';

mysqli_close($conexion);

    
}};

if($estatus == "Pendiente"){


$bolivaresCom = $bolivares;


$insertar2 = "INSERT INTO saldos1( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";

$insertar = "INSERT INTO transacciones1(tasa,cliente, rut, comprobante,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Total_pesos, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$totalPesos','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$comentarios','$usuario')";

if ($totalPesos != $pesos && $estatus1 != 'Recibida'){
    
    echo $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares = floor(bcmul($dif,$tasa,15)*100)/100;
    echo $dif2 = floor($dif*100)/100;
    
    $insertar1 = "INSERT INTO transacciones1 ( tasa , cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0','$dif','$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);

}

$resultado = mysqli_query($conexion, $insertar);

$resultado2 = mysqli_query($conexion, $insertar2);

$ID=mysqli_insert_id($conexion)-1;





if($formaPago == "Efectivo" &&  $transaccion != '2'){
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec']+$totalPesos;

}else{
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

    
}

if($formaPago == "DepositoRut" &&  $transaccion != '2'){
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut']+$totalPesos;    
    
}else{
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
}
if($formaPago == "DepositoVista" &&  $transaccion != '2'){

$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista']+$totalPesos;

}else{
    
$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];
    
}
if($formaPago == "DepositoAhorro" &&  $transaccion != '2'){
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$totalPesos;

}else{
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];

}


if($cuentaOrigen == "Mercantil Mariana"){
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;

}else{
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
}

if($bancoOrigen == $banco && $cuentaOrigen == "Mercantil Mariana"){
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana']-$bolivaresCom;
}else{
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana'];
}  


if($cuentaOrigen =="Mercantil Carlos"){
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;

    
}else{
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
}

if($bancoOrigen == $banco && $cuentaOrigen =="Mercantil Carlos"){
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos']-$bolivaresCom;
}else{
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos'];
}      

if($cuentaOrigen =="Mercantil Juridica"){
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
    
}else{
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
}
if($bancoOrigen == $banco & $cuentaOrigen =="Mercantil Juridica"){
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica']-$bolivaresCom;
}else{
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica'];
}  


if($cuentaOrigen =="Banesco Carlos"){
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;

}else{
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos"){
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos']-$bolivaresCom;
}else{
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos'];

}  

if($cuentaOrigen =="Banesco Carlos Papa"){
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa']-$bolivaresCom;

}else{
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos Papa"){
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa']-$bolivaresCom;
}else{
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa'];

}  



if($cuentaOrigen == "Banesco Marola"){
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;

}else{
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Marola"){
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola']-$bolivaresCom;
}else{
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola'];
}  


if($cuentaOrigen == "Banesco Sonalys"){
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
    
}else{
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Sonalys"){
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys']-$bolivaresCom;
}else{
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys'];
}  


if($cuentaOrigen == "Banesco Juridica"){
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;

}else{
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
}

if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Juridica"){
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica']-$bolivaresCom;

    
} else{
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica'];
} 
    
$ID=$ID+1;

$insertar3 = "UPDATE saldos1 SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_carlos_papa='$abono_banesco_carlos_papa1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_carlos_papa ='$disponible_banesco_carlos_papa', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica', Fecha='$current_date' WHERE ID= '$ID'";

$actualizar1 = "UPDATE transacciones1 SET estatus = 'Enviada' WHERE ID = '$idi'";

$actualizar1 = mysqli_query($conexion,$actualizar1);

$resultado3 = mysqli_query($conexion, $insertar3);

if (!$resultado && !$resultado1 && !$resultado2 && !$resultado3 && !$actualizar1){
    
    
echo 'error';
mysqli_close($conexion);

}else{


echo '<script>window.location="transaccionesofic1.php.php"</script>';

mysqli_close($conexion);

    
}};

if($estatus == "No Verificado"){


$bolivaresCom = $bolivares;


$insertar2 = "INSERT INTO saldos1( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";

$insertar = "INSERT INTO transacciones1(tasa,cliente, rut, comprobante,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Total_pesos, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus,comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$totalPesos','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$comentarios','$usuario')";

if ($totalPesos != $pesos && $estatus1 != 'Recibida'){
    
    echo $dif = bcsub($totalPesos,$pesos,15);
    echo $bolivares = floor(bcmul($dif,$tasa,15)*100)/100;   
    echo $dif2 = floor($dif*100)/100;
    
    
    $insertar1 = "INSERT INTO transacciones1 ( tasa , cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Diferencia, Cantidad_bs, Email, Telefono, estatus, Fecha, comentarios, user) VALUES ('$tasa','$cliente','$rut','$comprobante','$formaPago','$dif','0','$dif','$bolivares','$email','$telefono','NR','$current_date','$dif2 restan','$usuario')";
    $resultado1 = mysqli_query($conexion, $insertar1);

}

$resultado = mysqli_query($conexion, $insertar);

$resultado2 = mysqli_query($conexion, $insertar2);

$ID=mysqli_insert_id($conexion)-1;





if($formaPago == "Efectivo" &&  $transaccion != '2'){
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec']+$totalPesos;

}else{
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

    
}

if($formaPago == "DepositoRut" &&  $transaccion != '2'){
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut']+$totalPesos;    
    
}else{
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
}
if($formaPago == "DepositoVista" &&  $transaccion != '2'){

$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista']+$totalPesos;

}else{
    
$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];
    
}
if($formaPago == "DepositoAhorro" &&  $transaccion != '2'){
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$totalPesos;

}else{
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];

}


if($cuentaOrigen == "Mercantil Mariana"){
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;

}else{
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
}

if($bancoOrigen == $banco && $cuentaOrigen == "Mercantil Mariana"){
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana']-$bolivaresCom;
}else{
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana'];
}  


if($cuentaOrigen =="Mercantil Carlos"){
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;

    
}else{
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
}

if($bancoOrigen == $banco && $cuentaOrigen =="Mercantil Carlos"){
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos']-$bolivaresCom;
}else{
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos'];
}      

if($cuentaOrigen =="Mercantil Juridica"){
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
    
}else{
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
}
if($bancoOrigen == $banco & $cuentaOrigen =="Mercantil Juridica"){
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica']-$bolivaresCom;
}else{
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica'];
}  


if($cuentaOrigen =="Banesco Carlos"){
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;

}else{
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos"){
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos']-$bolivaresCom;
}else{
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos'];

}  

if($cuentaOrigen =="Banesco Carlos Papa"){
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa']-$bolivaresCom;

}else{
$abono_banesco_carlos_papa1 = "SELECT saldo_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_carlos_papa1 = mysqli_query($conexion,$abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = mysqli_fetch_array($abono_banesco_carlos_papa1);
$abono_banesco_carlos_papa1 = $abono_banesco_carlos_papa1['saldo_banesco_carlos_papa'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos Papa"){
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa']-$bolivaresCom;
}else{
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa'];

}  



if($cuentaOrigen == "Banesco Marola"){
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;

}else{
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Marola"){
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola']-$bolivaresCom;
}else{
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola'];
}  


if($cuentaOrigen == "Banesco Sonalys"){
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
    
}else{
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Sonalys"){
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys']-$bolivaresCom;
}else{
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys'];
}  


if($cuentaOrigen == "Banesco Juridica"){
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;

}else{
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
}

if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Juridica"){
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica']-$bolivaresCom;

    
} else{
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica'];
} 
    
$ID=$ID+1;

$insertar3 = "UPDATE saldos1 SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_carlos_papa='$abono_banesco_carlos_papa1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_carlos_papa ='$disponible_banesco_carlos_papa', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica', Fecha='$current_date' WHERE ID= '$ID'";

$actualizar1 = "UPDATE transacciones1 SET estatus = 'Enviada' WHERE ID = '$idi'";

$actualizar1 = mysqli_query($conexion,$actualizar1);

$resultado3 = mysqli_query($conexion, $insertar3);

if (!$resultado && !$resultado1 && !$resultado2 && !$resultado3 && !$actualizar1){
    
echo 'error';
mysqli_close($conexion);

}else{

echo '<script>window.location="transaccionesofic1.php.php"</script>';

mysqli_close($conexion);

    
}} 


//if($estatus=='Inmediata'){
//
//
//$base=basename($file_name);
//$extension=substr($base, strlen($base)-4, strlen($base));
//$allowed_extensions = array (".pdf", ".jpeg");
//$file= $temp_name;
//$content= chunk_split(base64_encode(file_get_contents($file)));
//$uid=md5(uniqid(time()));
//    
//
//if($banco !== $bancoOrigen ){
//    if($bolivares >= 10000000){
//    $comision= 1659.0+27.0;
//    $bolivaresCom = $bolivares+$comision; 
//    
//        
//    }else{
//    $comision=  27.0;
//    $bolivaresCom = $bolivares+$comision; 
//    
//        
//    }
//    }else{
//        $bolivaresCom = $bolivares;
//}
//
//
//
//if($cuentaOrigen == "Mercantil Mariana"){
//$insertar1 = "INSERT INTO saldos1( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Mercantil Carlos"){
//$insertar1 = "INSERT INTO saldos1( disp_mercantil_carlos)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Mercantil Juridica"){
//$insertar1 = "INSERT INTO saldos1( disp_mercantil_juridica)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Banesco Carlos"){
//$insertar1 = "INSERT INTO saldos1( disp_banesco_carlos)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Banesco Marola"){
//$insertar1 = "INSERT INTO saldos1( disp_banesco_marola)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Banesco Sonalys"){
//$insertar1 = "INSERT INTO saldos1( disp_banesco_sonalys)VALUES(($bolivaresCom*-1))";
//
//}elseif($cuentaOrigen == "Banesco Juridica"){
//$insertar1 = "INSERT INTO saldos1( disp_banesco_juridica)VALUES(($bolivaresCom*-1))";
//}
//
//$insertar = "INSERT INTO transacciones1(tasa,cliente, rut,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus, user) VALUES ('$tasa','$cliente','$rut','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$usuario')";
//
//include 'conexion.php';
//
//
//$resultado = mysqli_query($conexion, $insertar);
//
//$resultado1 = mysqli_query($conexion, $insertar1);
//
//$ID=mysqli_insert_id($conexion)-1;
//
//
//if($formaPago == "Efectivo"){
//$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
//$abono_efec1 = mysqli_query($conexion,$abono_efec1);
//$abono_efec1 = mysqli_fetch_array($abono_efec1);
//$abono_efec1= $abono_efec1['saldo_efec']+$pesos;
//
//}else{
//$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
//$abono_efec1 = mysqli_query($conexion,$abono_efec1);
//$abono_efec1 = mysqli_fetch_array($abono_efec1);
//$abono_efec1= $abono_efec1['saldo_efec'];
//
//    
//}
//
//if($formaPago == "DepositoRut"){
//$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
//$abono_rut1 = mysqli_query($conexion,$abono_rut1);
//$abono_rut1 = mysqli_fetch_array($abono_rut1);
//$abono_rut1= $abono_rut1['saldo_rut']+$pesos;    
//    
//}else{
//$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
//$abono_rut1 = mysqli_query($conexion,$abono_rut1);
//$abono_rut1 = mysqli_fetch_array($abono_rut1);
//$abono_rut1= $abono_rut1['saldo_rut'];    
//}
//if($formaPago == "DepositoVista"){
//
//$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
//$abono_vista1 = mysqli_query($conexion,$abono_vista1);
//$abono_vista1 = mysqli_fetch_array($abono_vista1);
//$abono_vista1= $abono_vista1['saldo_vista']+$pesos;
//
//}else{
//    
//$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
//$abono_vista1 = mysqli_query($conexion,$abono_vista1);
//$abono_vista1 = mysqli_fetch_array($abono_vista1);
//$abono_vista1= $abono_vista1['saldo_vista'];
//    
//}
//if($formaPago == "DepositoAhorro"){
//$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
//$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
//$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
//$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$pesos;
//
//}else{
//$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
//$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
//$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
//$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];
//
//}
//
//
//if($cuentaOrigen == "Mercantil Mariana"){
//$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
//$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
//$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;
//
//}else{
//$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
//$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
//$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
//}
//
//if($bancoOrigen == $banco && $cuentaOrigen == "Mercantil Mariana"){
//$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
//$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
//$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana']-$bolivaresCom;
//}else{
//$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
//$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
//$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana'];
//}  
//
//
//if($cuentaOrigen =="Mercantil Carlos"){
//$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
//$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
//$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;
//
//    
//}else{
//$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
//$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
//$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
//}
//
//if($bancoOrigen == $banco && $cuentaOrigen =="Mercantil Carlos"){
//$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
//$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
//$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos']-$bolivaresCom;
//}else{
//$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
//$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
//$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos'];
//}      
//
//if($cuentaOrigen =="Mercantil Juridica"){
//$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
//$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
//$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
//    
//}else{
//$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
//$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
//$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
//$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
//}
//if($bancoOrigen == $banco & $cuentaOrigen =="Mercantil Juridica"){
//$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
//$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
//$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica']-$bolivaresCom;
//}else{
//$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos1 WHERE ID = '$ID'";
//$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
//$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
//$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica'];
//}  
//
//
//if($cuentaOrigen =="Banesco Carlos"){
//$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
//$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
//$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;
//
//}else{
//$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
//$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
//$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
//}
//if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos"){
//$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
//$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
//$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos']-$bolivaresCom;
//}else{
//$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
//$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
//$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos'];
//
//}  
//
//
//if($cuentaOrigen == "Banesco Marola"){
//$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
//$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
//$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;
//
//}else{
//$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
//$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
//$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
//}
//if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Marola"){
//$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
//$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
//$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola']-$bolivaresCom;
//}else{
//$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
//$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
//$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola'];
//}  
//
//
//if($cuentaOrigen == "Banesco Sonalys"){
//$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
//$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
//$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
//    
//}else{
//$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
//$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
//$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
//}
//if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Sonalys"){
//$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
//$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
//$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys']-$bolivaresCom;
//}else{
//$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
//$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
//$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys'];
//}  
//
//
//if($cuentaOrigen == "Banesco Juridica"){
//$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
//$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
//$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;
//
//}else{
//$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
//$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
//$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
//$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
//}
//
//if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Juridica"){
//$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
//$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
//$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica']-$bolivaresCom;
//
//    
//} else{
//$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos1 WHERE ID = '$ID'";
//$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
//$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
//$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica'];
//} 
//    
//
//
//
//
//$ID=$ID+1;
//
//$insertar3 = "UPDATE saldos1 SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica', Fecha='$current_date' WHERE ID= '$ID'";
//
//$resultado3 = mysqli_query($conexion, $insertar3);
//
//
//
//$subject = "Your Subject";
//
//$message="Hola,Estimado $nombre \n
//
//Te informamos que tu transferencia fue realizada bajo el numero de comprobante banesco $comprobante\n
//
//Adjunta se encuentra tu boleta de servicio\n
//
//Gracias por preferirnos!\n
//
//Aguacatecambios";
//
//$fp = fopen($upload_temp, "rb");
//$file = fread($fp, $upload_size);
//$file = chunk_split(base64_encode($file));
//$num = md5(time());
//
////Normal headers
//
//$headers  = "From: Aguacatecambios <support@aguacatecambios.com>\r\n";
//$headers  .= "MIME-Version: 1.0\r\n";
//$headers  .= "Content-Type: multipart/mixed; ";
//$headers  .= "boundary=".$num."\r\n";
//$headers  .= "--$num\r\n";
//
//
//// With message
//
//$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
//$headers .= "Content-Transfer-Encoding: 8bit\r\n";
//$headers .= "".$message."\n";
//$headers .= "--".$num."\n";
//
//// Attachment headers
//
//$headers  .= "Content-Type: application/".$upload_type." ";
//$headers  .= "name=\"".$upload_name."\"r\n";
//$headers  .= "Content-Transfer-Encoding: base64\r\n";
//$headers  .= "Content-Disposition: attachment; ";
//$headers  .= "filename=\"".$upload_name."\"\r\n\n";
//$headers  .= "".$file."\r\n";
//$headers  .= "--".$num."--";
//
//// SEND MAIL
//mail($email, $subject, $message, $headers);
//fclose($fp);
//
//
//header("location: transaccionesofic.php");
//
//
//if (!$resultado || !$resultado1 || !$resultado3)
//    
//    
//echo 'error';
//
//else{
//
//
//echo '<script>window.location="transaccionesofic.php"</script>';
//
//    
//}
//
//mysqli_close($conexion);
//    
//}
//
}else{
    echo '<script>alert("No puedes solicitar mas pesos que lo disponible");window.location="transaccionesofic1.php.php"</script>';
};