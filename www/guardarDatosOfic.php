<?php

session_start();

$usuario= $_SESSION['user'];
$tasa = $_POST['tasa'];
$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$formaPago = $_POST['formaPago'];
$banco = $_POST['banco'];
$cuenta =$_POST['cuenta'];
$bancoOrigen = $_POST['bancoOrigen'];
$cuentaOrigen = $_POST['cuentaOrigen'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$estatus = $_POST['transf'];


if($estatus == "Pendiente"){

$insertar = "INSERT INTO Oficina(tasa, cliente, rut,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Cantidad_pesos, Cantidad_bs, Email, Telefono, Fecha, estatus, user) VALUES ('$tasa','$cliente','$rut','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$pesos','$bolivares','$email','$telefono','$current_date','$estatus','$user')";

include 'conexion.php';

$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)

echo 'error';

else{

echo '<script>window.location="depositoofic.php"</script>';

    
}

mysqli_close($conexion);

}else{
    



if($banco !== $bancoOrigen ){
    if($bolivares >= 10000000){
    $comision= 1659.0+27.0;
    $bolivaresCom = $bolivares+$comision; 
    
        
    }else{
    $comision=  27.0;
    $bolivaresCom = $bolivares+$comision; 
    
        
    }
    }else{
        $bolivaresCom = $bolivares;
}



if($cuentaOrigen == "Mercantil Mariana"){
$insertar1 = "INSERT INTO saldos( disp_mercantil_mariana)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Carlos"){
$insertar1 = "INSERT INTO saldos( disp_mercantil_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Juridica"){
$insertar1 = "INSERT INTO saldos( disp_mercantil_juridica)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Carlos"){
$insertar1 = "INSERT INTO saldos( disp_banesco_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Marola"){
$insertar1 = "INSERT INTO saldos( disp_banesco_marola)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Sonalys"){
$insertar1 = "INSERT INTO saldos( disp_banesco_sonalys)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Juridica"){
$insertar1 = "INSERT INTO saldos( disp_banesco_juridica)VALUES(($bolivaresCom*-1))";
}

$insertar = "INSERT INTO Oficina(tasa,cliente, rut,Nombre_apellido, Tipo_doc, Cedula, Forma_pago, Cuenta_destino, Numero_cuenta, Transferimos_desde, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono, Fecha, estatus, user) VALUES ('$tasa','$cliente','$rut','$nombre','$tipodoc','$iddoc','$formaPago','$banco','$cuenta','$cuentaOrigen','$pesos','$bolivares','$bolivaresCom','$email','$telefono','$current_date','$estatus','$user')";

include 'conexion.php';


$resultado = mysqli_query($conexion, $insertar);


$resultado1 = mysqli_query($conexion, $insertar1);

$ID=mysqli_insert_id($conexion)-1;


if($formaPago == "Efectivo"){
$abono_efec1 = "SELECT saldo_efec FROM saldos WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec']+$pesos;

}else{
$abono_efec1 = "SELECT saldo_efec FROM saldos WHERE ID = '$ID'";
$abono_efec1 = mysqli_query($conexion,$abono_efec1);
$abono_efec1 = mysqli_fetch_array($abono_efec1);
$abono_efec1= $abono_efec1['saldo_efec'];

    
}

if($formaPago == "DepositoRut"){
$abono_rut1 = "SELECT saldo_rut FROM saldos WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut']+$pesos;    
    
}else{
$abono_rut1 = "SELECT saldo_rut FROM saldos WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];    
}
if($formaPago == "DepositoVista"){

$abono_vista1 = "SELECT saldo_vista FROM saldos WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista']+$pesos;

}else{
    
$abono_vista1 = "SELECT saldo_vista FROM saldos WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];
    
}
if($formaPago == "DepositoAhorro"){
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro']+$pesos;

}else{
$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];

}


if($cuentaOrigen == "Mercantil Mariana"){
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;

}else{
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
}

if($bancoOrigen == $banco && $cuentaOrigen == "Mercantil Mariana"){
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana']-$bolivaresCom;
}else{
$disponible_mercantil_mariana = "SELECT disp_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_mariana = mysqli_query($conexion,$disponible_mercantil_mariana);
$disponible_mercantil_mariana = mysqli_fetch_array($disponible_mercantil_mariana);
$disponible_mercantil_mariana = $disponible_mercantil_mariana['disp_mercantil_mariana'];
}  


