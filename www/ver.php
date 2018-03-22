<?php
if(isset($_GET['id'])) {

    // you may have to modify login information for your database server:
    include 'conexion.php';
    $sql = "SELECT archivo_nombre,archivo_binario,archivo_tipo,archivo_peso FROM archivos WHERE id='".$_GET['id']."'";

    $consulta = mysqli_query($conexion,$sql);

    $datos = mysqli_result($consulta,0,"archivo_binario");
    $tipo = mysqli_result($consulta,0,"archivo_tipo");
    $nombre = mysqli_result($consulta,0,"archivo_nombre");
    $peso = mysqli_result($consulta,0,"archivo_peso");


    header("Content-type: $tipo");
    header("Content-length: $peso"); 
    header("Content-Disposition: inline; filename=$nombre"); 
 
   echo $datos;

}
?>