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
//
?>

<!doctype html>
<html lang="es">
	<head>
		<title> Aguacatecambios </title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		
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


        

        <div id="form2" class=" col-xs-12">
        
            <h1>Coincidencias</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
			<th>Tasa</th>
			<th>Cliente</th>
			<th>RUT</th>
			<th>Comprobante</th>
			<th>Pago</th>
			<th>Nombre</th>
			<th>Naciona.</th>
			<th>Cedula</th>
			<th>Banco destino</th>
			<th>Num. Cuenta</th>
			<th>Total Deposito</th>
			<th>Pesos</th>
			<th>Bs</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Estatus</th>
			<th>Enviar</th>
			
		</tr>
		</thead>
		
		<?php
		
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $tasa= $_GET['tasa'];
            $ids = $_GET['ids'];
            $comprobante=$_GET['comprobante1'];
            $rut= $_GET['rut'];
            $formaPago=$_GET['formaPago'];
            $totalPesos=$_GET['totalpesos'];
            $pesos=$_GET['pesos3'];
            $bolivares=$_GET['bolivares3'];
            $estatus='Pendiente';
            
            
            $insertar= "SELECT cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Email, Telefono FROM transacciones1 WHERE Numero_cuenta != '' AND rut = '$rut' OR Telefono= '$rut' OR Email= '$rut' OR cliente LIKE '%$rut%' OR Nombre_Apellido LIKE '%$rut%' GROUP BY Numero_cuenta";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="GET" action="guardarDatosOfic2.php">
                
        	    <tr>
        	    	
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="ids" value= "<?php echo $ids; ?>" readonly required>
	    	            </div>
	    	        
                    </td>
                    <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="tasa" value= "<?php echo $tasa; ?>" readonly required>
	    	            </div>
	    	        
                    </td>
                        
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="cliente" value= "<?php echo $row['cliente']; ?>" readonly required>
	    	            </div>
	    	        
                    </td>   
        	        <td>
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="rut" value= "<?php echo $row['rut'] ?>" readonly required>
	    	            </div>
	    	        </td>
	    	                        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="comprobante" value= "<?php echo $comprobante; ?>" readonly required>
	    	            </div>
	    	        
                    </td>
                    
                    <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="formaPago" value= "<?php echo $formaPago; ?>" readonly required>
	    	            </div>
	    	        
                    </td>   
                    
	    	        
	    	        
                    <td>        
                        <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="nombre" value= "<?php echo $row['Nombre_Apellido'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    <td>        
                        <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="tipodoc" value= "<?php echo $row['Tipo_doc'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    
                    <td>
                        <div id="campos" name="id" >
                            <input type="text" class="form-control" name="iddoc" value= "<?php echo $row['Cedula'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    
        	        <td>        
                        <div id="campos" class="" >
    				        <input type="text" class="form-control" name="banco" value= "<?php echo $row['Cuenta_destino'] ?>" readonly required>
	    		        </div>
	    		    </td>
                    <td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="cuenta" value="<?php echo $row['Numero_cuenta'] ?>"  readonly required>
	    			    </div>
	    			</td>
	    			<td>        
                        <div id="campos" class="" >
    				        <input type="text" class="form-control" name="totalpesos" value= "<?php echo $totalPesos ?>" readonly required>
	    		        </div>
	    		    </td>
                    <td>        
                        <div id="campos" class="" >
    				        <input type="text" class="form-control" name="pesos2" value= "<?php echo $pesos ?>" required>
	    		        </div>
	    		    </td>
                    <td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="bolivares2" value="<?php echo $bolivares ?>"  readonly required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="email" value="<?php echo $row['Email'] ?>"  readonly required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="telefono" value="<?php echo $row['Telefono'] ?>"  readonly required>
	    			    </div>
	    			</td>
	    			<td>
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="transf" value= "<?php echo $estatus ?>" readonly required>
	    	            </div>
	    	        </td>
            
                <td><div id="enviarp" method="GET" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                </td>

            </form>
            </tr>
 <?php } ?>


