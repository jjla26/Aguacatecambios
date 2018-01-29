<?php


$tasa = $_POST['tasa'];
$nombre = $_POST['nombre'];
$tipodoc = $_POST['tipodoc']; 
$iddoc = $_POST['iddoc'];
$banco = $_POST['banco'];
$bancoOrigen = $_POST['bancoOrigen'];
$cuentaOrigen = $_POST['cuentaOrigen'];
$pesos = $_POST['pesos2'];
$bolivares = $_POST['bolivares2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

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
$insertar1 = "INSERT INTO saldos( transf_mercantil_mariana)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Carlos"){
$insertar1 = "INSERT INTO saldos( transf_mercantil_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Mercantil Juridica"){
$insertar1 = "INSERT INTO saldos( transf_mercantil_juridica)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Carlos"){
$insertar1 = "INSERT INTO saldos( transf_banesco_carlos)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Marola"){
$insertar1 = "INSERT INTO saldos( transf_banesco_marola)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Sonalys"){
$insertar1 = "INSERT INTO saldos( transf_banesco_sonalys)VALUES(($bolivaresCom*-1))";

}elseif($cuentaOrigen == "Banesco Juridica"){
$insertar1 = "INSERT INTO saldos( transf_banesco_juridica)VALUES(($bolivaresCom*-1))";
}

$insertar = "INSERT INTO Oficina(tasa,Nombre_apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Transferimos_desde, Cantidad_pesos, Cantidad_bs, Bolivares_com, Email, Telefono) VALUES ('$tasa','$nombre','$tipodoc','$iddoc','$banco','$cuenta','$cuentaOrigen','$pesos','$bolivares','$bolivaresCom','$email','$telefono')";

include 'conexion.php';


$resultado = mysqli_query($conexion, $insertar);


$resultado1 = mysqli_query($conexion, $insertar1);

$ID=mysqli_insert_id($conexion)-1;

$abono_rut1 = "SELECT saldo_rut FROM saldos WHERE ID = '$ID'";
$abono_rut1 = mysqli_query($conexion,$abono_rut1);
$abono_rut1 = mysqli_fetch_array($abono_rut1);
$abono_rut1= $abono_rut1['saldo_rut'];

$abono_vista1 = "SELECT saldo_vista FROM saldos WHERE ID = '$ID'";
$abono_vista1 = mysqli_query($conexion,$abono_vista1);
$abono_vista1 = mysqli_fetch_array($abono_vista1);
$abono_vista1= $abono_vista1['saldo_vista'];

$abono_ahorro1 = "SELECT saldo_ahorro FROM saldos WHERE ID = '$ID'";
$abono_ahorro1 = mysqli_query($conexion,$abono_ahorro1);
$abono_ahorro1 = mysqli_fetch_array($abono_ahorro1);
$abono_ahorro1= $abono_ahorro1['saldo_ahorro'];



if($cuentaOrigen == "Mercantil Mariana"){
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_mercantil_mariana1 = "SELECT saldo_mercantil_mariana FROM saldos WHERE ID = '$ID'";
$abono_mercantil_mariana1 = mysqli_query($conexion,$abono_mercantil_mariana1);
$abono_mercantil_mariana1 = mysqli_fetch_array($abono_mercantil_mariana1);
$abono_mercantil_mariana1= $abono_mercantil_mariana1['saldo_mercantil_mariana'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen =="Mercantil Carlos"){
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_mercantil_carlos1 = "SELECT saldo_mercantil_carlos FROM saldos WHERE ID = '$ID'";
$abono_mercantil_carlos1 = mysqli_query($conexion,$abono_mercantil_carlos1);
$abono_mercantil_carlos1 = mysqli_fetch_array($abono_mercantil_carlos1);
$abono_mercantil_carlos1= $abono_mercantil_carlos1['saldo_mercantil_carlos'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen =="Mercantil Juridica"){
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_mercantil_juridica1 = "SELECT saldo_mercantil_juridica FROM saldos WHERE ID = '$ID'";
$abono_mercantil_juridica1 = mysqli_query($conexion,$abono_mercantil_juridica1);
$abono_mercantil_juridica1 = mysqli_fetch_array($abono_mercantil_juridica1);
$abono_mercantil_juridica1= $abono_mercantil_juridica1['saldo_mercantil_juridica'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen =="Banesco Carlos"){
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_banesco_carlos1 = "SELECT saldo_banesco_carlos FROM saldos WHERE ID = '$ID'";
$abono_banesco_carlos1 = mysqli_query($conexion,$abono_banesco_carlos1);
$abono_banesco_carlos1 = mysqli_fetch_array($abono_banesco_carlos1);
$abono_banesco_carlos1= $abono_banesco_carlos1['saldo_banesco_carlos'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen == "Banesco Marola"){
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_banesco_marola1 = "SELECT saldo_banesco_marola FROM saldos WHERE ID = '$ID'";
$abono_banesco_marola1 = mysqli_query($conexion,$abono_banesco_marola1);
$abono_banesco_marola1 = mysqli_fetch_array($abono_banesco_marola1);
$abono_banesco_marola1= $abono_banesco_marola1['saldo_banesco_marola'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen == "Banesco Sonalys"){
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_banesco_sonalys1 = "SELECT saldo_banesco_sonalys FROM saldos WHERE ID = '$ID'";
$abono_banesco_sonalys1 = mysqli_query($conexion,$abono_banesco_sonalys1);
$abono_banesco_sonalys1 = mysqli_fetch_array($abono_banesco_sonalys1);
$abono_banesco_sonalys1= $abono_banesco_sonalys1['saldo_banesco_sonalys'];
$disponible = ;
$bs_requeridos = $POST[];
    
}

if($cuentaOrigen == "Banesco Juridica"){
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica']-$bolivaresCom;
$disponible = ;
$bs_requeridos = $POST[];
    
}else{
$abono_banesco_juridica1 = "SELECT saldo_banesco_juridica FROM saldos WHERE ID = '$ID'";
$abono_banesco_juridica1 = mysqli_query($conexion,$abono_banesco_juridica1);
$abono_banesco_juridica1 = mysqli_fetch_array($abono_banesco_juridica1);
$abono_banesco_juridica1= $abono_banesco_juridica1['saldo_banesco_juridica'];    
$disponible = ;
$bs_requeridos = $POST[];
    
}




$ID=$ID+1;

$insertar3 = "UPDATE saldos SET saldo_rut ='$abono_rut1', saldo_ahorro ='$abono_ahorro1', saldo_vista= '$abono_vista1', saldo_mercantil_mariana='$abono_mercantil_mariana1', saldo_mercantil_carlos='$abono_mercantil_carlos1', saldo_mercantil_juridica='$abono_mercantil_juridica1', saldo_banesco_carlos='$abono_banesco_carlos1', saldo_banesco_marola='$abono_banesco_marola1', saldo_banesco_sonalys='$abono_banesco_sonalys1', saldo_banesco_juridica ='$abono_banesco_juridica1' WHERE ID= '$ID'";

$resultado3 = mysqli_query($conexion, $insertar3);




if (!$resultado || !$resultado1 || !$resultado3)
    
    
echo 'error';

else{


echo '<script>window.location="depositoofic.php"</script>';

    
}

mysqli_close($conexion);