<?php
include ("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
    <?php
if(isset($_POST['submit'])){
    $id_producto = $_POST['id_producto'];
    $ref_producto = $_POST['ref_producto'];
    $cat_producto = $_POST['cat_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $valor_producto = $_POST['valor_producto'];
    $unidades_producto = $_POST['unidades_producto'];

    $sql = "UPDATE productos SET ref_producto='$ref_producto', cat_producto='$cat_producto', descripcion_producto='$descripcion_producto', valor_producto='$valor_producto', unidades_producto='$unidades_producto' WHERE id_producto='$id_producto'";

    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        echo "<script> alert ('Los datos fueron actualizados en la base de datos correctamente'); location.assign ('productos.php'); </script>";
    } else {
        echo "<script> alert ('ERROR: Los datos no fueron actualizados en la base de datos'); location.assign ('productos.php'); </script>";
    }

// Cerrar conexión
mysqli_close($conexion);

}

    else{
        $id_producto = $_GET['id_producto'];
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);
        $ref_producto = $fila["ref_producto"];
        $cat_producto = $fila["cat_producto"];
        $descripcion_producto = $fila["descripcion_producto"];
        $valor_producto = $fila["valor_producto"];
        $unidades_producto = $fila["unidades_producto"];
        mysqli_close($conexion);
        
        
    ?>

<div class="alert alert-info"><h3>EDITAR PRODUCTO</h3></div>
<a href="productos.php">Regresar</a><br><br>

<form id="formulario" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <label for="ref_producto">Referencia del Producto:</label><br>
    <input type="text" id="ref_producto" name="ref_producto" value="<?php echo $ref_producto; ?>"><br><br>
    
    <label for="cat_producto">Categoría del Producto:</label><br>
    <input type="text" id="cat_producto" name="cat_producto" value="<?php echo $cat_producto; ?>"><br><br>
    
    <label for="descripcion_producto">Descripción del Producto:</label><br>
    <input type="text" id="descripcion_producto" name="descripcion_producto" value="<?php echo $descripcion_producto; ?>"><br><br>
    
    <label for="valor_producto">Descripción del Producto:</label><br>
    <input type="text" id="valor_producto" name="valor_producto" value="<?php echo $valor_producto; ?>"><br><br>

    <label for="unidades_producto">Unidades del Producto:</label><br>
    <input type="text" id="unidades_producto" name="unidades_producto" value="<?php echo $unidades_producto; ?>"><br><br>
    
    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
    
    <input type="submit" name="submit" value="Actualizar">
</form>


                  
                  <?php
                  }
                  ?>
</body>
</html>