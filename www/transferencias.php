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
		<script src="js/formatNumber.js"></script>
		
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
            <a href="transferencias.php"><img src="img/logo.png"></a>
            </div>
        </div>


         <div id="form2" class=" col-xs-4 col-xs-offset-1">
            <h1>SALDOS</h1>
            
                
			
    				
     				<div id="campos" class="col-xs-6" >
    				    <label>Banesco Juridica 2197</label>
		    			<input id="saldo7" type="text" class="form-control" name="BanescoJuridica" value="<?php 
include 'conexion.php';
$saldo_banesco_juridica = "SELECT saldo_banesco_juridica FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_juridica = mysqli_query($conexion,$saldo_banesco_juridica);
$saldo_banesco_juridica = mysqli_fetch_array($saldo_banesco_juridica);
$saldo_banesco_juridica = $saldo_banesco_juridica['saldo_banesco_juridica'];
echo $saldo_banesco_juridica;

?>" readonly>
	    			</div>
	    			
	    			<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Juridica 2197</label>
		    			<input id="saldo8" type="text" class="form-control" name="BanescoJuridica" value="<?php 
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
    				    <label>Banesco Carlos 2008</label>
		    			<input id="saldo9" type="text" class="form-control" name="BanescoCarlos" value="<?php 
include 'conexion.php';
$saldo_banesco_carlos = "SELECT saldo_banesco_carlos FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_carlos = mysqli_query($conexion,$saldo_banesco_carlos);
$saldo_banesco_carlos = mysqli_fetch_array($saldo_banesco_carlos);
$saldo_banesco_carlos = $saldo_banesco_carlos['saldo_banesco_carlos'];
echo $saldo_banesco_carlos;

?>" readonly>
	    			</div>
	    			
<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Carlos 2008</label>
		    			<input id="saldo10" type="text" class="form-control" name="BanescoCarlos" value="<?php 
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
				        <label>Banesco Carlos Papa 7088</label>
    					<input id="saldo11" type="text" class="form-control" name="BanescoCarlosPapa" value= "<?php 
include 'conexion.php';
$saldo_banesco_carlos_papa = "SELECT saldo_banesco_carlos_papa FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_carlos_papa = mysqli_query($conexion,$saldo_banesco_carlos_papa);
$saldo_banesco_carlos_papa = mysqli_fetch_array($saldo_banesco_carlos_papa);
$saldo_banesco_carlos_papa = $saldo_banesco_carlos_papa['saldo_banesco_carlos_papa'];
echo $saldo_banesco_carlos_papa;

?>" readonly>
    				</div>
 			
            	<div id="campos" class="col-xs-6">
				        <label> Disp Banesco Carlos Papa 7088</label>
    					<input id="saldo12" type="text" class="form-control" name="BanescoCarlosPapa" value= "<?php 
include 'conexion.php';
$disp_banesco_carlos_papa = "SELECT SUM(Bolivares_com) FROM transacciones1 WHERE Cuenta_destino != 'Banesco' AND Transferimos_desde= 'Banesco Carlos Papa' AND DATE(Fecha) like '%$current_date%'";
$debito_carlosp_otro = "SELECT SUM(abono_banesco_carlos_papa) FROM saldos1 WHERE b8='1' AND DATE(Fecha) like '%$current_date%'";
$debito_carlosp_otro = mysqli_query($conexion,$debito_carlosp_otro);
$debito_carlosp_otro = mysqli_fetch_array($debito_carlosp_otro);
$disp_banesco_carlos_papa = mysqli_query($conexion,$disp_banesco_carlos_papa);
$disp_banesco_carlos_papa = mysqli_fetch_array($disp_banesco_carlos_papa);
$disp_banesco_carlos_papa = $saldo_banesco_carlos_papa + $disp_banesco_carlos_papa['SUM(Bolivares_com)']-$debito_carlosp_otro['SUM(abono_banesco_carlos_papa)'];
echo $disp_banesco_carlos_papa;

?>" readonly>
	    			</div>
	    			
                    <div id="campos" class="col-xs-6">
				        <label>Banesco Marola 2176</label>
    					<input id="saldo13" type="text" class="form-control" name="BanescoMarola" value="<?php 
include 'conexion.php';
$saldo_banesco_marola = "SELECT saldo_banesco_marola FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_marola = mysqli_query($conexion,$saldo_banesco_marola);
$saldo_banesco_marola = mysqli_fetch_array($saldo_banesco_marola);
$saldo_banesco_marola = $saldo_banesco_marola['saldo_banesco_marola'];
echo $saldo_banesco_marola;

?>" readonly>
    				</div>
    				
    
                    <div id="campos" class="col-xs-6">
				        <label>Disp Banesco Marola 2176</label>
    					<input id="saldo14" type="text" class="form-control" name="BanescoMarola" onload = "format_number(this.value)" value="<?php 
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
    				    <label>Banesco Sonalys 4568</label>
		    			<input id="saldo15" type="text" class="form-control" name="BanescoSonalys" value="<?php 
include 'conexion.php';
$saldo_banesco_sonalys = "SELECT saldo_banesco_sonalys FROM saldos1 order by ID desc Limit 1";
$saldo_banesco_sonalys = mysqli_query($conexion,$saldo_banesco_sonalys);
$saldo_banesco_sonalys = mysqli_fetch_array($saldo_banesco_sonalys);
$saldo_banesco_sonalys = $saldo_banesco_sonalys['saldo_banesco_sonalys'];
echo $saldo_banesco_sonalys;

