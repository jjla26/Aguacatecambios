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

        
        <div id="form" class=" col-xs-12">
            <h1>Calculadora de cambios</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
            
                       
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Saldos Iniciales Cuentas Chile</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Abonos</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>asd</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Debitos</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>RUT</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Vista</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Ahorro</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>                
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Saldos Iniciales</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                    <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>                    
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Abonos</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                                        
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>asd</h2>

           
            
        </div>
        
        <div id="form" class=" col-xs-4">
            <h1>Debitos</h1>
            
                <form name="formul" method="post" action="guardarDatos.php">
                
                        
                        <div id="campos" class="">
                        <label>Mercantil Mariana</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Mercantil Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Carlos</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Marola</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Sonaly</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                    <div id="campos" class="">
                        <label>Banesco Juridica</label> 
				    	<input type="text" class="form-control" name="nombre" requiered>
                    </div>
                                        
                    <div id="enviarp" method="post">
    			    	<button id="botones" onclick="myFunction()" class="form-control" >Enviar Datos</button> 
                    </div>
                    


                    
                </form>
                
                <h2>Revisa los Datos Antes de Enviar</h2>

           
            
        </div>
        
        
        
        
        
    </div>

        
   
</body>


</html>