<?php
//seguridad de sesion

session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=='') {
  echo "No tiene Acceso";
  die();
}

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
    </style>
</head>
<body>
<div class="container-fluid">
<div class="alert alert-warning"><h1>Reportes</h1> 
         <a href="inicio_operador.php"class="btn btn-dark">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div><hr>

         <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
        
<a href="reportes_2/r_clientes.php" class="btn btn-warning">Reporte de Clientes</a>

<a href="reportes_2/r_productos.php" class="btn btn-warning">Reporte de Productos</a>
<a href="reportes_2/r_ventas.php" class="btn btn-warning">Reporte de Ventas</a>
<a href="reportes_2/r_devoluciones.php" class="btn btn-warning">Reporte Devoluciones</a>
<a href="reportes_2/r_facturas.php" class="btn btn-warning">Reporte de Facturas</a>

          </div>
          </div>
          <hr>
          <div class="container-fluid">
              <div class="alert alert-info">
              <h4   >ESTADISTICAS</h4>
          </div></div>
          <hr>
          <?php
          include ("conexion.php");

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