<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php 
    //consulta lo enviado
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
        
        // Formulario par editar producto
    ?>
<div class="container">
<div class="alert alert-info">
    <h3>EDITAR PRODUCTO</h3>
    <a class="btn btn-dark"href="productos.php">Regresar</a><br><br>
</div>
</div>

<div class="container">
<form id="formulario" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <div class="form-group">
        <label for="ref_producto">Referencia del Producto:</label><br>
        <input type="text" id="ref_producto" name="ref_producto" class="form-control" value="<?php echo $ref_producto; ?>">
    </div>
    
    <div class="form-group">
        <label for="cat_producto">Categoría del Producto:</label><br>
        <input type="text" id="cat_producto" name="cat_producto" class="form-control" value="<?php echo $cat_producto; ?>">
    </div>
    
    <div class="form-group">
        <label for="descripcion_producto">Descripción del Producto:</label><br>
        <input type="text" id="descripcion_producto" name="descripcion_producto" class="form-control" value="<?php echo $descripcion_producto; ?>">
    </div>
    
    <div class="form-group">
        <label for="valor_producto">Valor del Producto:</label><br>
        <input type="text" id="valor_producto" name="valor_producto" class="form-control" value="<?php echo $valor_producto; ?>">
    </div>

    <div class="form-group">
        <label for="unidades_producto">Unidades del Producto:</label><br>
        <input type="text" id="unidades_producto" name="unidades_producto" class="form-control" value="<?php echo $unidades_producto; ?>">
    </div>
    
    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
    
    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
</form>

</div>

                  
                  <?php
                  }
                  ?>
</body>
</html>