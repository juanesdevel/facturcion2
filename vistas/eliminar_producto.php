<?php
$id_productos=$_GET['id_producto'];

include ("conexion.php");



$sql="delete from productos where id_producto='".$id_productos."'";

$resultado=mysqli_query($conexion,$sql);

if($resultado){

    echo '<script>alert("Datos eliminados correctamente");location.assign("productos.php");</script>';
     
} else {
 echo "<script> alert ('ERROR: Los datos no fueron eliminados a la base de datos'); location.assign (productos.php'); </script>";


}

?>