</table>

		
		
		
		</div>
   
   
   <?php
		    date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $rut= $_GET['rut'];
            
            $insertar= "SELECT  Forma_pago,cliente, comprobante, rut, Email, Telefono FROM transacciones1 WHERE Numero_cuenta != '' AND rut = '$rut' OR Telefono= '$rut' OR Email= '$rut' OR cliente LIKE '%$rut%' OR Cedula= '$rut' OR Nombre_Apellido LIKE '%$rut%' GROUP BY Numero_cuenta LIMIT 1";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
   
  
  <div id="form" class=" col-xs-4 col-xs-offset-1">
            <h1>Coincidencias Parciales</h1>
            
            
            
                <form name="formul0" method="GET" action="guardarDatosOfic2.php">
                	
                	<div id="campos" class="">
                        <label>Transaccion</label> 
				    	<input type="text" class="form-control" name="ids" value= "<?php echo $ids; ?>" readonly required>
                    </div>
                
                     <div id="campos" class="">
                            <label>TASA</label> 
				    	    <input type="text" class="form-control" name="tasa" value="<?php echo $tasa; ?>" readonly>
                     </div>
                    
                     <div id="campos" class="">
                        <label>TASA ESPECIAL</label> 
				    	
				    	<input type="text" class="form-control" name="tasaesp"  value="<?php echo $tasa; ?>" readonly>
                    </div>    
                    
                  <div id="campos" class="">
				        <label>Transferencia</label>
			   	       <select id="Transferencia" name="transf"  class="form-control" onchange ="cambiarcampos2(this)" >
				           <option value="No Verificado">No verificado</option>
				            <option value="Pendiente">Pendiente</option>
					   </select>
          	        </div>
                    
                   <td>        
        	            <div id="campos" name="id" >
        	            	 <label>Forma de Pago</label>
    				        <input type="text" class="form-control" name="formaPago" value= "<?php echo $row['Forma_pago']; ?>" readonly required>
	    	            </div>
	    	        
                    </td>   
                    
                    
                    
                    <div id="campos" class="">
                        <label>Cliente</label> 
				    	<input type="text" class="form-control" name="cliente" value= "<?php echo $row['cliente']; ?>" readonly required>
                    </div>
                    
                    <div id="campos" class="">
                        <label>RUT, Pasaporte o Cedula</label> 
				    	<input type="text" class="form-control" name="rut" value= "<?php echo $row['rut']; ?>" readonly required>
                    </div>
                    
                    <div id="comprobante1" class="">
                        <label>Numero de Comprobante</label> 
				    	<input type="text" class="form-control" name="comprobante" value= "<?php  echo $comprobante ?>" readonly required >
                    </div>
                        
                    <div id="campos" class="">
                        <label>Nombre y Apellido o Razón Social</label> 
				    	<input type="text" class="form-control" name="nombre" value= "" required>
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
			        
			        
			        
			        
                    <div id="CuentaBeneficiario" class="">
				        <label>Numero de Cuenta Bancaria</label>
				    	<input type="text" class="form-control" name="cuenta"  minlength=20 maxlength=20 value= "<?php echo $numcuenta; ?>" required>
				    </div>
				   
				   
				    
				    <div id="campos" class="" >
    				    <label>Total de pesos depositados</label>
		    			<input type="number" class="form-control" name="totalpesos" value= "<?php echo $totalPesos; ?>" onchange="calcularofic()" required>
	    			</div>
	    			
	    			<div id="PesosBs1" class="">
				        <label>¿Pesos o Bolivares?</label>
			   	       		<select id="pesosbs" name="pesosbs" onchange="cambiarcampos16(this)" class="form-control" required>
				        		<option value="">Seleccionar</option>            
				        		<option value="Pesos">Pesos</option>            
                        		<option value="Bolivares">Bolivares</option>
					    	</select>
          	        </div>
				   
				    <div id="campos" class="" >
    				    <label>Cantidad de Pesos a Enviar</label>
		    			<input id="pesos2" type="text" class="form-control" name="pesos2" value= "<?php echo $pesos; ?>" onchange="calcularofic()" readonly required>
	    			</div>
                    
                    <div id="campos" class="" >
    				    <label>Cantidad de Bs. a Recibir</label>
		    			<input id="bolivares2" type="text"  class="form-control" value= "<?php echo $bolivares; ?>" name="bolivares2" onchange="calcularofic2()" readonly required>
	    			</div>
				   
				    
                    <div id="campos" class="">
				        <label>Email de Quien Envía</label>
    					<input type="Email" class="form-control" value= "<?php echo $row['Email'] ?>" name="email">
    				</div>
                    <div id="campos" class="">
				        <label>Teléfono de Quien Envía</label>
    					<input type="text" class="form-control" value= "<?php echo $row['Telefono'] ?>" name="telefono">
    				</div>
    				
                    <div id="enviarp" method="GET" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                    
                </form>
                <?php } ?>
                <h2>Revisa los Datos Antes de Enviar</h2>

        </div>
 
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    
   
</body>


</html>