<?php
$id_usuario=$_GET['id_usuario'];

include ("conexion.php");



$sql="delete from usuarios where id_usuario='".$id_usuario."'";

$resultado=mysqli_query($conexion,$sql);

if($resultado){

    echo '<script>alert("Datos eliminados correctamente");location.assign("usuario.php");</script>';
     
} else {
 echo "<script> alert ('ERROR: Los datos no fueron eliminados a la base de datos'); location.assign ('usuario.php'); </script>";


}

?>