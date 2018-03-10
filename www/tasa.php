<?php
session_start();

if (isset($_SESSION['user'])){

    if($_SESSION['user'] == 'jlopez'|| $_SESSION['user'] == 'caldazoro'){
                
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
    
header('Location: transaccionesofic.php');

}
}else{
header('Location: transaccionesofic.php');
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
           
        
        
        <div id="form2" class=" col-xs-4 col-xs-offset-1">
            <h1>Modificar la Tasa</h1>
            
                <form name="formul0" method="POST" enctype="multipart/form-data" action="modificarTasa.php">
                
                    <div id="campos" class="">
                        <label>TASA</label> 
				    	
				    	<input type="text" class="form-control" name="tasa" value="<?php
include 'conexion.php';
$tasa = "SELECT Tasa FROM Tasa2";
$tasa = mysqli_query($conexion,$tasa);
$tasa = mysqli_fetch_array($tasa);
$tasa= $tasa['Tasa'];

echo $tasa;

?>" required>
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

?>" required>
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