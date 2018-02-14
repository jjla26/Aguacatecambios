<?php

header("Content-Type: text/html;charset=utf-8");
session_start();

if(isset($_POST['submit'])){

   if( (isset($_POST['nombre'])) || (isset($_POST['password']))){
        
       $usuario = $_POST['nombre'];
       $contrasena= $_POST['password'];
       $contrasena= md5($contrasena);
       include 'conexion.php';

       mysqli_select_db($conexion,'aguacatecambios');

       $result = mysqli_query($conexion , "SELECT * FROM usuariosofic WHERE user = '$usuario' ");
       
       if($row = mysqli_fetch_array($result)){
            if($row["pw"]== $contrasena){
                session_start();
                $ahora = date("Y-n-j H:i:s");
                $_SESSION['user']= $usuario;
                $_SESSION['ultimoAcceso']= $ahora;
                header("Location: transaccionesofic.php");
            }else{
                echo '<script>alert("Contrasena Incorrecta");window.location="admin"</script>';
                
        }}else{
           echo '<script>alert("Usuario Incorrecto");window.location="admin"</script>';
           
        
       }}else{
        
       header("location: admin");
 
   }}else{
        
       header("location: admin");
}