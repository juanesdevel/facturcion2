<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
<div class="container-fluid alert alert-warning sombra">
<h1>Registros</h1> 
         <a href="inicio_admin.php"class="btn btn-dark">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div>
         <hr>
<div class="container-fluid">
         <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
        
<a href="r_clientes.php" class="btn btn-warning">Registro de Clientes</a>
<a href="r_usuarios.php"class="btn btn-warning">Registro de Usuarios</a>
<a href="r_productos.php" class="btn btn-warning">Registro de Productos</a>
<a href="r_ventas.php" class="btn btn-warning">Registro de Ventas</a>
<a href="r_devoluciones.php" class="btn btn-warning">Registro Devoluciones</a>
<a href="r_facturas.php" class="btn btn-warning">Registro de Facturas</a>
<a href="Historial.php" class="btn btn-info">Historial de Cambios</a>
          </div>
          </div>
          </div>
          <hr>
          <div class="container-fluid">
              <div class="alert alert-info">
              <h4   >Resumen</h4>
          </div></div>
          <hr>
          <?php
          $tablas = array('clientes', 'usuarios', 'productos', 'ventas', 'devoluciones', 'facturas');

// Iterar sobre cada tabla para obtener el total de filas
foreach ($tablas as $tabla) {
    // Consulta SQL para obtener el total de filas de cada tabla
    $sql = "SELECT COUNT(*) as total FROM $tabla";
    $resultado = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Obtener el total de filas
        $fila = $resultado->fetch_assoc();
        $total = $fila['total'];

        // Mostrar el resultado en un div con la clase alert-info
        echo '<div class="alert alert-info" role="alert">';
        echo "Total de $tabla: $total";
        echo '</div>';
    } else {
        // Si no se encontraron resultados
        echo "No se encontraron resultados en la tabla '$tabla'.";
    }
}

// Cerrar la conexión
$conexion->close();
?>
</body>
</html>