<!doctype html>
<html lang="es">
	<head>
		<title> Aguacatecambios </title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.css">
		
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/estilos.css">
	    
	    <script src="js/mostrarsolicitud.js"></script>
		<script src="js/mostrar.js"></script>
		<script src="js/calcular.js"></script>
		<script src="js/calcular1.js"></script>
		<script src="js/cambiarcampos.js"></script>
		
	</head>
<body>
   		<header>
   		   
				<nav id="barra" class="navbar navbar-inverse navbar-static-top col-xs-12" style="margin-bottom:0;">
					<div class="container">
						<div class="navbar-header">
							<a href="index.html" class="navbar-left"><img src="img/logo.png"></a>
							<button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					
					
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right ">
								<li class=""><a href="#formulario">Formulario de envio</a></li>
								<li class=""><a href="#">Preguntas Frecuentes</a></li>
								<li class=""><a href="#">Testimonios</a></li>
								<li class=""><a href="#">Contacto</a></li>
								<li class=""><a href="#">SIGN UP</a></li>
							</ul>
						</div>
					</div>
				</nav>
								
           	</header>
       <main>
				<section id="banner" >
					<div class="imagenp container col-xs-12" style="background-image: url(img/bg.png)">
					
					<div class="container col-xs-12">
						<h1 class="entry-title"><?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?></h1>
						<div id="tasaverde" class="container col-xs-12 col-sm-6 col-md-4 col-lg-2 col-md-offset-3 col-md-offset-4 col-lg-offset-5">
						<p> Tasa verde de CLP a Bs</p>
						</div>
						<div class="container col-xs-12 ">
							<span><img id="bandera" class="img" src="img/icon_cl.png"></span>
							<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
							<span><img id="bandera" class="img" src="img/icon_vzla.png"></span>
						</div>
						<div id="slogan" class="container col-xs-12 text-center">
						
							<h3>SOMOS PROFESIONALES</h3>
							<h4>EN EL ENVIO DE DINERO</h4>
						</div>
					</div>
					</div>
					
				</section>
                               
                <section>
			
        		<div class="container col-xs-12" style="background-color:#f7f7f7" >
						<div class="col-xs-8 col-xs-offset-2 text-center hidden-xs " style="padding-top:15px; padding-bottom:15px;">	
							<p>Aguacatecambios es una empresa profesional de envío de remesas entre Chile-Venezuela comprometida contigo, somos una plataforma digital que te permite velar por el bienestar de los tuyos alrededor de toda Venezuela y a lo largo de chile con toda la seguridad y la confianza que una empresa establecida puede brindarte</p>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4" style="padding-top:15px; padding-bottom:15px;">	
							<a id="botones" class="btn btn-success col-xs-12 success" href="#formulario" role="button">Cambia aquí</a>
						</div>
					</div>
                    
				</section>
               
                <section id="tasa">
				
				<div id = "tasadeldia" class="container col-xs-12 " style="top:50px; padding:10px;">
					
					 	
					<div id="tasadehoy" class="panel panel-default col-xs-4 col-sm-3 col-md-3 col-lg-2 col-sm-offset-1 col-md-offset-2 col-lg-offset-3  text-center">
						<h1><?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?></h1>
						<p>Tasa de cambio de CLP a Bolivares</p>
					</div>
					
					
					<div id="tasadehoy" class="panel panel-default  col-xs-4 col-sm-3 col-md-3 col-lg-2  text-center">
						<h1><?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?></h1>
						<p>Tasa de cambio de USD a Bolivares</p>
					</div>
					<div id="tasadehoy" class="panel panel-default col-xs-4 col-sm-3 col-md-3 col-lg-2  text-center">
						<h1><?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?></h1>
						<p>Tasa de cambio de USD a CLP</p>
					</div>
					<div id="tasadehoy" class="panel panel-default col-xs-4 col-sm-3 col-md-3 col-lg-2 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-center hidden-xs">
                            <span><img class="img" src="img/icon_cl.png"></span>
							<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
							<span><img class="img" src="img/icon_vzla.png"></span>
					</div>
					<div id="tasadehoy" class="panel panel-default col-xs-4 col-sm-3 col-md-3 col-lg-2 text-center hidden-xs">
						<span><img class="img" src="img/icon2_eeuu.jpg"></span>
						<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
						<span><img class="img" src="img/icon_vzla.png"></span>
					
					</div>
					<div id="tasadehoy" class="panel panel-default col-xs-4 col-sm-3 col-md-3 col-lg-2 text-center hidden-xs">
						<span><img class="img" src="img/icon2_eeuu.jpg"></span>
						<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
						<span><img class="img" src="img/icon_cl.png"></span>
					
					</div>
				</div>
				</section>
            	
            
             <section id="calculadora">
					<div class="container col-xs-12 text-center" style="background-image: url(img/bg_dolar.png); top:50px; padding:10px; color: white;" >
										
						<div class=" col-xs-8 col-xs-offset-2 text-center">
							<a name="calculadora"><h1>Calculadora de cambio</h1></a>
						<p>aqui puedes calcular rapidamente la cantidad que necesitas</p>
							<form name="formul">
								
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-md-12 ">
									<select id="cambiar" name="cambiar" class="form-control" onChange="pagoOnChange(this)" required>
										<option value="0">Elegir que desea cambiar</option>
										<option value="1">Pesos Chilenos</option>
										<option value="2">Bolivares</option>
										
                                    </select>
									
								</div>
								
								<div id="div0" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
									<input type="text" name="pesos0" class="form-control" placeholder=""  disabled>
								</div>
								<div id="div7" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<input type="text" name="bolivares0" class="form-control" placeholder="" disabled>
								</div>
								
								<div id="div1" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<input type="text" name="pesos" class="form-control" placeholder="Pesos Chilenos" >
								</div>
								<div id="div2"  class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<input type="text" name="bolivares" class="form-control" placeholder="Bolivares">
								</div>
								<div id="div4" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<input  type="text" name="bolivares1" class="form-control" placeholder="Bolivares">
								</div>
								<div id="div3" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<input type="text" name="pesos1" class="form-control" placeholder="Pesos chilenos">
								</div>
								<div id="div5" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-lg-offset-4">
									<a id="botones" class="btn btn-success col-xs-12 success" onclick="calcular();">Calcular</a> 
								</div>
								<div id="div6" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-lg-offset-4">
									<a id="botones" class="btn btn-success col-xs-12 success" onclick="calcular1();">Calcular</a> 
								</div>
								
								
								
							</form>
						</div>
					</div>
				</section>
             
             
              
              <section>
                  
                    <div class="container col-xs-12 text-center" style="top:50px; " >
						
						<a  id="formulario" name="formulario"><h1>Formulario de envío</h1></a>
						
						<div class="container  col-md-12 col-md-12 col-md-12 col-lg-8 col-lg-offset-2 text-center ">
							
							<h2>Datos del Emisor, Transferencia o Deposito</h2>
							
					
             		   <form  name="formul0" method="POST"  action="enviarform.php">
                
								<div id="cliente" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
									<label>Nombre y Apellido</label>
									<input id="cliente1" type="text" class="form-control" name="cliente" placeholder="Ej.: Juan Perez" required>
								</div>
								<div id="rut" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
									<label>RUT o Pasaporte</label>
									<input id="rut1" type="text" class="form-control" name="rut" placeholder="Ej.: 12345678-X" required>
								</div>							
									
									
									<div id="cantidad" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Cantidad de Pesos Depositados</label>
										<input id="cantidad1" type="text" class="form-control" name="totalpesos" placeholder="Ej.: 1000000" required>
									</div>
									<div id="deposito" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Adjunta la foto de tu deposito</label>
										<input id="deposito1" type="file" class="form-control" name="archivo" placeholder="Carga tu comprobante"  >
										
									</div>
									<div id="email" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Correo Electronico</label>
										<input id="email1" type="email" class="form-control" name="email" placeholder="Ej.: ejemplo@ejemplo.com" required>
									</div>
									
									<div id="telefono" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Numero de Telefono</label>
										<input id="telefono1" type="text" class="form-control" name="telefono" placeholder="Ej.: +56912345678" required>
									</div>
						
									
									<div class="col-xs-12">
										<h2>Datos del Beneficiario</h2>
									</div>							
									
									
				                    <div id="transf" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
		    	                    	<label>Cantidad de Transferencias</label>
		    	                    	<select id="transf1" name="transf" class="form-control" onchange="cambiarcampos17(this)">
				                           <option  value="">Cantidad de Transferencias</option>
				                	       <option  value="1">1</option>
                                           <option  value="2">2</option>
                                    	</select>
				                    </div>
				
									<div id="nombre" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Nombre y Apellido</label>
										<input id="nombre1" type="text" class="form-control" name="nombre" placeholder="Ej.: Juan Perez" required>
									</div>
									
									<div id="cedula" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Cedula de Identidad o RIF</label>
											<select id="tipodoc" name="tipodoc" class="form-control col-xs-2 col-sm-2 col-md-12 col-lg-2"required>
				            					<option value=""></option>
					        					<option value="V">V</option>
                            					<option value="E">E</option>            
                            					<option value="J">J</option>
										    </select>
          	        				   			<input id="cedula1" type="text" class="form-control col-xs-8 col-sm-8 col-md-12 col-lg-2" name="iddoc" placeholder="Ej.: 12345678"  required>
				    					
				    				</div>
				    				
									 <div id="banco" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Banco</label>	
		    		   					 <select id="banco1" name="banco" class="form-control" onchange="cambiarcampos1(this)" required>
				           					<option value="">Banco</option>
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
									
								<div id="cuenta" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
										<label>Numero de cuenta</label>
										<input id="cuenta1" type="text" class="form-control" name="cuenta" placeholder="Numero de cuenta" required>
									</div>
									
									<div id="cantidad1" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
										<label>Expresar tu cantidad en Bs. o Pesos</label>
				        				<select id="pesosbs1" name="pesosbs" onchange="cambiarcampos18(this)" class="form-control"required>
				            				<option value="">Dividir monto en:</option>            
				            				<option value="Pesos">Pesos</option>            
                            				<option value="Bolivares">Bolivares</option>
					    				</select>
          	          		     	</div>
          	          		     	
									
									<div id="pesos" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-lg-offset-2">
										<label>Cantidad de Pesos a enviar</label>
											<input id="pesos1" type="text" class="form-control" name="pesos" placeholder="Pesos"  onchange="calcularPesosBs()" readonly required>
									</div>
                                    
									<div id="bolivares" class="col-xs-12 col-sm-12 col-md-12 col-lg-4" >
										<label>Cantidad de Bolivares a recibir</label>
										<input id="bolivares1" type="text" class="form-control" name="bolivares" placeholder="Bolivares" onchange="calcularBsPesos()" readonly required>
									</div>
									
									
          	          		    	<!--<div id="beneficiario2" class="col-xs-12 col-sm-12 col-md-12 col-lg-2 col-lg-offset-3">
          	          		     		<label>Datos Segundo Beneficiario</label>
		    	                    		<input id="beneficiario" type="text" class="form-control" name="cuenta" placeholder="Segundo Beneficiario" readonly >
				                    </div>-->
									
									<div id="nombre2" class="col-xs-12 col-sm-122 col-md-12  col-lg-4 ">
										<label>Nombre y Apellido</label>
										<input id="nombre3" type="text" class="form-control" name="nombre1" placeholder="Nombre y Apellido" required>
									</div>
									<div id="cedula2" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Cedula de Identidad o RIF</label>
											<select id="tipodoc1" name="tipodoc" class="form-control col-xs-2 col-sm-2 col-md-12 col-lg-2" required>
				            					<option value=""></option>
					        					<option value="V">V</option>
                            					<option value="E">E</option>            
                            					<option value="J">J</option>
										    </select>
          	        				   			
          	        				   	<input id="cedula3" type="text" class="form-control col-xs-8 col-sm-8 col-md-12 col-lg-2" name="iddoc" placeholder="Ej.: 12345678" required>
				    					
				    				</div>
									<div id="banco2" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Banco</label>
		    		   					 <select id="banco3" name="banco" class="form-control" required>
				           					<option value="">Banco</option>
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
									
									<div id="cuenta2" class="col-xs-12 col-sm-12 col-md-12  col-lg-4">
										<label>Numero de cuenta</label>
										<input id="cuenta3" type="text" class="form-control" name="cuenta" placeholder="Numero de cuenta" required>
									</div>
									
								
          	          		     	
									
									<div id="pesos2" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
										<label>Cantidad de Pesos a enviar</label>
											<input id="pesos3" type="text" class="form-control" name="pesos5" onchange="calcularPesosBs1()" placeholder="Pesos" readonly required>
									</div>
                                    
									<div id="bolivares2" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<label>Cantidad de Bolivares a recibir</label>
										<input id="bolivares3" type="text" class="form-control" name="bolivares5" onchange="calcularBsPesos1()" placeholder="Bolivares" readonly required>
									</div>
									
									<div id="campos" method="post" class="col-xs-12 col-sm-3 col-md-3 col-lg-6">
    			    					<button id="botones" class="form-control btn btn-success col-xs-12" >Enviar Datos</button> 
                   					 </div>
                    
                </form>
							
							<div id="campos" class="col-xs-12 col-sm-3 col-md-3 col-lg-6">
										<button id="botones" class="btn btn-success col-xs-12" disabled>Enviar y ser cliente frecuente</button> 
									</div>
						</div>
							
				    </div>
                  </div>
              </section>
       
        
               
                      
                             
                                    
               
               <footer>
					<div class="container col-xs-12" style="background-color:#000; top:100px; padding:1px;">
						<h1> Encuentranos</h1>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.8748898444314!2d-70.61828268500295!3d-33.42650598078083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf6383ac6e6b%3A0x24d2440872142db9!2sAv.+Providencia+1650%2C+Providencia%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses-419!2scl!4v1520094298458" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						
					</div>
				
				</footer>
                
        </main>
				




       
        <script>
function myFunction() {
    alert("Se enviaron los datos de transferencia al correo con tu ¡¡Codigo Verde!! IMPORTANTE: Si no llega el correo revisa la carpeta de spam o  contáctanos!");
}


</script>   
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5aa2d6d24b401e45400d948f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    
</body>
</html>