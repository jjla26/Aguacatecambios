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
  
  <?php

  include 'conexion.php';
    $sql = "SELECT id,archivo_nombre,archivo_tipo,archivo_peso FROM archivos";
    $consulta = mysqli_query($conexion,$sql) or die ("No se pudo ejecutar la consulta");

    While ($registro=mysqli_fetch_array($consulta)){?>
        <a href="<?php echo "https://fizzbuzz-jjla.c9users.io/Aguacatecambios/www/ver.php?id="; echo $registro['id'];?>">foto</a><?php
        echo "<br> Nombre archivo: ".$registro['archivo_nombre'];
        echo "<br> Tipo archivo (MIME formato): ".$registro['archivo_tipo'];
        echo "<br> Peso: ".$registro['archivo_peso']." bytes.<br><br>";
    }

?>

  </body>
</html>