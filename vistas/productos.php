<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
     .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        </style>
    <script>function confirmar(){
        return confirm ('¿Esta seguro de elimininar el usuario de la base de datos?')}
    
    </script>
    
    
	
</head>
<body>

<div class="container-fluid alert alert-info sombra">
    <h1>Administración de Productos <i class="fas fa-box-open"></i>
</h1>  <a href="inicio_admin.php"class="btn btn-dark btn-sm">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div>

<div class="container-fluid">
<div class="row">
    <div class="col">
      
        <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
        <a href="nuevo_producto.php" class="btn btn-success">Nuevo Producto</a>
     
    </div>
  </div>
</div><hr>

<div class="container-fluid">
         <div class="alert alert-info">
         <h5>Filtrar por:</h5>
    <div class="row">
        <div class="col">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="ref_producto">Referencia de Producto:</label><br>
                <input type="text" id="ref_producto" name="ref_producto"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="todos">Consultar todos los Productos</label><br>
    <input type="submit" value="Consultar" name="consultar_todos">
</form>
        </div>
       
        
    </div>
</div>
</div>
<hr>
  <div class="container-fluid">
   <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["ref_producto"])) { // Verifica si el campo específico está presente
include '../conexion/conexion.php';
           
            $ref_producto = $_POST['ref_producto'];

            $sql_1 = "SELECT * FROM productos WHERE ref_producto = '$ref_producto'";
            $resultado_1 = $conexion->query($sql_1);
            $num_filas = $resultado_1->num_rows;
            if ($resultado_1->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '. $ref_producto .'</div>';
                
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Producto</th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Descripción Producto</th>";
                echo "<th style='border: 1px solid #000;'>Categoría Producto</th>";
                echo "<th style='border: 1px solid #000;'>Valor Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Producto</th>";
                echo "<th style='border: 1px solid #000;'>Acciones</th>";
                echo "</tr>";
                

while ($fila = $resultado_1->fetch_assoc()) {
  echo "<tr style='border: 1px solid #000;'>";
echo "<td style='border: 1px solid #000;'>" . $fila["id_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>" . $fila["cat_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>" . $fila["valor_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>" . $fila["unidades_producto"] . "</td>";
echo "<td style='border: 1px solid #000;'>";
echo "<a href='editar_producto.php?id_producto=" . $fila['id_producto'] . "' class='btn btn-primary'>EDITAR</a>";
echo "<a href='eliminar_producto.php?id_producto=" . $fila['id_producto'] . "' class='btn btn-danger' onclick='return confirmar()'>ELIMINAR</a>";
echo "</td>";
echo "</tr>";
}
echo "</table>";

            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
            }
            $conexion->close();
        }
    }
    ?>
    </section>

<section id="todos">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
   include '../conexion/conexion.php';

            $sql = "SELECT * FROM productos";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda</div>';
                
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Producto</th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Descripción Producto</th>";
                echo "<th style='border: 1px solid #000;'>Categoría Producto</th>";
                echo "<th style='border: 1px solid #000;'>Valor Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Producto</th>";
                echo "<th style='border: 1px solid #000;'>Acciones</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["cat_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>";
echo "<a href='editar_producto.php?id_producto=" . $fila['id_producto'] . "' class='btn btn-primary'>EDITAR</a>";
echo "<a href='eliminar_producto.php?id_producto=" . $fila['id_producto'] . "' class='btn btn-danger' onclick='return confirmar()'>ELIMINAR</a>";
echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
            }
            $conexion->close();
        }
    ?>
    </div>
</section>

</div>


</body>
</html>

