<?php
session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d");



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
//
?>

<!doctype html>
<html lang="es">
	<head>
		<title> Aguacatecambios </title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<meta http-equiv=”refresh” content=”10″ />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.css">
		
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/transaccionesofic.css">
	    
	    <script src="js/mostrarsolicitud.js"></script>
		<script src="js/mostrar.js"></script>
		<script src="js/calcular.js"></script>
		<script src="js/calcular1.js"></script>
		<script src="js/calcularofic.js"></script>
		<script src="js/cambiarcampos.js"></script>
		<script src="js/cambiarcampos2.js"></script>
		<script src="js/cambiarcampos3.js"></script>
		
	</head>
<body>
          <div>
        
            <h4>Bienvenidos <?php echo $_SESSION['user']; ?></h4>
            
          
         </div>
   
        <div id="enviarp">
            <h4><a href="destroyofic.php">Cerrar Sesion</a></h4> 
        </div>

        <div id="login" >
            <div id="logo">
            <a href="transaccionesofic.php"><img src="img/logo.png"></a>
            </div>
        </div>
        
<div id="form" class=" col-xs-4 col-xs-offset-1">
            <h1>Calculadora de cambios</h1>
            
                <form name="formul">
			 
                    <div id="campos" class="">
                        <label>TASA</label> 
				    	
				    	<input type="text" class="form-control" name="tasacalc" value="<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa2";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?>">
                    </div>
			
								
								<div id="div10" >
									<select id="cambiar" name="cambiar" class="form-control" onChange="pagoOnChange(this)" required>
										<option value="0">Elegir que desea cambiar</option>
										<option value="1">Pesos Chilenos</option>
										<option value="2">Bolivares</option>
										
                                    </select>
									
								</div>
								
								<div id="div0" >
									<input type="text" name="pesos0" class="form-control" placeholder=""  disabled>
								</div>
								<div id="div7">
									<input type="text" name="bolivares0" class="form-control" placeholder="" disabled>
								</div>
								
								<div id="div1">
									<input type="text" name="pesos" class="form-control" placeholder="Pesos Chilenos" >
								</div>
								<div id="div2">
									<input type="text" name="bolivares" class="form-control" placeholder="Bolivares" readonly>
								</div>
								<div id="div4">
									<input  type="text" name="bolivares1" class="form-control" placeholder="Bolivares">
								</div>
								<div id="div3" >
									<input type="text" name="pesos1" class="form-control" placeholder="Pesos chilenos" readonly>
								</div>
								<div id="div5" >
									<a id="botones" class="btn btn-success col-xs-12 success" onclick="calcular();"> Calcular</a> 
								</div>
								<div id="div6" >
									<a id="botones" class="btn btn-success col-xs-11 success" onclick="calcular1();"> Calcular</a> 
								</div>
								
							</form>
						
					<div id="campos" class="col-xs-6" >
    				    <label>Efectivo</label>
		    			<input type="text" class="form-control" name="Efec" value="<?php 
include 'conexion.php';
$saldo_efec = "SELECT saldo_efec FROM saldos1 order by ID desc Limit 1";
$saldo_efec = mysqli_query($conexion,$saldo_efec);
$saldo_efec = mysqli_fetch_array($saldo_efec);
$saldo_efec = $saldo_efec['saldo_efec'];
echo $saldo_efec;

?>" readonly>
	    			</div>
							
							<div id="campos" class="col-xs-6" >
    				    <label>Cuenta RUT</label>
		    			<input type="text" class="form-control" name="CuentaRut" value="<?php 
include 'conexion.php';
$saldo_rut = "SELECT saldo_rut FROM saldos1 order by ID desc Limit 1";
$saldo_rut = mysqli_query($conexion,$saldo_rut);
$saldo_rut = mysqli_fetch_array($saldo_rut);
$saldo_rut = $saldo_rut['saldo_rut'];
echo $saldo_rut;

?>" readonly>
	    			</div>
                        <div id="campos" class="col-xs-6" >
    				    <label>Cuenta Vista</label>
		    			<input type="text" class="form-control" name="CuentaVista" value= "<?php 
include 'conexion.php';
$saldo_vista = "SELECT saldo_vista FROM saldos1 order by ID desc Limit 1";
$saldo_vista = mysqli_query($conexion,$saldo_vista);
$saldo_vista = mysqli_fetch_array($saldo_vista);
$saldo_vista = $saldo_vista['saldo_vista'];
echo $saldo_vista;

?>" readonly>
		    		
		    		</div>





                    <div id="campos" class="col-xs-6">
				        <label>Cuenta Ahorros</label>
    					<input type="text" class="form-control" name="CuentaAhorros" value="<?php 
include 'conexion.php';
$saldo_ahorro = "SELECT saldo_ahorro FROM saldos1 order by ID desc Limit 1";
$saldo_ahorro = mysqli_query($conexion,$saldo_ahorro);
$saldo_ahorro = mysqli_fetch_array($saldo_ahorro);
$saldo_ahorro = $saldo_ahorro['saldo_ahorro'];
echo $saldo_ahorro;

?>" readonly>

</div>
<div id="campos" class="col-xs-6">
				        <label>Saldo Necesario</label>
    					<input type="text" class="form-control" name="Saldo Necesario" value= "<?php 
include 'conexion.php';
$saldo_necesario = "SELECT SUM(Cantidad_bs) FROM transacciones1 WHERE estatus = 'Pendiente' OR estatus='NR'";
$saldo_necesario = mysqli_query($conexion,$saldo_necesario);
$saldo_necesario = mysqli_fetch_array($saldo_necesario);
$saldo_necesario = $saldo_necesario['SUM(Cantidad_bs)'];
echo $saldo_necesario;

