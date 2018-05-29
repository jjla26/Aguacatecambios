<?php
session_start();
date_default_timezone_set('America/Santiago');
$current_date = date("Y-m-d");


if (!empty($_SESSION['user'])){
   if($_SESSION['user'] == 'jlopez'|| $_SESSION['user'] == 'caldazoro' || $_SESSION['user'] == 'gcarrillo'){
                
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
    
header('Location: admin');

}
}else{
echo '<script>window.location="index"</script>';
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
		<link rel="stylesheet" href="css/instrucciones.css">

	</head>

	<body>
   		<header>
			<nav id="barra" class="navbar navbar-inverse navbar-static-top col-xs-12 ">
					<div class="container">
						<div class="navbar-header">
							<a id= "logo" href="principal1.php" class="navbar-left"><img src="img/logo.png"></a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div id="navbar" class="navbar-collapse collapse ">
							<ul class="nav navbar-nav navbar-right ">
								<li class=""><a href="principal1.php#formulario">Formulario de envio</a></li>
								<li class=""><a href="instrucciones.php">Instrucciones y Reglas</a></li>
								<!--<li class=""><a href="#">Testimonios</a></li>
								<li class=""><a href="#">Contacto</a></li>
								<li class=""><a href="#">SIGN UP</a></li> -->
							</ul>
						</div>
					</div>
			</nav>
							
        </header>
        
        <main>
			
			
			<section>
			<div id = "preguntas" class = "container col-xs-12 col-sm-12 col-md-10 col-lg-10 text-center col-md-offset-1 col-lg-offset-1">
			    <h2>Instrucciones y reglas</h2>
			   <ul>
			   	<li class= "q"><div class= "qd">¿Cuales son los limites para el cambio?</div></li>
			   	<li class= "a"><div>El monto mínimo por transacción hacia Venezuela es de 10mil pesos. No tenemos limite superior para cambios</div></li>
			   	<li class= "q"><div class= "qd">¿Como debo reportar mi pago?</div></li>
			   	<li class= "a"><div>En el caso de transferencias los recibos de pago que manejamos deben ser el que especifique: comentario de la transferencia (giroaguacatecambios y cedula del beneficiario), numero de cuenta, número de referencia y cantidad depositada. Esto guiado a la protección tanto del cliente como de aguacatecambios.
En caso de depósitos el comprobante de pago debe ser identificado en la parte frontal a lapicero con giroaguacatecambios y cedula del beneficario.</div></li>
			   	<li class= "q"><div class= "qd">Me equivoque al transferir. Necesito un reembolso. ¿Que debo hacer?</li>
			   	<li class= "a">Solo se devuelven depósitos en pesos realizados por el cliente por motivo de equivocación, el dinero será reintegrado obligatoriamente a la cuenta de la cual fue realizada la transacción presentando la documentación requerida (numero de referencia de la transacción, capture de la transacción, documento de identificación del cliente). En caso de depósitos erróneos debería presentarse en nuestras oficinas con el comprobante de pago y documento de identificación del titular de la cuenta en la cual será realizada la transferencia.
No se devuelve dinero por motivos de cambio de tasa o cambio de planes por parte del cliente.
Las devoluciones de pesos se manejan en un plazo no mayor a 3 días hábiles</li>
			    <li class= "q"><div class= "qd">No he recibido mi dinero. ¿Que debo hacer?</div></li>
			   	<li class= "a">Si la transferencia no se hizo efectiva por error del cliente al enviar los datos, deberá esperar el reintegro del dinero por parte del banco para poder realizar nuevamente su transacción a la tasa pactada en el momento del cambio.
Entre las responsabilidades del cliente esta revisar bien su comprobante de pago en el cual se reflejan los datos del beneficiario, para que pueda avisarnos lo antes posible si una transacción fue realizada con datos erróneos. En caso de que nuestros operadores tengan un error al transferir, le realizaremos la segunda transferencia inmediantamente.
</li>
		   	    <li class= "q"><div class= "qd">Quisiera cambiar pesos en efectivo. ¿Como lo hago?</div></li>
			   	<li class= "a">Para realizar cambios en nuestras oficinas es obligatorio que traigan su documento de identificación ya que será solicitado de manera obligatoria en la recepción. *Este requisito es excluyente*
Si viene a nuestras oficinas asegúrese de tener todos los datos a la mano para que su atención sea la mejor posible, procuramos que nuestros cambios sean los más rápidos</li>
			    <li class= "q"><div class= "qd">¿Hasta que hora debo esperar mi deposito?</div></li>
			   	<li class= "a">Todo los depositos recibidos en nuestro horario laboral se realizan el mismo día. En ocasiones, dependiendo de la demanda
			   	tardamos un poco mas del tiempo estimado para completar su transaccion, pero no se preocupe, seguimos transfiriendo hasta terminar los depositos del día</li>
			   
				<h3>¡IMPORTANTE! De no cumplir alguno de nuestros requerimientos mínimos de seguridad la transacción no podrá ser procesada, el dinero en pesos chilenos será devuelto a la cuenta de donde provienen los pesos previa presentación de su documento de identidad. </h3>			   
			   </ul>
			   
			   </div>


</section>
          
				              
              
           	<section>
       				<div id = "mapa" class="container col-xs-12">
						<h1> Encuentranos</h1>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.8748898444314!2d-70.61828268500295!3d-33.42650598078083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf6383ac6e6b%3A0x24d2440872142db9!2sAv.+Providencia+1650%2C+Providencia%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses-419!2scl!4v1520094298458" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						
					</div>
				
			</section>
              
           
                
</main>
        
        
        
               
				

      
		
		

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/formatNumber.js"></script>
       	<script src="js/mostrarsolicitud.js"></script>
		<script src="js/mostrar.js"></script>
		<script src="js/calcular.js"></script>
		<script src="js/cambiarcampos.js"></script>
	    <script> function faqcontrol(){
    
    $(".a").hide();
    $(".q").on("click", function(){
        $(this).next().slideToggle();
    });
    
    
}

$(document).ready(function(){
    
    faqcontrol();
});</script>
        
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