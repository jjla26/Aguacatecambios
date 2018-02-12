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


        

        <div id="form2" class=" col-xs-12">
        
            <h1>Transferencias pendientes</h1>

        <table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
		    <th>Cliente</th>
			<th>RUT</th>
			<th>Estatus</th>
			<th>Nombre</th>
			<th>Naciona.</th>
			<th>Cedula</th>
			<th>Pago</th>
			<th>Banco destino</th>
			<th>Num. Cuenta</th>
			<th>Pesos</th>
			<th>Bs</th>
			<th>Email</th>
			<th>Telefono</th>
			
		</tr>
		</thead>
		
		<?php
		
            date_default_timezone_set('America/Santiago');
            $current_date = date("Y-m-d H:i:s");
            
            $ids = $_POST['ids'];
            $rut= $_POST['rut'];
            $formaPago=$_POST['formaPago'];
            $pesos=$_POST['pesos3'];
            $bolivares=$_POST['bolivares3'];
            $estatus='Pendiente';
            
            
            $insertar= "SELECT cliente, rut, Nombre_Apellido, Tipo_doc, Cedula, Cuenta_destino, Numero_cuenta, Email, Telefono FROM Oficina WHERE rut = '$rut' OR Telefono= '$rut' OR Email= '$rut' OR cliente LIKE '%$rut%' OR Nombre_Apellido LIKE '%$rut%' GROUP BY Numero_cuenta";
            
            include 'conexion.php';
            
            $result = mysqli_query($conexion,$insertar);
            
		while ($row = mysqli_fetch_array($result)){?>
        	
                <form name="formul2" method="POST" action="guardarDatosOfic2.php">
                
        	    <tr>
        	    	
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="ids" value= "<?php echo $ids; ?>" readonly required>
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
    				        <input type="text" class="form-control" name="transf" value= "<?php echo $estatus ?>" readonly required>
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
                            <input type="text" class="form-control" name="cedula" value= "<?php echo $row['Cedula'] ?>" readonly required>
	    	            </div>
	    	        </td>
                    
        	        <td>        
        	            <div id="campos" name="id" >
    				        <input type="text" class="form-control" name="formaPago" value= "<?php echo $formaPago; ?>" readonly required>
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
    				        <input type="text" class="form-control" name="pesos2" value= "<?php echo $pesos ?>" readonly required>
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