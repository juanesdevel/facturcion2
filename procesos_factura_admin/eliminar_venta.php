<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Venta</title>
</head>
<body>
<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';
$id_venta=$_GET['id_venta'];
$sql="delete from ventas where id_venta='".$id_venta."'";

$resultado=mysqli_query($conexion,$sql);

if($resultado){

    echo '<script>alert("Datos eliminados correctamente");location.assign("nueva_venta.php");</script>';
     
} else {
 echo "<script> alert ('ERROR: Los datos no fueron eliminados a la base de datos'); location.assign (nueva_venta.php'); </script>";


}

?>
</body>
</html>