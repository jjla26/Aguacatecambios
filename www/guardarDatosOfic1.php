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


$ids= $_POST['ids'];
$ncuenta= $_POST['numCuenta'];
$bolivares= $_POST['bs'];
$bancoOrigen= $_POST['bancoOrg'];
$cuentaOrigen = $_POST['cuentaOrg'];
$estatus = $_POST['transf'];

include 'conexion.php';

$datos= "SELECT Nombre_apellido, Cuenta_destino, Email FROM transacciones1 WHERE ID= '$ids'";
$datos= mysqli_query($conexion, $datos);

while ($row = mysqli_fetch_array($datos)) {
    
    $nombre = $row['Nombre_apellido'];
    $cuenta= $row['Cuenta_destino'];
    $email= $row['Email'];
    
}

$actualizar = "UPDATE transacciones1 SET Banco_origen='$bancoOrigen',Transferimos_desde ='$cuentaOrigen', Cantidad_bs= '$bolivares', Fecha='$current_date', estatus='Realizada'  WHERE ID= '$ids' " ;

$actualizar=mysqli_query($conexion,$actualizar);

$datos = "SELECT Forma_pago, Cuenta_destino, Banco_origen, Transferimos_desde, Cantidad_pesos, Cantidad_bs FROM transacciones1 WHERE ID='$ids'";

$resultado = mysqli_query($conexion,$datos);
  
    while ($row = mysqli_fetch_array($resultado)){
        $formaPago = $row['Forma_pago'];
        $banco = $row['Cuenta_destino'];
        $bancoOrigen = $row['Banco_origen'];
        $cuentaOrigen = $row['Transferimos_desde'];
        $pesos = $row ['Cantidad_pesos'];
        $bolivares = $row ['Cantidad_bs'];

    }

if($banco !== $bancoOrigen ){
    if($bolivares >= 10000000){
    $comision= 1659.0+27.0;
    $bolivaresCom = $bolivares+$comision; 
    $actualizar = "UPDATE transacciones1 SET Bolivares_com='$bolivaresCom' WHERE ID= '$ids' " ;
    $actualizar=mysqli_query($conexion,$actualizar);
    
    }else{
    $comision=  27.0;
    $bolivaresCom = $bolivares+$comision; 
    $actualizar = "UPDATE transacciones1 SET Bolivares_com='$bolivaresCom' WHERE ID= '$ids' " ;
    $actualizar=mysqli_query($conexion,$actualizar);    
    
        
    }
    }else{
        $bolivaresCom = $bolivares;
        $actualizar = "UPDATE transacciones1 SET Bolivares_com='$bolivaresCom' WHERE ID= '$ids' " ;
        $actualizar=mysqli_query($conexion,$actualizar);
}

if($cuentaOrigen == "Mercantil Mariana"){
$insertar1 = "INSERT INTO saldos1( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Carlos"){
$insertar1 = "INSERT INTO saldos1( disp_mercantil_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Juridica"){
$insertar1 = "INSERT INTO saldos1( disp_mercantil_juridica)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Carlos"){
$insertar1 = "INSERT INTO saldos1( disp_banesco_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Carlos Papa"){
$insertar1 = "INSERT INTO saldos1( disp_banesco_carlos_papa)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Marola"){
$insertar1 = "INSERT INTO saldos1( disp_banesco_marola)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Sonalys"){
$insertar1 = "INSERT INTO saldos1( disp_banesco_sonalys)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Juridica"){
$insertar1 = "INSERT INTO saldos1( disp_banesco_juridica)VALUES(($bolivaresCom*-1))";
}

$resultado1 = mysqli_query($conexion, $insertar1);

$ID=mysqli_insert_id($conexion)-1;


if($formaPago == "Efectivo"){
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

}else{
$abono_efec1 = "SELECT saldo_efec FROM saldos1 WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

    
}

if($formaPago == "DepositoRut"){
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
    
}else{
$abono_rut1 = "SELECT saldo_rut FROM saldos1 WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
}
if($formaPago == "DepositoVista"){

$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];

}else{
    
$abono_vista1 = "SELECT saldo_vista FROM saldos1 WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];
    
}
if($formaPago == "DepositoAhorro"){
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos1 WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];

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
$disponible_banesco_carlos_papa = "SELECT disp_banesco_carlos_papa FROM saldos1 WHERE ID = '$ID'";
$disponible_banesco_carlos_papa = mysqli_query($conexion,$disponible_banesco_carlos_papa);
$disponible_banesco_carlos_papa = mysqli_fetch_array($disponible_banesco_carlos_papa);
echo $disponible_banesco_carlos_papa = $disponible_banesco_carlos_papa['disp_banesco_carlos_papa']-$bolivaresCom;
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

$insertar3 = "UPDATE saldos1 SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_carlos_papa='$abono_banesco_carlos_papa1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_carlos_papa='$disponible_banesco_carlos_papa', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica', Fecha= '$current_date' WHERE ID= '$ID'";

$resultado3 = mysqli_query($conexion, $insertar3);


if (!$resultado || !$resultado1 || !$resultado3 || !$actualizar)
    
    
echo 'error';

else{


echo '<script>window.location="transaccionesofic.php"</script>';
mysqli_close($conexion);
    
}

//
//include 'sendmail.php';
//
mysqli_close($conexion);

?>