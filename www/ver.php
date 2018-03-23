<?php
if(isset($_GET['id'])) {


function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
    // you may have to modify login information for your database server:
    include 'conexion.php';
    $sql = "SELECT archivo_nombre, archivo_binario, archivo_tipo, archivo_peso FROM archivos WHERE id='".$_GET['id']."'";

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