?>" readonly>
	    			</div>
    				<div id="campos" class="col-xs-6" >
    				    <label>Disp Banesco Sonalys 4568</label>
		    			<input id="saldo16" type="text" class="form-control" name="BanescoSonalys" value="<?php 
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
		    			<input id="saldo17" type="text" class="form-control" name="MercantilCarlos" value= "<?php 
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
		    			<input id="saldo18" type="text" class="form-control" name="MercantilCarlos" value= "<?php 
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
    					<input id="saldo19" type="text" class="form-control" name="MercantilMariana" value= "<?php 
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
    					<input id="saldo20" type="text" class="form-control" name="MercantilMariana" value= "<?php 
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
    					<input id="saldo21" type="text" class="form-control" name="MercantilJuridica" value= "<?php 
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
    					<input id="saldo22" type="text" class="form-control" name="MercantilJuridica" value= "<?php 
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


        
        <div id="form2" class=" col-xs-12">
        
            <h1>Transferencias pendientes</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>ID</th>
		    <th>Cliente</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Banco Dest</th>
			<th>Num Cuenta</th>
			<th>Bs</th>
			<th>Banco Origen</th>
			<th>Cuenta de</th>
			<th>Estatus</th>
			<th>Enviar</th>
			

			
		</tr>
		</thead>
		
		<?php
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $insertar= "SELECT ID, cliente, Nombre_apellido, Cedula, Cuenta_destino, Numero_cuenta, Cantidad_bs, estatus FROM transacciones1 WHERE estatus = 'Pendiente' AND Forma_pago != 'Efectivo' ORDER BY ID";
      
      
            $result = mysqli_query($conexion,$insertar);


        		
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="get" action="guardarDatosOfic1.php">
                
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
                                <option value="Banesco Carlos Papa">Banesco Carlos Papa</option>
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
                <td><div id="enviarp" method="get" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                </td>

            </form>
            </tr>
 <?php } ?>


</table>

		
		
		
		</div>
		
		



        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
        	
        		/* Without prefix */

	var input = document.getElementById('saldo1').value;
	document.getElementById('saldo1').value =  format_number(input);
	
	var input1 = document.getElementById('saldo2').value;
	document.getElementById('saldo2').value =  format_number(input1);
	
	var input2 = document.getElementById('saldo3').value;
	document.getElementById('saldo3').value =  format_number(input2);
	
	var input3 = document.getElementById('saldo4').value;
	document.getElementById('saldo4').value =  format_number(input3);
	
	var input4 = document.getElementById('saldo5').value;
	document.getElementById('saldo5').value =  format_number(input4);
	
	var input5 = document.getElementById('saldo6').value;
	document.getElementById('saldo6').value =  format_number(input5);
	
	var input6 = document.getElementById('saldo7').value;
	document.getElementById('saldo7').value =  format_number(input6);
	
	var input7 = document.getElementById('saldo8').value;
	document.getElementById('saldo8').value =  format_number(input7);
	
	var input8 = document.getElementById('saldo9').value;
	document.getElementById('saldo9').value =  format_number(input8);
	
	var input9 = document.getElementById('saldo9').value;
	document.getElementById('saldo9').value =  format_number(input9);
	
	var input10 = document.getElementById('saldo10').value;
	document.getElementById('saldo10').value =  format_number(input10);
	
	var input11 = document.getElementById('saldo11').value;
	document.getElementById('saldo11').value =  format_number(input11);
	
	var input12 = document.getElementById('saldo12').value;
	document.getElementById('saldo12').value =  format_number(input12);
	
	var input13 = document.getElementById('saldo13').value;
	document.getElementById('saldo13').value =  format_number(input13);
	
	var input14 = document.getElementById('saldo14').value;
	document.getElementById('saldo14').value =  format_number(input14);
	
	var input15 = document.getElementById('saldo15').value;
	document.getElementById('saldo15').value =  format_number(input15);
	
	var input16 = document.getElementById('saldo16').value;
	document.getElementById('saldo16').value =  format_number(input16);
	
	var input17 = document.getElementById('saldo17').value;
	document.getElementById('saldo17').value =  format_number(input17);
	
	var input18 = document.getElementById('saldo17').value;
	document.getElementById('saldo18').value =  format_number(input18);
	
	var input19 = document.getElementById('saldo19').value;
	document.getElementById('saldo19').value =  format_number(input19);
	
	var input20 = document.getElementById('saldo20').value;
	document.getElementById('saldo20').value =  format_number(input20);
	
	var input21 = document.getElementById('saldo21').value;
	document.getElementById('saldo21').value =  format_number(input21);
	
	var input22 = document.getElementById('saldo22').value;
	document.getElementById('saldo22').value =  format_number(input22);
	
	
	/* Function */
function format_number(number, prefix, thousand_separator, decimal_separator)
	{
		var thousand_separator = thousand_separator || '.',
			decimal_separator = decimal_separator || ',',
			regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
			number_string = number.replace(regex, '').toString(),
			split	  = number_string.split(decimal_separator),
			rest 	  = split[0].length % 3,
			result 	  = split[0].substr(0, rest),
			thousands = split[0].substr(rest).match(/\d{3}/g);
		
		if (thousands) {
			separator = rest ? thousand_separator : '';
			result += separator + thousands.join(thousand_separator);
		}
		result = split[1] != undefined ? result + decimal_separator + split[1] : result;
		return prefix == undefined ? result : (result ? prefix + result : '');
	};

        </script>
    
   
</body>


</html>