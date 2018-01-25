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
if($tiempo_transcurrido >= 240){ // 1 x 60 x 60 = 1 horas...
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
		<link rel="stylesheet" href="css/deposito.css">
	    
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
      <div id="tasa1" class="container">
        <div id="tasa" class= "container col-xs-12 col-xs-offset-3 col-sm-3 col-sm-offset-3 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4">
            <span><img id="bandera" class="img" src="img/icon_cl.png"></span>
			<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span>
			<span><img id="bandera" class="img" src="img/icon_vzla.png"></span>
        <div id="tasa2" class= " container col-xs-12 col-sm-3 col-md-1 col-lg-1">
            <span><h5>29.00</h5></span>
        </div>
        
          </div>
       
    </div>

        
        <div id="form">
            <h1>Ingresa los Datos del Beneficiario</h1>
            <h2>Solicita el código verde, pulsando el siguiente botón, te llegara el código al correo electrónico, deberás pegarlo en la casilla correspondiente para hacer efectiva la operación</h2>
    
                <form method="post" action="codigoVerde.php">

                    <div id="enviarp" method="post" >
    		            <button id="botones" onclick="myFunction()" class="form-control">Solicita tu ¡CODIGO VERDE!</button> 
                    </div>
                    
                </form >
                                                    
                <form name="formul0" method="post" action="guardarDatos.php">
                
                        <div id="campos" class="">
		    		    <label>Codigo Verde</label>
			    		<input type="text" class="form-control" name="codigo" required>
				    </div>
                        <div id="campos" class="">
                        <label>Nombre y Apellido o Razón Social</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
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
    					<input type="Email" class="form-control" name="email" required>
    				</div>
                    <div id="campos" class="">
				        <label>Teléfono de Quien Envía</label>
    					<input type="text" class="form-control" name="telefono" requierd>
    				</div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        
    </div>

        
   
</body>


</html>