if($cuentaOrigen =="Mercantil Carlos"){
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;

    
}else{
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
}

if($bancoOrigen == $banco && $cuentaOrigen =="Mercantil Carlos"){
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos']-$bolivaresCom;
}else{
$disponible_mercantil_carlos = "SELECT disp_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_carlos = mysqli_query($conexion,$disponible_mercantil_carlos);
$disponible_mercantil_carlos = mysqli_fetch_array($disponible_mercantil_carlos);
$disponible_mercantil_carlos = $disponible_mercantil_carlos['disp_mercantil_carlos'];
}      

if($cuentaOrigen =="Mercantil Juridica"){
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
    
}else{
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
}
if($bancoOrigen == $banco & $cuentaOrigen =="Mercantil Juridica"){
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica']-$bolivaresCom;
}else{
$disponible_mercantil_juridica = "SELECT disp_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$disponible_mercantil_juridica = mysqli_query($conexion,$disponible_mercantil_juridica);
$disponible_mercantil_juridica = mysqli_fetch_array($disponible_mercantil_juridica);
$disponible_mercantil_juridica = $disponible_mercantil_juridica['disp_mercantil_juridica'];
}  


if($cuentaOrigen =="Banesco Carlos"){
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;

}else{
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
}
if($bancoOrigen == $banco && $cuentaOrigen =="Banesco Carlos"){
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos']-$bolivaresCom;
}else{
$disponible_banesco_carlos = "SELECT disp_banesco_carlos FROM saldos WHERE ID = '$ID'";
$disponible_banesco_carlos = mysqli_query($conexion,$disponible_banesco_carlos);
$disponible_banesco_carlos = mysqli_fetch_array($disponible_banesco_carlos);
$disponible_banesco_carlos = $disponible_banesco_carlos['disp_banesco_carlos'];

}  


if($cuentaOrigen == "Banesco Marola"){
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;

}else{
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Marola"){
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola']-$bolivaresCom;
}else{
$disponible_banesco_marola = "SELECT disp_banesco_marola FROM saldos WHERE ID = '$ID'";
$disponible_banesco_marola = mysqli_query($conexion,$disponible_banesco_marola);
$disponible_banesco_marola = mysqli_fetch_array($disponible_banesco_marola);
$disponible_banesco_marola = $disponible_banesco_marola['disp_banesco_marola'];
}  


if($cuentaOrigen == "Banesco Sonalys"){
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
    
}else{
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
}
if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Sonalys"){
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys']-$bolivaresCom;
}else{
$disponible_banesco_sonalys = "SELECT disp_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$disponible_banesco_sonalys = mysqli_query($conexion,$disponible_banesco_sonalys);
$disponible_banesco_sonalys = mysqli_fetch_array($disponible_banesco_sonalys);
$disponible_banesco_sonalys = $disponible_banesco_sonalys['disp_banesco_sonalys'];
}  


if($cuentaOrigen == "Banesco Juridica"){
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;

}else{
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
}

if($bancoOrigen == $banco && $cuentaOrigen == "Banesco Juridica"){
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica']-$bolivaresCom;

    
} else{
$disponible_banesco_juridica = "SELECT disp_banesco_juridica FROM saldos WHERE ID = '$ID'";
$disponible_banesco_juridica = mysqli_query($conexion,$disponible_banesco_juridica);
$disponible_banesco_juridica = mysqli_fetch_array($disponible_banesco_juridica);
$disponible_banesco_juridica = $disponible_banesco_juridica['disp_banesco_juridica'];
} 
    




$ID=$ID+1;

$insertar3 = "UPDATE saldos SET saldo_efec ='$abono_efec1', saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1', disp_mercantil_mariana='$disponible_mercantil_mariana', disp_mercantil_carlos='$disponible_mercantil_carlos', disp_mercantil_juridica='$disponible_mercantil_juridica', disp_banesco_carlos='$disponible_banesco_carlos', disp_banesco_marola='$disponible_banesco_marola', disp_banesco_sonalys='$disponible_banesco_sonalys', disp_banesco_juridica ='$disponible_banesco_juridica' WHERE ID= '$ID'";

$resultado3 = mysqli_query($conexion, $insertar3);




if (!$resultado || !$resultado1 || !$resultado3)
    
    
echo 'error';

else{


echo '<script>window.location="depositoofic.php"</script>';

    
}

mysqli_close($conexion);
    
}
