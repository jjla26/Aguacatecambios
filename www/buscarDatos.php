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
        
            <h1>Transferencias Completas</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
		    <th>ID</th>
		    <th>Cliente</th>
			<th>RUT</th>
			<th>Nombre</th>
			<th>Naciona.</th>
			<th>Cedula</th>
			<th>Banco destino</th>
			<th>Num. Cuenta</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Enviar</th>
			
		</tr>
		</thead>
		
		<?php
		
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $rut= $_POST['rut'];
            
            $insertar= "SELECT ID, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Email, Telefono FROM transacciones1 WHERE Numero_cuenta != '' AND rut = '$rut' OR Telefono= '$rut' OR Email= '$rut' OR cliente LIKE '%$rut%' OR Cedula= '$rut' OR Nombre_Apellido LIKE '%$rut%' GROUP BY Numero_cuenta";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="POST" action="enviardatos.php">
                
        	    <tr>
        	        <td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="ids" value= "<?php echo $ids=$row['ID']; ?>" readonly>
	    	</div></td>
        	        
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="cliente1" value= "<?php echo $row['cliente']; ?>" readonly required>
	    	            </div>
	    	        
                    </td>   
        	        <td>
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="rut1" value= "<?php echo $row['rut'] ?>" required>
	    	            </div>
	    	        </td>
                    <td>        
                        <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="nombre1" value= "<?php echo $row['Nombre_Apellido'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    <td>        
                        <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="nacionalidad1" value= "<?php echo $row['Tipo_doc'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    
                    <td>
                        <div id="campos" name="id" >
                            <input type="text" class="form-control" name="cedula1" value= "<?php echo $row['Cedula'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    
                    <td>        
                        <div id="campos" class="" >
    				        <input type="text" class="form-control" name="cuentadest1" value= "<?php echo $row['Cuenta_destino'] ?>" readonly required>
	    		        </div>
	    		    </td>
                    <td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="numdest1" value="<?php echo $row['Numero_cuenta'] ?>"  readonly required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="email1" value="<?php echo $pesos=$row['Email'] ?>" required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="telefono1" value="<?php echo $pesos=$row['Telefono'] ?>" required>
	    			    </div>
	    			</td>
            
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
        
            <h1>Coincidencias Parciales</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
		    <th>Cliente</th>
			<th>RUT</th>
			<th>Nombre</th>
			<th>Naciona.</th>
			<th>Cedula</th>
			<th>Banco destino</th>
			<th>Num. Cuenta</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Enviar</th>
			
		</tr>
		</thead>
		
		<?php
		
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $rut= $_POST['rut'];
            
            $insertar= "SELECT ID, cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Email, Telefono FROM transacciones1 WHERE Numero_cuenta != '' AND rut = '$rut' OR Telefono= '$rut' OR Email= '$rut' OR cliente LIKE '%$rut%' OR Cedula= '$rut' OR Nombre_Apellido LIKE '%$rut%' GROUP BY Numero_cuenta LIMIT 1";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="POST" action="enviardatos.php">
                
        	    <tr>
        	        <td><div id="campos" name="id" >
    				    <input type="text" class="form-control" name="ids" value= "<?php echo $ids=$row['ID']; ?>" readonly>
	    	</div></td>
        	        
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="cliente1" value= "<?php echo $row['cliente']; ?>" readonly required>
	    	            </div>
	    	        
                    </td>   
        	        <td>
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="rut1" value= "<?php echo $row['rut'] ?>" required>
	    	            </div>
	    	        </td>
                    <td>        
                        <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="nombre1" value= "" required>
	    	            </div>
	    	        </td>
                       <td>        
                        <div id="Cedula1" class="">
				        
			   	       <select id="nacionalidad1" name="nacionalidad1" class="form-control">
				            <option value=""></option>
					        <option value="V">V</option>
                            <option value="E">E</option>            
                            <option value="J">J</option>
					    </select>
          	          
				    </div>
	    	        </td>
                    
                    <td>
                        <div id="campos" name="id" >
                            <input type="text" class="form-control" name="cedula1" value= "" required>
	    	            </div>
	    	        </td>
                    
                    <td>        
                        <div id="Bancob" class="">
		    		    <select id="cambiar" name="cuentadest1" class="form-control" onchange="cambiarcampos1(this)" >
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
	    		    </td>
                    <td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="numdest1" value=""  required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="email1" value="<?php echo $pesos=$row['Email'] ?>" required>
	    			    </div>
	    			</td>
	    			<td><div id="campos" class="" >
    				        <input type="text" class="form-control" name="telefono1" value="<?php echo $pesos=$row['Telefono'] ?>" required>
	    			    </div>
	    			</td>
            
                <td><div id="enviarp" method="post" >
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
    
   
</body>


</html>