?>" readonly>
    				</div>
    				
<div id="campos" class="col-xs-6">
				        <label>Total Pesos del día</label>
    					<input type="text" class="form-control" name="PesosDia" value= "<?php 
include 'conexion.php';
$saldo = "SELECT SUM(Cantidad_pesos) FROM transacciones1 WHERE DATE(Fecha) like '%$current_date%'";
$saldo1 = "SELECT SUM(Diferencia) FROM transacciones1 WHERE DATE(Fecha) like '%$current_date%'";
$saldo = mysqli_query($conexion,$saldo);
$saldo1 = mysqli_query($conexion,$saldo1);
$saldo = mysqli_fetch_array($saldo);
$saldo1 = mysqli_fetch_array($saldo1);
$saldo = $saldo['SUM(Cantidad_pesos)'];
$saldo1 = $saldo1['SUM(Diferencia)'];
echo $saldo+$saldo1;

?>" readonly >
    				</div>
    				
     				<div id="campos" class="col-xs-6" >
    				    <label>Banesco Juridica</label>
		    			<input type="text" class="form-control" name="BanescoJuridica" value="<?php 
include 'conexion.php';
$saldo_banesco_juridica = "SELECT saldo_banesco_juridica FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_juridica = mysqli_query($conexion,$saldo_banesco_juridica);
$saldo_banesco_juridica = mysqli_fetch_array($saldo_banesco_juridica);
$saldo_banesco_juridica = $saldo_banesco_juridica['saldo_banesco_juridica'];
echo $saldo_banesco_juridica;

?>" readonly>
	    			</div>
	    			
	    			<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Juridica</label>
		    			<input type="text" class="form-control" name="BanescoJuridica" value="<?php 
include 'conexion.php';
$disp_banesco_juridica = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Juridica' AND DATE(Fecha) like '%$current_date%'";
$debito_juridica_otro = "SELECT SUM(abono_banesco_juridica) FROM saldos1 WHERE b7='1' AND DATE(Fecha) like '%$current_date%'";
$debito_juridica_otro = mysqli_query($conexion,$debito_juridica_otro);
$debito_juridica_otro = mysqli_fetch_array($debito_juridica_otro);
$disp_banesco_juridica = mysqli_query($conexion,$disp_banesco_juridica);
$disp_banesco_juridica = mysqli_fetch_array($disp_banesco_juridica);
$disp_banesco_juridica = $saldo_banesco_juridica + $disp_banesco_juridica['SUM(Bolivares_com)']-$debito_juridica_otro['SUM(abono_banesco_juridica)'];
echo $disp_banesco_juridica;

?>" readonly>
	    			</div>
	    			<div id="campos" class="col-xs-6" >
    				    <label>Banesco Carlos</label>
		    			<input type="text" class="form-control" name="BanescoCarlos" value="<?php 
include 'conexion.php';
$saldo_banesco_carlos = "SELECT saldo_banesco_carlos FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_carlos = mysqli_query($conexion,$saldo_banesco_carlos);
$saldo_banesco_carlos = mysqli_fetch_array($saldo_banesco_carlos);
$saldo_banesco_carlos = $saldo_banesco_carlos['saldo_banesco_carlos'];
echo $saldo_banesco_carlos;

?>" readonly>
	    			</div>
	    			
<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Carlos</label>
		    			<input type="text" class="form-control" name="BanescoCarlos" value="<?php 
include 'conexion.php';
$disp_banesco_carlos = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Carlos' AND DATE(Fecha) like '%$current_date%'";
$debito_carlos_otro = "SELECT SUM(abono_banesco_carlos) FROM saldos1 WHERE b4='1' AND DATE(Fecha) like '%$current_date%'";
$debito_carlos_otro = mysqli_query($conexion,$debito_carlos_otro);
$debito_carlos_otro = mysqli_fetch_array($debito_carlos_otro);
$disp_banesco_carlos = mysqli_query($conexion,$disp_banesco_carlos);
$disp_banesco_carlos = mysqli_fetch_array($disp_banesco_carlos);
$disp_banesco_carlos = $saldo_banesco_carlos + $disp_banesco_carlos['SUM(Bolivares_com)']-$debito_carlos_otro['SUM(abono_banesco_carlos)'];
echo $disp_banesco_carlos;

?>" readonly>
</div>


    				<div id="campos" class="col-xs-6">
				        <label>Banesco Carlos Papa</label>
    					<input type="text" class="form-control" name="BanescoCarlosPapa" value= "<?php 
include 'conexion.php';
$saldo_banesco_carlos_papa = "SELECT saldo_banesco_carlos_papa FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_carlos_papa = mysqli_query($conexion,$saldo_banesco_carlos_papa);
$saldo_banesco_carlos_papa = mysqli_fetch_array($saldo_banesco_carlos_papa);
$saldo_banesco_carlos_papa = $saldo_banesco_carlos_papa['saldo_banesco_carlos_papa'];
echo $saldo_banesco_carlos_papa;

?>" readonly>
    				</div>
 			
            	<div id="campos" class="col-xs-6">
				        <label> Disp Banesco Carlos Papa</label>
    					<input type="text" class="form-control" name="MercantilJuridica" value= "<?php 
