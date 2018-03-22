<?php
  include 'conexion.php';
    $sql = "SELECT id,archivo_nombre,archivo_tipo,archivo_peso FROM archivos";
    $consulta = mysqli_query($conexion,$sql) or die ("No se pudo ejecutar la consulta");

    While ($registro=mysqli_fetch_assoc($consulta)){
        echo "<img src= \"ver.php?id=".$registro['id']."\">";
        echo "<br> Nombre archivo: ".$registro['archivo_nombre'];
        echo "<br> Tipo archivo (MIME formato): ".$registro['archivo_tipo'];
        echo "<br> Peso: ".$registro['archivo_peso']." bytes.<br><br>";
    }

?>