<?php
session_start();

if (isset($_SESSION['user'])){
    $fechaGuardada = $_SESSION['ultimoAcceso'];

    $ahora = date("Y-n-j H:i:s");
    if($_SESSION['user']!=true){
        echo '<script>window.location="empresas"</script>';
        return false;
        
    }else{
$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
if($tiempo_transcurrido >= 8640){ // 1 x 60 x 60 = 1 horas...
session_destroy();

echo '<script>alert("Su sesion ha caducado");window.location="empresas"</script>'; // 

return false;

    
}else{$_SESSION["ultimoAcceso"] = $ahora;}
}
}else{
return false;
}

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
		<link rel="stylesheet" href="css/depositoofic.css">
	    
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
            <a href="#"><img src="img/logo.png"></a>
            </div>
        </div>
        
        <?php
        
        $ids=$_POST['ids'];
        $formaPago=$_POST['formaPago'];
        $pesos= $_POST['pesos1'];
        $bolivares= $_POST['bs1'];
        $estatus= 'Pendiente';
        
        
        ?>
        
        <div id="form" class=" col-xs-4 col-xs-offset-1">
            <h1>Ingrese Datos del cliente</h1>
            <form name="formul3" method="POST" action="buscarDatosNr.php">
            
            <div id="campos" class="">
                        <label>Dato Clave</label> 
				    	<input type="text" class="form-control" name="rut" required>
                    
            </div>
            
            <div id="campos" class="">
                        <label>Transaccion</label> 
				    	<input type="text" class="form-control" name="ids" value= "<?php echo $ids; ?>" readonly required>
                    </div>
                    				    <div>
				    <label>Forma de pago</label> 
                       <input type='text' class="form-control" name="formaPago" value="<?php echo $formaPago; ?>" readonly required>
				    </div>            
            
				   <div id="campos" class="" >
    				    <label>Cantidad de Pesos a Enviar</label>
		    			<input type="text" class="form-control" name="pesos3" value= "<?php echo $pesos; ?>" readonly required>
	    			</div>
                    
                    <div id="campos" class="">
    				    <label>Cantidad de Bs. a Recibir</label>
		    			<input type="text" class="form-control" name="bolivares3" value= "<?php echo $bolivares; ?>" readonly>
	    			</div>
				   
            
            <div id="enviarp" method="post" class="">
    		    	<button id="botones" class="form-control" >Buscar</button> 
            </div>
            
            </form>
                        
                <form name="formul0" method="POST" action="guardarDatosOfic2.php">
                
                    <div id="campos" class="">
                        <label>TASA</label> 
				    	<input type="text" class="form-control" name="tasa" value="<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?>" readonly>
                    </div>
                    <div id="campos" class="">
                        <label>Cliente</label> 
				    	<input type="text" class="form-control" name="cliente" value= "" required>
                    </div>
                    
                    <div id="campos" class="">
                        <label>RUT, Pasaporte o Cedula</label> 
				    	<input type="text" class="form-control" name="rut" value= ""  required>
                    </div>
                        
                    <div id="campos" class="">
                        <label>Transaccion</label> 
				    	<input type="text" class="form-control" name="ids" value= "<?php echo $ids; ?>" readonly required>
                    </div>
                    
				    <div id="campos" class="">
				        <label>Transferencia</label>
			    	        <input type="text" class="form-control" name="transf" value= "<?php echo $estatus; ?>" readonly>
          	        </div>
                    
                    <div id="campos" class="">
                        <label>Nombre y Apellido o Razón Social</label> 
				    	<input type="text" class="form-control" name="nombre" value= "" required>
                    </div>
                    <div id="Cedula1" class="">
				        <label>Cedula de Identidad</label>
			   	       <select id="nacionalidad" name="tipodoc" class="form-control">
				            <option value=""></option>
					        <option value="V">V</option>
                            <option value="E">E</option>            
                            <option value="J">J</option>
					    </select>
          	          <input id="cedula" type="text" class="form-control" name="iddoc" >
				    </div>
				    <div>
				    <label>Forma de pago</label> 
                       <input type='text' class="form-control" name="formaPago" value="<?php echo $formaPago; ?>" readonly required>
				    </div>
				    
				    
                    <div id="Bancob" class="">
		    		   <label>Banco del Beneficiario</label> 
                       <select id="cambiar" name="banco" class="form-control" onchange="cambiarcampos1(this)" >
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
				    	<input type="text" class="form-control" name="cuenta" value= "" required>
				    </div>
				   
				   <div id="campos" class="" >
    				    <label>Cantidad de Pesos a Enviar</label>
		    			<input type="text" class="form-control" name="pesos2" value= "<?php echo $pesos; ?>" readonly required>
	    			</div>
                    
                    <div id="campos" class="">
    				    <label>Cantidad de Bs. a Recibir</label>
		    	    		<input type="text" class="form-control" name="bolivares2" value= "<?php echo $bolivares; ?>" readonly>
	    			</div>
				   
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
				    </div>
                   
                    <div id="campos" class="">
				        <label>Email de Quien Envía</label>
    					<input type="Email" class="form-control" value= "" >
    				</div>
                    <div id="campos" class="">
				        <label>Teléfono de Quien Envía</label>
    					<input type="text" class="form-control" value= "" name="telefono" >
    				</div>
    				
                    <div id="enviarp" method="post" >
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

        </div>
        
        
       
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    
   
</body>


</html>