include 'conexion.php';
$disp_banesco_carlos_papa = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Carlos Papa' AND DATE(Fecha) like '%$current_date%'";
$debito_carlosp_otro = "SELECT SUM(abono_banesco_carlos_papa) FROM saldos1 WHERE b8='1' AND DATE(Fecha) like '%$current_date%'";
$debito_carlosp_otro = mysqli_query($conexion,$debito_carlosp_otro);
$debito_carlosp_otro = mysqli_fetch_array($debito_carlosp_otro);
$disp_banesco_carlos_papa = mysqli_query($conexion,$disp_banesco_carlos_papa);
$disp_banesco_carlos_papa = mysqli_fetch_array($disp_banesco_carlos_papa);
$disp_banesco_carlos_papa = $saldo_baneso_carlos_papa + $disp_banesco_carlos_papa['SUM(Bolivares_com)']-$debito_carlosp_otro['SUM(abono_banesco_carlos_papa)'];
echo $disp_banesco_carlos_papa;

?>" readonly>
	    			</div>
	    			
                    <div id="campos" class="col-xs-6">
				        <label>Banesco Marola</label>
    					<input type="text" class="form-control" name="BanescoMarola" value="<?php 
include 'conexion.php';
$saldo_banesco_marola = "SELECT saldo_banesco_marola FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_marola = mysqli_query($conexion,$saldo_banesco_marola);
$saldo_banesco_marola = mysqli_fetch_array($saldo_banesco_marola);
$saldo_banesco_marola = $saldo_banesco_marola['saldo_banesco_marola'];
echo $saldo_banesco_marola;

?>" readonly>
    				</div>
    				
    
                    <div id="campos" class="col-xs-6">
				        <label>Disp Banesco Marola</label>
    					<input type="text" class="form-control" name="BanescoMarola" value="<?php 
include 'conexion.php';
$disp_banesco_marola = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Marola' AND DATE(Fecha) like '%$current_date%'";
$debito_marola_otro = "SELECT SUM(abono_banesco_marola) FROM saldos1 WHERE b5='1' AND DATE(Fecha) like '%$current_date%'";
$debito_marola_otro = mysqli_query($conexion,$debito_marola_otro);
$debito_marola_otro = mysqli_fetch_array($debito_marola_otro);
$disp_banesco_marola = mysqli_query($conexion,$disp_banesco_marola);
$disp_banesco_marola = mysqli_fetch_array($disp_banesco_marola);
$disp_banesco_marola = $saldo_banesco_marola + $disp_banesco_marola['SUM(Bolivares_com)']-$debito_marola_otro['SUM(abono_banesco_marola)'];
echo $disp_banesco_marola;

?>" readonly>
    				</div>
    				<div id="campos" class="col-xs-6" >
    				    <label>Banesco Sonalys</label>
		    			<input type="text" class="form-control" name="BanescoSonalys" value="<?php 
include 'conexion.php';
$saldo_banesco_sonalys = "SELECT saldo_banesco_sonalys FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_sonalys = mysqli_query($conexion,$saldo_banesco_sonalys);
$saldo_banesco_sonalys = mysqli_fetch_array($saldo_banesco_sonalys);
$saldo_banesco_sonalys = $saldo_banesco_sonalys['saldo_banesco_sonalys'];
echo $saldo_banesco_sonalys;

?>" readonly>
	    			</div>
    				<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Sonalys</label>
		    			<input type="text" class="form-control" name="BanescoSonalys" value="<?php 
include 'conexion.php';
$disp_banesco_sonalys = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Sonalys' AND DATE(Fecha) like '%$current_date%'";
$debito_sonalys_otro = "SELECT SUM(abono_banesco_sonalys) FROM saldos1 WHERE b6='1' AND DATE(Fecha) like '%$current_date%'";
$debito_sonalys_otro = mysqli_query($conexion,$debito_sonalys_otro);
$debito_sonalys_otro = mysqli_fetch_array($debito_sonalys_otro);
$disp_banesco_sonalys = mysqli_query($conexion,$disp_banesco_sonalys);
$disp_banesco_sonalys = mysqli_fetch_array($disp_banesco_sonalys);
$disp_banesco_sonalys = $saldo_banesco_sonalys + $disp_banesco_sonalys['SUM(Bolivares_com)']-$debito_sonalys_otro['SUM(abono_banesco_sonalys)'];
echo $disp_banesco_sonalys;

?>" readonly>
	    			</div>
                        <div id="campos" class="col-xs-6" >
    				    <label>Mercantil Carlos</label>
		    			<input type="text" class="form-control" name="MercantilCarlos" value= "<?php 
include 'conexion.php';
$saldo_mercantil_carlos = "SELECT saldo_mercantil_carlos FROM saldos1 order by ID desc Limit 1";
$saldo_mercantil_carlos = mysqli_query($conexion,$saldo_mercantil_carlos);
$saldo_mercantil_carlos = mysqli_fetch_array($saldo_mercantil_carlos);
$saldo_mercantil_carlos = $saldo_mercantil_carlos['saldo_mercantil_carlos'];
echo $saldo_mercantil_carlos;

?>" readonly>
	    			</div>
	    			
<div id="campos" class="col-xs-6" >
    				    <label> Disp Mercantil Carlos</label>
		    			<input type="text" class="form-control" name="MercantilCarlos" value= "<?php 
include 'conexion.php';
$disp_mercantil_carlos = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banco Mercantil' AND Transferimos_desde= 'Mercantil Carlos' AND DATE(Fecha) like '%$current_date%'";
$debito_mcarlos_otro = "SELECT SUM(abono_mercantil_carlos) FROM saldos1 WHERE b2='1' AND DATE(Fecha) like '%$current_date%'";
$debito_mcarlos_otro = mysqli_query($conexion,$debito_mcarlos_otro);
$debito_mcarlos_otro = mysqli_fetch_array($debito_mcarlos_otro);
$disp_mercantil_carlos = mysqli_query($conexion,$disp_mercantil_carlos);
$disp_mercantil_carlos = mysqli_fetch_array($disp_mercantil_carlos);
$disp_mercantil_carlos = $saldo_mercantil_carlos + $disp_mercantil_carlos['SUM(Bolivares_com)']-$debito_mcarlos_otro['SUM(abono_mercantil_carlos)'];
echo $disp_mercantil_carlos;

