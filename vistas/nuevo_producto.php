<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';

if(isset($_POST['submit'])){
    // Recoger datos del formulario
      $ref_producto = $_POST['ref_producto'];
      $cat_producto = $_POST['cat_producto'];
      $descripcion_producto = $_POST['descripcion_producto'];
      $valor_producto = $_POST['valor_producto'];
      $unidades_producto = $_POST['unidades_producto'];

  

    // SQL para insertar los datos en la tabla productos
    $sql_insertar = "INSERT INTO productos (ref_producto, cat_producto, descripcion_producto, valor_producto, unidades_producto) VALUES ('$ref_producto', '$cat_producto', '$descripcion_producto', $valor_producto, '$unidades_producto')";

    if ($conexion->query($sql_insertar) === TRUE) {
        echo '<script>alert("Datos guardados correctamente");location.assign("productos.php");</script>';
    } else {
        echo "<script> alert ('ERROR: Los datos no fueron ingresados a la base de datos'); location.assign ('productos.php'); </script>";
    }
$conexion->close();
}else{

?>
<body>
<div class="container">
    <div class="alert alert-success">
    <h3>Crear Producto</h3>
    <a href="productos.php"class="btn btn-dark">Regresar</a>
    </div>
    </div>
  
    <section>
    <div class="container">
    <form id="formulario" action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_producto" name="id_producto" placeholder="ID Producto" autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="ref_producto">Referencia Producto:</label>
        <input type="text" class="form-control" id="ref_producto" name="ref_producto" placeholder="Referencia Producto" autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="cat_producto">Categoría Producto:</label>
        <input type="text" class="form-control" id="cat_producto" name="cat_producto" placeholder="Categoría Producto" autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="descripcion_producto">Descripción Producto:</label>
        <input type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="Descripción Producto" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="valor_producto">Valor Producto:</label>
        <input type="text" class="form-control" id="valor_producto" name="valor_producto" placeholder="Valor Producto" autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="unidades_producto">Unidades Producto:</label>
        <input type="text" class="form-control" id="unidades_producto" name="unidades_producto" placeholder="Unidades Producto" autocomplete="off">
      </div>
      
      <button type="submit" class="btn btn-success" name="submit" onclick="return validarCampos() && confirmarCreacion();">Crear Producto</button>
      <button type="button" class="btn btn-secondary" onclick="confirmacionBorrardatos(); borrarDatos()">Limpiar</button>
    </form>
  </div>

  <?php
                }
                ?>
  
  <script>
    function validarCampos() {
      var ref_producto = document.getElementById("ref_producto").value;
      var cat_producto = document.getElementById("cat_producto").value;
      var descripcion_producto = document.getElementById("descripcion_producto").value;
      var valor_producto = document.getElementById("valor_producto").value;
      var unidades_producto = document.getElementById("unidades_producto").value;

      if (ref_producto === "" || cat_producto === "" || descripcion_producto === "" || unidades_producto === "") {
        alert("Debe llenar todos los campos.");
        return false; // Evita que el formulario se envíe si hay campos vacíos
      }
      return true; // Permite que el formulario se envíe si todos los campos están llenos
    }
    
    function borrarDatos() {
      document.getElementById("formulario").reset();
    }
    
    function confirmacionBorrardatos() {
      return confirm("¿Estás seguro que deseas limpiar el formulario?");
    }
    
    function confirmarCreacion() {
      return confirm("¿Estás seguro de crear el nuevo producto?");
    }
  </script>
</section>


</body>
</html>

