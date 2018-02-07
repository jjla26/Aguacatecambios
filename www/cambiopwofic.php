<?php


header("Content-Type: text/html;charset=utf-8");

if(isset($_POST['submit'])){

   if( (isset($_POST['nombre'])) || (isset($_POST['password']))  || (isset($_POST['nuevopassword']))){
        
       $usuario = $_POST['nombre'];
       $contrasenavieja= $_POST['oldpw'];
       $contrasenavieja=md5($contrasenavieja);
       $contrasena= $_POST['password'];
       $contrasena= md5($contrasena);
       $nuevacontrasena=$_POST['nuevopassword'];
       $nuevacontrasena= md5($nuevacontrasena);
       
       
       include 'conexion.php';

       mysqli_select_db($conexion,'aguacatecambios');
        
        $pw = mysqli_query($conexion , "SELECT pw FROM usuariosofic WHERE user = '$usuario' ");
        $pw = mysqli_fetch_array($pw);
        $pw= $pw['pw'];
        
        
            
        
        
        $result = mysqli_query($conexion , "SELECT * FROM usuariosofic WHERE user = '$usuario' ");

       if($row = mysqli_fetch_array($result)){
           if($pw==$contrasenavieja){

           if($contrasena == $nuevacontrasena){
                    $cambio= "UPDATE usuariosofic SET pw = '$nuevacontrasena' WHERE user= '$usuario'";
                    $resultado = mysqli_query($conexion, $cambio);
                echo '<script> alert("Su cambio de contraseña fue exitoso");window.location="admin"; </script>';
            }else{
                echo '<script> alert("La contraseña no coincide, intente nuevamente!");window.location="passwordofic"; </script>';
           }}else{
               
               echo '<script>alert("Contraseña anterior incorrecta");window.location="passwordofic"</script>';
           }
           
       }else{
               echo '<script>alert("Usuario Incorrecto");window.location="passwordofic"</script>';
       
       }}
       else{
            header("location: passwordofic");

   }}else{
            header("location: passwordofic");
    }