?>" readonly>
	    			</div>
	    			
                    <div id="campos" class="col-xs-6">
				        <label>Mercantil Mariana</label>
    					<input type="text" class="form-control" name="MercantilMariana" value= "<?php 
include 'conexion.php';
$saldo_mercantil_mariana = "SELECT saldo_mercantil_mariana FROM saldos1 order by ID desc Limit 1";
$saldo_mercantil_mariana = mysqli_query($conexion,$saldo_mercantil_mariana);
$saldo_mercantil_mariana = mysqli_fetch_array($saldo_mercantil_mariana);
$saldo_mercantil_mariana = $saldo_mercantil_mariana['saldo_mercantil_mariana'];
echo $saldo_mercantil_mariana;

?>" readonly>
    				</div>
    				<div id="campos" class="col-xs-6">
				        <label> Disp Mercantil Mariana</label>
    					<input type="text" class="form-control" name="MercantilMariana" value= "<?php 
include 'conexion.php';
$disp_mercantil_mariana = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banco Mercantil' AND Transferimos_desde= 'Mercantil Mariana' AND DATE(Fecha) like '%$current_date%'";
$debito_mariana_otro = "SELECT SUM(abono_mercantil_mariana) FROM saldos1 WHERE b1='1' AND DATE(Fecha) like '%$current_date%'";
$debito_mariana_otro = mysqli_query($conexion,$debito_mariana_otro);
$debito_mariana_otro = mysqli_fetch_array($debito_mariana_otro);
$disp_mercantil_mariana = mysqli_query($conexion,$disp_mercantil_mariana);
$disp_mercantil_mariana = mysqli_fetch_array($disp_mercantil_mariana);
$disp_mercantil_mariana = $saldo_mercantil_mariana + $disp_mercantil_mariana['SUM(Bolivares_com)']-$debito_mariana_otro['SUM(abono_mercantil_mariana)'];
echo $disp_mercantil_mariana;

?>" readonly>
    				</div>

    				<div id="campos" class="col-xs-6">
				        <label>Mercantil Juridica</label>
    					<input type="text" class="form-control" name="MercantilJuridica" value= "<?php 
include 'conexion.php';
$saldo_mercantil_juridica = "SELECT saldo_mercantil_juridica FROM saldos1 order by ID desc Limit 1";
$saldo_mercantil_juridica = mysqli_query($conexion,$saldo_mercantil_juridica);
$saldo_mercantil_juridica = mysqli_fetch_array($saldo_mercantil_juridica);
$saldo_mercantil_juridica = $saldo_mercantil_juridica['saldo_mercantil_juridica'];
echo $saldo_mercantil_juridica;

?>" readonly>
    				</div>
 					
    				
    				
	    			

                        
                        				<div id="campos" class="col-xs-6">
				        <label> Disp Mercantil Juridica</label>
    					<input type="text" class="form-control" name="MercantilJuridica" value= "<?php 
include 'conexion.php';
$disp_mercantil_juridica = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banco Mercantil' AND Transferimos_desde= 'Mercantil Juridica' AND DATE(Fecha) like '%$current_date%'";
$debito_mjuridica_otro = "SELECT SUM(abono_mercantil_juridica) FROM saldos1 WHERE b3='1' AND DATE(Fecha) like '%$current_date%'";
$debito_mjuridica_otro = mysqli_query($conexion,$debito_mjuridica_otro);
$debito_mjuridica_otro = mysqli_fetch_array($debito_mjuridica_otro);
$disp_mercantil_juridica = mysqli_query($conexion,$disp_mercantil_juridica);
$disp_mercantil_juridica = mysqli_fetch_array($disp_mercantil_juridica);
$disp_mercantil_juridica = $saldo_mercantil_juridica + $disp_mercantil_juridica['SUM(Bolivares_com)']-$debito_mjuridica_otro['SUM(abono_mercantil_juridica)'];
echo $disp_mercantil_juridica;

?>" readonly>
                          
					
					
                
               
           
            
        </div>
        
    				

    				</div>		


        
        
        <div id="form2" class=" col-xs-4 col-xs-offset-1">
            <h1>Ingrese Datos del cliente</h1>
            
            <form name="formul3" method="POST" action="buscarDatos.php">
            
            <div id="campos" class="">
                        <label>Dato Clave</label> 
				    	<input type="text" class="form-control" name="rut" required>
                    
            </div>
            
            <div id="enviarp" method="post" class="">
    		    	<button id="botones" class="form-control" >Buscar</button> 
            </div>
            
            </form>
            
            
                <form name="formul0" method="POST" enctype="multipart/form-data" action="guardarDatosOfic.php">
                
                    <div id="campos" class="">
                        <label>TASA</label> 
				    	
				    	<input type="text" class="form-control" name="tasa" value="<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa2";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?>" readonly>
                    </div>
                    
                      <div id="campos" class="">
                        <label>TASA ESPECIAL</label> 
				    	
				    	<input type="text" class="form-control" name="tasaesp" value="<?php
include 'conexion.php';
$tasa1 = "SELECT Tasa FROM Tasa3";
$tasa1 = mysqli_query($conexion,$tasa1);
$tasa1 = mysqli_fetch_array($tasa1);
$tasa1 = $tasa1['Tasa'];

echo $tasa1;

