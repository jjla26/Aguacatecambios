<?php
session_start();
/*
if (isset($_SESSION['user'])){
    $fechaGuardada = $_SESSION['ultimoAcceso'];

    $ahora = date("Y-n-j H:i:s");
    if($_SESSION['user']!=true){
        echo '<script>window.location="empresas"</script>';
        return false;
        
    }else{
$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
if($tiempo_transcurrido >= 240){ // 1 x 60 x 60 = 1 horas...
session_destroy();

echo '<script>alert("Su sesion ha caducado");window.location="empresas"</script>'; // 

return false;

    
}else{$_SESSION["ultimoAcceso"] = $ahora;}
}
}else{
return false;
}
*/
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
		
	</head>
<body>
          <div>
        
            <h4>Bienvenidos <?php echo $_SESSION['user']; ?></h4>
            
          
          </div>
   
        <div id="enviarp">
            <h4><a href="destroy.php">Cerrar Sesion</a></h4> 
        </div>

        <div id="login" >
            <div id="logo">
            <a href="#"><img src="img/logo.png"></a>
        </div>

<div id="form" class=" col-xs-4 col-xs-offset-1">
            <h1>Calculadora de cambios</h1>
            
                <form name="formul">
								
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
									<a id="botones" class="btn btn-success col-xs-12 success" onclick="calcular1();"> Calcular</a> 
								</div>
								
								
								
							</form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        


        
        
        <div id="form" class=" col-xs-4 col-xs-offset-1">
            <h1>Ingrese Datos del cliente</h1>
            
                <form name="formul0" method="post" action="guardarDatosOfic.php" target="request">
                
                    <div id="campos" class="">
                        <label>Tasa de Cambio</label> 
				    	<input type="text" class="form-control" name="tasa" required>
                    </div>
                        
                        <div id="campos" class="">
                        <label>Nombre y Apellido o Razón Social</label> 
				    	<input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div id="campos" class="">
				        <label>Cedula de Identidad</label>
			   	       <select id="nacionalidad" name="tipodoc" class="form-control" required>
				            <option value=""></option>
					        <option value="Venezolano">V</option>
                            <option value="Extranjero">E</option>            
                            <option value="Juridica">J</option>
					    </select>
          	          <input id="cedula" type="text" class="form-control" name="iddoc" required>
				    </div>
                    <div id="campos" class="">
		    		   <label>Banco del Beneficiario</label> 
                       <select id="cambiar" name="banco" class="form-control" required>
				           <option value="3">Seleccionar</option>
					       <option value="Banesco">Banesco</option>
                            <option value="Banco Mercantil">Banco Mercantil</option>            
                            <option value="Banco Mercantil">100% BANCO</option>	
                            <option value="Banco Mercantil">ABN AMRO BANK</option>
                            <option value="Banco Mercantil">BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
                            <option value="Banco Mercantil">BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
                            <option value="Banco Mercantil">BANCO AGRICOLA</option>
                            <option value="Banco Mercantil">BANCO BICENTENARIO </option>
                            <option value="Banco Mercantil">BANCO CARONI, c.A. BANCO UNIVERSAL</option>
                            <option value="Banco Mercantil">BANCO CENTRAL DE VENEZUELA</option>
                            <option value="Banco Mercantil">BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
                            <option value="Banco Mercantil">BANCO DE VENEZUELA S.A.I.C.A.</option>
                            <option value="Banco Mercantil">BANCO DEL CARIBE C.A.</option>
                            <option value="Banco Mercantil">BANCO DEL PUEBLO SOBERANO C.A.</option>
                            <option value="Banco Mercantil">BANCO DEL TESORO </option>
                            <option value="Banco Mercantil">BANCO ESPIRITO SANTO S.A.</option>
                            <option value="Banco Mercantil">BANCO EXTERIOR C.A.</option>
                            <option value="Banco Mercantil">BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
                            <option value="Banco Mercantil">BANCO MERCANTIL C.A.</option>
                            <option value="Banco Mercantil">BANCO NACIONAL DE CREDITO </option>
                            <option value="Banco Mercantil">BANCO OCCINDENTAL DE DESCUENTO </option>
                            <option value="Banco Mercantil">BANCO PLAZA</option>
                            <option value="Banco Mercantil">BANCO PROVINCIAL BBVA</option>
                            <option value="Banco Mercantil">BANCO VENEZOLANO DE CREDITO S.A.</option>
                            <option value="Banco Mercantil">BANCRECER S.A. BANCO DE DESARROLLO</option>
                            <option value="Banco Mercantil">BANESCO</option>
                            <option value="Banco Mercantil">BANFANB</option>
                            <option value="Banco Mercantil">BANGENTE </option>
                            <option value="Banco Mercantil">BANPLUS BANCO COMERCIAL C.A.</option>
                            <option value="Banco Mercantil">CITIBANK</option>
                            <option value="Banco Mercantil">DELSUR BANCO UNIVERSAL</option> 
                            <option value="Banco Mercantil">FONDOCOMUN</option>
                            <option value="Banco Mercantil">INSTITUO MUNICIPAL DE CREDITO POPULAR</option>
                            <option value="Banco Mercantil">MIBANCO BANCO DE DESARROLLO, C.A.</option>
                            <option value="Banco Mercantil">SOFITASA</option>
					    </select>
				    </div>
                    <div id="campos" class="">
				        <label>Numero de Cuenta Bancaria</label>
				    	<input type="text" class="form-control" name="cuenta" required>
				    </div>
                   <div id="campos" class="" >
    				    <label>Cantidad de Pesos a Enviar</label>
		    			<input type="text" class="form-control" name="pesos2" onchange="calcularofic()" required>
	    			</div>
                        <div id="campos" class="" >
    				    <label>Cantidad de Bs. a Recibir</label>
		    			<input type="text" class="form-control" name="bolivares2" readonly>
	    			</div>
                    <div id="campos" class="">
				        <label>Email de Quien Envía</label>
    					<input type="Email" class="form-control" name="email">
    				</div>
                    <div id="campos" class="">
				        <label>Teléfono de Quien Envía</label>
    					<input type="text" class="form-control" name="telefono">
    				</div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

        </div>
        <iframe id="request"></iframe>
        
        <div id="form" class=" col-xs-4">
            <h1>Saldos Iniciales Cuentas Chile</h1>
            
                <form name="formul1" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Abonos Cuentas Chile</h1>
            
                <form name="formul2" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>asd</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Debitos Cuentas Chile</h1>
            
                <form name="formul3" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>                
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Saldos Iniciales Cuentas Venezuela</h1>
            
                <form name="formul4" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Abonos Cuentas Venezuela</h1>
            
                <form name="formul5" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                                        
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>asd</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Debitos Cuentas Venezuela</h1>
            
                <form name="formul6" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre">
                    </div>
                                        
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        
        
        
        
    </div>

    
        
        
        
    
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    
   
</body>


</html>