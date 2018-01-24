<?php


header("Content-Type: text/html;charset=utf-8");

if(isset($_POST['submit'])){

   if( (isset($_POST['nombre'])) || (isset($_POST['password']))  || (isset($_POST['nuevopassword']))){
        
       $usuario = $_POST['nombre'];
       $contrasena= $_POST['password'];
       $contrasena= md5($contrasena);
       $nuevacontrasena=$_POST['nuevopassword'];
       $nuevacontrasena= md5($nuevacontrasena);
       
       
       include 'conexion.php';

       mysqli_select_db($conexion,'aguacatecambios');

       $result = mysqli_query($conexion , "SELECT * FROM empresas WHERE user = '$usuario' ");
       
       if($row = mysqli_fetch_array($result)){
           
           if($contrasena == $nuevacontrasena){
                    $cambio= "UPDATE empresas SET pw = '$nuevacontrasena' WHERE user= '$usuario'";
                    $resultado = mysqli_query($conexion, $cambio);
                echo '<script> alert("Su cambio de contraseña fue exitoso");window.location="empresas"; </script>';
            }else{
                echo '<script> alert("La contraseña no coincide, intente nuevamente!");window.location="password"; </script>';
           }
           
       }else{
               echo '<script>alert("Usuario Incorrecto");window.location="password"</script>';
       }}else{
            header("location: password");

   }}else{
            header("location: password");
    }        