?>" readonly>
                    </div>
                    <div id="campos" class="">
				        <label>Transferencia</label>
			   	       <select id="Transferencia" name="transf"  class="form-control" onchange ="cambiarcampos2(this)" >
				            <option value="Pendiente">Pendiente</option>
				            <!-- <option value="Inmediata">Inmediata</option>-->
				            <option value="NR">No Reportado</option>
					   </select>
          	        </div>
                    <div id="" class="">
		    		   <label>Forma de pago</label> 
                       <select id="FormaPago" name="formaPago" class="form-control" onchange="cambiarcampos11(this)">
				           <option  value="">Seleccionar</option>
					       <option  value="Efectivo">Efectivo</option>
                           <option  value="DepositoRut">Deposito a Cuenta Rut</option>
                           <option  value="DepositoVista">Deposito a Cuenta Vista</option>
                           <option  value="DepositoAhorro">Deposito a Cuenta Ahorro</option>
                        </select>
				    </div>
                    
                    <div id="cliente1" class="">
                        <label>Cliente</label> 
				    	<input type="text" class="form-control" name="cliente"  autofocus>
                    </div>
                    
                    <div id="rut1" class="">
                        <label>RUT, Pasaporte o Cedula</label> 
				    	<input type="text" class="form-control" name="rut" >
                    </div>
                    
				    <div id="comprobante1" class="">
                        <label>Numero de Comprobante</label> 
				    	<input id="comprobante" type="text" class="form-control" name="comprobante">
                    </div>
                        
                    <div id="Nombre1" class="">
                        <label>Nombre y Apellido o Razón Social</label> 
				    	<input type="text" class="form-control" name="nombre" required >
                    </div>
                    <div id="Cedula1" class="">
				        <label>Cedula de Identidad</label>
			   	       <select id="nacionalidad" name="tipodoc" class="form-control"required>
				            <option value=""></option>
					        <option value="V">V</option>
                            <option value="E">E</option>            
                            <option value="J">J</option>
					    </select>
          	          <input id="cedula" type="text" class="form-control" name="iddoc"  required>
				    </div>
				    
				    
                    <div id="Bancob" class="">
		    		   <label>Banco del Beneficiario</label> 
                       <select id="cambiar" name="banco" class="form-control" onchange="cambiarcampos1(this)" required>
				           <option value="">Seleccionar</option>
				            <option value="Banesco">Banesco</option>
                            <option value="Banco Mercantil">Banco Mercantil</option>            
                            <option value="100% BANCO">100% BANCO</option>	
                            <option value="ABN AMRO BANK">ABN AMRO BANK</option>
                            <option value="BANCAMIGA BANCO MICROFINANCIERO, C.A.">BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
                            <option value="BANCO ACTIVO BANCO COMERCIAL, C.A.">BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
                            <option value="BANCO AGRICOLA">BANCO AGRICOLA</option>
                            <option value="BANCO BICENTENARIO">BANCO BICENTENARIO </option>
                            <option value="BANCO CARONI, c.A. BANCO UNIVERSAL">BANCO CARONI, c.A. BANCO UNIVERSAL</option>
                            <option value="BANCO CENTRAL DE VENEZUELA">BANCO CENTRAL DE VENEZUELA</option>
                            <option value="BANCO DE DESARROLLO DEL MICROEMPRESARIO">BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
                            <option value="BANCO DE VENEZUELA S.A.I.C.A.">BANCO DE VENEZUELA S.A.I.C.A.</option>
                            <option value="BANCO DEL CARIBE C.A.">BANCO DEL CARIBE C.A.</option>
                            <option value="BANCO DEL PUEBLO SOBERANO C.A.">BANCO DEL PUEBLO SOBERANO C.A.</option>
                            <option value="BANCO DEL TESORO">BANCO DEL TESORO </option>
                            <option value="BANCO ESPIRITO SANTO S.A.">BANCO ESPIRITO SANTO S.A.</option>
                            <option value="BANCO EXTERIOR C.A.">BANCO EXTERIOR C.A.</option>
                            <option value="BANCO INTERNACIONAL DE DESARROLLO, C.A.">BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
                            <option value="BANCO MERCANTIL C.A.">BANCO MERCANTIL C.A.</option>
                            <option value="BANCO NACIONAL DE CREDITO ">BANCO NACIONAL DE CREDITO </option>
                            <option value="BANCO OCCINDENTAL DE DESCUENTO ">BANCO OCCINDENTAL DE DESCUENTO </option>
                            <option value="BANCO PLAZA">BANCO PLAZA</option>
                            <option value="BANCO PROVINCIAL BBVA">BANCO PROVINCIAL BBVA</option>
                            <option value="BANCO VENEZOLANO DE CREDITO S.A.">BANCO VENEZOLANO DE CREDITO S.A.</option>
                            <option value="BANCRECER S.A. BANCO DE DESARROLLO">BANCRECER S.A. BANCO DE DESARROLLO</option>
                            <option value="BANESCO">BANESCO</option>
                            <option value="BANFANB">BANFANB</option>
                            <option value="BANGENTE">BANGENTE </option>
                            <option value="BANPLUS BANCO COMERCIAL C.A.">BANPLUS BANCO COMERCIAL C.A.</option>
                            <option value="CITIBANK">CITIBANK</option>
                            <option value="DELSUR BANCO UNIVERSAL">DELSUR BANCO UNIVERSAL</option> 
                            <option value="FONDOCOMUN">FONDOCOMUN</option>
                            <option value="INSTITUO MUNICIPAL DE CREDITO POPULAR">INSTITUO MUNICIPAL DE CREDITO POPULAR</option>
                            <option value="MIBANCO BANCO DE DESARROLLO, C.A.">MIBANCO BANCO DE DESARROLLO, C.A.</option>
                            <option value="SOFITASA">SOFITASA</option>
					    </select>
				    </div>
                    <div id="Cuenta1" class="">
				        <label>Numero de Cuenta Bancaria</label>
				    	<input type="text" class="form-control" name="cuenta" minlength=20 maxlength=20 required>
				    </div>
				   
    				    <div id="campos" class="" >
        				    <label>Total de pesos depositados</label>
    		    			<input type="number" class="form-control" name="totalpesos" onchange="calcularofic()" required>
    	    			</div>
    				   
    				    <div id="campos" class="" >
        				    <label>Cantidad de Pesos a Enviar</label>
    		    			<input type="number" class="form-control" name="pesos2" onchange="calcularofic()" required>
    	    			</div>
                        
                        <div id="campos" class="" >
        				    <label>Cantidad de Bs. a Recibir</label>
    		    			<input type="number"  class="form-control" name="bolivares2" readonly required>
    	    			</div>
				   
				    <!--
				    <div id="bancosOrg" class="">
		    		   <label>Transferimos desde banco</label> 
                       <select id="bancosOrigen" name="bancoOrigen" class="form-control" onchange="cambiarcampos(this)" >
				           <option  value="">Seleccionar</option>
					       <option  value="Banesco">Banesco</option>
                           <option  value="Banco Mercantil">Mercantil</option>            
                        </select>
				    </div>
				    
				    <div id="cuentasOrg" class="">
		    		   <label>Cuenta de</label> 
                       <select id="cuentasOrigen" name="cuentaOrigen" class="form-control">
				            <option value="">Seleccionar</option>
					        <optgroup id="banescoCuentas" label="Cuentas Banesco">
                                <option value="Banesco Carlos">Banesco Carlos</option>
                                <option value="Banesco Marola">Banesco Marola</option>
                                <option value="Banesco Sonalys">Banesco Sonalys</option>
                                <option value="Banesco Juridica">Banesco Juridica</option>
                              </optgroup>
                              <optgroup id="mercantilCuentas" label="Cuentas Mercantil">
                                <option value="Mercantil Mariana">Mercantil Mariana</option>
                                <option value="Mercantil Carlos">Mercantil Carlos</option>
                                <option value="Mercantil Juridica">Mercantil Juridica</option>
                              </optgroup>
                        </select>
				    </div>-->
                   
                    <div id="email1" class="">
				        <label>Email de Quien Envía</label>
    					<input type="Email" class="form-control" name="email">
    				</div>
                    <div id="telefono1" class="">
				        <label>Teléfono de Quien Envía</label>
    					<input type="text" class="form-control" name="telefono">
    				</div>
    				 
    				 <!--<div id="campos" class="">
				        <label>Numero de comprobante</label>
    					<input type="text" name="comprobante"class="form-control" name="telefono">
    				</div>-->
    				
    			<!--	<div id="campos" class="">
				        <label>Añadir Boleta</label>
    					<input type="file" name="attachment" class="form-control" name="telefono">
    				</div>-->
    				
                    <div id="enviarp" method="post" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

        </div>
        
   
   
        <div id="form2" class=" col-xs-12">
        
            <h1>Transferencias pendientes</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>ID</th>
		    <th>Cliente</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Banco</th>
			<th>Numero de Cuenta</th>
			<th>Total Pesos</th>
			<th>Pesos</th>
			<th>Bolivares</th>
			<th>Transferimos desde</th>
			<th>Cuenta de</th>
			<th>Estatus</th>
			<th>Enviar</th>
			

			
		</tr>
		</thead>
		
		<?php
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $insertar= "SELECT ID, cliente, Nombre_apellido, Cedula, Cuenta_destino, Numero_cuenta, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus FROM transacciones1 WHERE estatus = 'Pendiente' ORDER BY ID";
      
      
            $result = mysqli_query($conexion,$insertar);


        		
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="POST" action="guardarDatosOfic1.php">
                
        	<tr>
        	
        	<td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="ids" value="<?php echo $ids=$row['ID']; ?>"  readonly required>
				</div></td>
            <td><?php echo $row['cliente'] ?></td>
        	<td><?php echo $row['Nombre_apellido'] ?></td>
            <td><?php echo $row['Cedula'] ?></td>
            <td><?php echo $row['Cuenta_destino'] ?></td>
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="numCuenta" value= "<?php echo $row['Numero_cuenta'] ?>" readonly >
	    		</div></td>
	    		<td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="totalpesos" value="<?php echo $row['Total_pesos'] ?>"  readonly required>
	    			</div></td>
	    		
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="pesos" value="<?php echo $pesos=$row['Cantidad_pesos'] ?>"  readonly required>
	    			</div></td>
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="bs" value= "<?php
    		$bs=$row['Cantidad_bs'];
    				    if($pesos==$bs){
    				        if($pesos>=90000){
	                            include 'conexion.php';
                                $tasa2 = "SELECT Tasa FROM Tasa2";
                                $tasa2 = mysqli_query($conexion,$tasa2);
                                $tasa2 = mysqli_fetch_array($tasa2);
                                $tasa2 = $tasa2['Tasa'];
    		                    echo $bs=$bs*$tasa2;
    		                }else{
    		                    include 'conexion.php';
                                $tasa2 = "SELECT Tasa FROM Tasa3";
                                $tasa2 = mysqli_query($conexion,$tasa2);
                                $tasa2 = mysqli_fetch_array($tasa2);
                                $tasa2 = $tasa2['Tasa'];
    		                    echo $bs=$bs*$tasa2;
    		                }
    		                $actualizar= "UPDATE transacciones1 SET tasa='$tasa2', Cantidad_bs = '$bs' WHERE ID = '$ids'";
    		                $tasa2 = mysqli_query($conexion,$actualizar);		        
    				    }else{
    		                echo $bs;
    				    };
    		?>" readonly required>
	    	</div></td>
            
            <td><div id="" class="">
		    		 
		    		 <select id="bancosOrigen2" name="bancoOrg" class="form-control" onchange="cambiarcampos3(this)" required>
				           <option  value="">Seleccionar</option>
					       <option  value="Banesco">Banesco</option>
                           <option  value="Banco Mercantil">Mercantil</option>            
                        </select>
				    </div>
				    
				   
                   </td>
                <td> <div id="" class="">
		    		    
                       <select id="cuentasOrigen2" name="cuentaOrg" class="form-control" required>
				            <option value="">Seleccionar</option>
					        <optgroup id="banescoCuentas1" label="Cuentas Banesco">
                                <option value="Banesco Carlos">Banesco Carlos</option>
                                <option value="Banesco Carlos">Banesco Carlos Papa</option>
                                <option value="Banesco Marola">Banesco Marola</option>
                                <option value="Banesco Sonalys">Banesco Sonalys</option>
                                <option value="Banesco Juridica">Banesco Juridica</option>
                              </optgroup>
                              <optgroup id="mercantilCuentas1" label="Cuentas Mercantil">
                                <option value="Mercantil Mariana">Mercantil Mariana</option>
                                <option value="Mercantil Carlos">Mercantil Carlos</option>
                                <option value="Mercantil Juridica">Mercantil Juridica</option>
                              </optgroup>
                        </select>
				    </div>
				</td>
				<td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="transf" value="<?php echo $row['estatus'] ?>" readonly>
	    			</div></td>
                <td><div id="enviarp" method="post" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                </td>

            </form>
            </tr>
 <?php } ?>


</table>

		
		
		
		</div>
		
		
		
        <div id="form2" class=" col-xs-12">
        
            <h1>No reportados</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>ID</th>
		    <th>Tasa</th>
		    <th>Cliente</th>
		    <th>Rut</th>
			<th>Numero de comprobante</th>
			<th>Tipo de Transferencia</th>
			<th>Total Pesos</th>
			<th>Pesos</th>
			<th>Bolivares</th>
			<th>Estatus</th>
			<th>Enviar</th>
			
		</tr>
		</thead>
		
		<?php
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $insertar= "SELECT ID, tasa, cliente, rut, comprobante, Forma_pago, Total_pesos, Cantidad_pesos, Cantidad_bs, estatus FROM transacciones1 WHERE estatus = 'NR' ORDER BY ID";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);

		while ($row = mysqli_fetch_array($result)){?>
        	
            <form name="formul3" method="POST" action="enviarnoreport.php">
                
            <tr>


        	<td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="ids" value= "<?php echo $ids=$row['ID']; ?>" readonly>
	    	</div></td>
            <td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="tasa" value= "<?php echo $row['tasa']; ?>"   required>
	    	</div></td>
	    	<td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="cliente" value= "<?php echo $row['cliente']; ?>" readonly>
	    	</div></td>
	    	<td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="rut" value= "<?php echo $row['rut']; ?>" readonly>
	    	</div></td>
            <td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="comprobante" value= "<?php echo $row['comprobante']; ?>" required>
	    	</div></td>        

            <td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="formaPago" value= "<?php echo $row['Forma_pago']; ?>" readonly>
	    	</div></td>
            
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="totalpesos" value="<?php echo $totalp=$row['Total_pesos'] ?>"  readonly required>
	    	</div></td>
            
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="pesos1" value="<?php 
                        $pesos= $row['Cantidad_pesos'];
                        if($pesos == 0 )
    				    echo $totalp;
    				    else
    				    echo $pesos ?>"  readonly required>
	    	</div></td>
	    	
            <td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="bs1" value= "<?php
    		$bs=$row['Cantidad_bs'];
    				    if($pesos==$bs){
    				        if($pesos>=90000){
	                            include 'conexion.php';
                                $tasa2 = "SELECT Tasa FROM Tasa3";
                                $tasa2 = mysqli_query($conexion,$tasa2);
                                $tasa2 = mysqli_fetch_array($tasa2);
                                $tasa2 = $tasa2['Tasa'];
    		                    echo $bs=$bs*$tasa2;
    		                }else{
    		                    include 'conexion.php';
                                $tasa2 = "SELECT Tasa FROM Tasa2";
                                $tasa2 = mysqli_query($conexion,$tasa2);
                                $tasa2 = mysqli_fetch_array($tasa2);
                                $tasa2 = $tasa2['Tasa'];
    		                    echo $bs=$bs*$tasa2;
    		                }
    		                $actualizar= "UPDATE transacciones1 SET tasa='$tasa2', Cantidad_bs = '$bs' WHERE ID = '$ids'";
    		                $tasa2 = mysqli_query($conexion,$actualizar);		        
    				    }else{
    		                echo $bs;
    				    };
    				    ?>" readonly required>
	    	</div></td>
            
            				<td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="transf" value="<?php echo $row['estatus'] ?>" readonly>
	    			</div></td>
                <td><div id="enviarp" method="post" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                </td>

            </form>
            </tr>
 <?php } ?>


</table>

		
		
		
		</div>
   
   
   
   
   
   
        
        <div id="form" class=" col-xs-4 col-xs-offset-0">
            <h1>Saldos Iniciales Cuentas Chile</h1>
            
                <form name="formul1" method="post" action="saldosiniciales.php">
                
                    <div id="campos" class="">
                        <label>Efectivo</label> 
				    	<input type="text" class="form-control" name="inicial_efec">
                    </div>    
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="inicial_rut">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="inicial_vista">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="inicial_ahorro">
                    </div>
                    
                    <h1>Saldos Iniciales Cuentas Venezuela</h1>
                
                        
                    <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="inicial_mercantil_mariana">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="inicial_mercantil_carlos">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="inicial_mercantil_juridica">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="inicial_banesco_carlos">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos Papa</label> 
				    	<input type="text" class="form-control" name="inicial_banesco_carlos_papa">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="inicial_banesco_marola">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="inicial_banesco_sonalys">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="inicial_banesco_juridica">
                    </div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Abonos Cuentas Chile</h1>
            
                <form name="formul2" method="post" action="abonos.php">
                    <div id="campos" class="">
                        <label>Efectivo</label> 
				    	<input type="text" class="form-control" name="abono_efec">
                    </div>
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="abono_rut">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="abono_vista">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="abono_ahorro">
                    </div>   
                    
            <h1>Abonos Cuentas Venezuela</h1>

                    <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="abono_mercantil_mariana">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="abono_mercantil_carlos">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="abono_mercantil_juridica">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="abono_banesco_carlos">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos Papa</label> 
				    	<input type="text" class="form-control" name="abono_banesco_carlos_papa">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="abono_banesco_marola">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="abono_banesco_sonalys">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="abono_banesco_juridica">
                    </div>
                    <div id="commentario" class="">
                        <label>Comentario</label> 
				    	<input type="text" class="form-control" name="comentario">
                    </div>                                                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>

                </form>
               <h2>Revise los datos antes de enviar</h2>
    

        </div>            



        <div id="form" class=" col-xs-4">
            <h1>Debitos Cuentas Chile</h1>
            
                <form name="formul3" method="post" action="debitos.php">
                
                    <div id="campos" class="">
                        <label>Efectivo</label> 
				    	<input type="text" class="form-control" name="debito_efec">
                    </div>    
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="debito_rut">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="debito_vista">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="debito_ahorro">
                    </div>                
                    
            
                    <h1>Debitos Cuentas Venezuela</h1>
            
                    <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="debito_mercantil_mariana" onChange="cambiarcampos12(this)">
                    </div>
                    <div id="b1" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b1" class="form-control" >
										<option value="0">Banco Mercantil</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="debito_mercantil_carlos" onChange="cambiarcampos13(this)">
                    </div>
                    <div id="b2" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b2" class="form-control" >
										<option value="0">Banco Mercantil</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="debito_mercantil_juridica" onChange="cambiarcampos6(this)">
                    </div>
                    <div id="b3" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b3" class="form-control" >
										<option value="0">Banco Mercantil</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="debito_banesco_carlos" onChange="cambiarcampos7(this)">
                    </div>
                    <div id="b4" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b4" class="form-control">
										<option value="0">Banesco</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos Papa</label> 
				    	<input type="text" class="form-control" name="debito_banesco_carlos_papa" onChange="cambiarcampos14(this)">
                    </div>
                    <div id="b8" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b8" class="form-control">
										<option value="0">Banesco</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    <div id="campos" class="">
                        <label>Banco Marola</label> 
				    	<input type="text" class="form-control" name="debito_banesco_marola" onChange="cambiarcampos8(this)">
                    </div>
                    <div id="b5">
                    <label>Banco destino</label>
                    <select id="cambiar" name="b5" class="form-control">
										<option value="0">Banesco</option>
										<option value="1">Otro Banco</option>
					</select>
					</div>
                    <div id="campos" class="">
                        <label>Banesco Sonalys</label> 
				    	<input type="text" class="form-control" name="debito_banesco_sonalys" onChange="cambiarcampos9(this)">
                    </div>
                    <div id ="b6">
                    <label>Banco destino</label>
                    <select id="cambiar" name="b6" class="form-control" >
										<option value="0">Banesco</option>
										<option value="1">Otro Banco</option>
					</select>
					</div>
                    <div id="banco7" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="debito_banesco_juridica" onChange="cambiarcampos10(this)">
                    </div>
                    <div id="b7" class="">
                        <label>Banco destino</label>
                        <select id="cambiar" name="b7" class="form-control" >
										<option value="0">Banesco</option>
										<option value="1">Otro Banco</option>
					    </select>
                    </div>
                    
                    <div id="commentario" class="">
                        <label>Comentario</label> 
				    	<input type="text" class="form-control" name="comentario">
                    </div>
                                        
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    
                    </form>
                
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
        </div>
        
        <div id="form2" class=" col-xs-12">
        
            <h1>Transferencias Realizadas</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>ID</th>
		    <th>Cliente</th>
			<th>Forma de Pago</th>
			<th>Cuenta destino</th>
			<th>Cuenta Origen</th>
			<th>Cantidad de Pesos</th>
			<th>Cantidad Bolivares</th>
			<th>Estatus</th>

		</tr>
		</thead>
		
		<?php
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $insertar= "SELECT ID, cliente, Forma_pago, Cuenta_destino, Transferimos_desde, Cantidad_pesos, Cantidad_bs, estatus FROM transacciones1 WHERE DATE(Fecha) like '%$current_date%' AND estatus = 'Realizada' ORDER BY ID";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
        	
            
        	<tr>
        	
        	<td><div id="campos" class="" >
    				    <input type="text" class="form-control" name="ids" value="<?php echo $ids=$row['ID']; ?>"  readonly required>
				</div></td>
			<td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['cliente'] ?></td>
        	<td><?php echo $row['Forma_pago'] ?></td>
        	<td><?php echo $row['Cuenta_destino'] ?></td>
        	<td><?php echo $row['Transferimos_desde'] ?></td>
            <td><?php echo $row['Cantidad_pesos'] ?></td>
            <td><?php echo $row['Cantidad_bs'] ?></td>
            <td><?php echo $row['estatus'] ?></td>
            
            </tr>
 <?php } ?>


</table>

		
		
		
		</div>
   


        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    
   
</body>


</html>