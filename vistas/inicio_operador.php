<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>


<!DOCTYPE html>
<head>
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>Asesor</title>
    <script src="horaYfecha.js" defer></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
 body {
            background-color: #fbfcfc ;
            
        }
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .logo {
            width: 150px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
	</head>
<body>
<div class="container-fluid alert alert-info sombra">
       
        <div class="row">
            <div class="col-8"><h1>Asesor</h1><a href="../conexion/cerrar_sesion.php"class="btn btn-danger btn-sm">Cerrar Sesión</a><span></span><?php echo "Usuario: ".$_SESSION['usuario'];?></div>
               <div class="col-3"><p id="fechaHora"></p></div>
               <div class="col-1"> <div class="logo-container">
        <img src="../img/presentacion.png" alt="Logo de la empresa" class="logo" style="width: 80px; height: auto;">
    </div></div>
    </div>    
</div> <hr>
         
         <div class="container-fluid">
        
        <a href="factura_borrador.php" class="btn btn-success">Nueva Factura</a>

<!-- <a href="reportes_2.php" class="btn btn-warning">Reportes</a>
</div> -->
<hr>
<div class="container-fluid">
    <div class="alert alert-info sombra">
        <div class="row">
            <div class="col-2"> 
                <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
            </div>
            <div class="col-4"> 
                <h3>Notificaciones <i class="fas fa-bell"></i>
 y Alertas <i class="fas fa-exclamation-triangle"></i>
</h3>
            </div>
        </div>
    </div>
          
          <?php
  
  // Consulta SQL para seleccionar la ultima factura registrada
  $sql_4 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
 
  $resultado_4 = mysqli_query($conexion, $sql_4);
     
// Verificar si se encontraron resultados
if ($resultado_4->num_rows > 0) {
    // Mostrar los resultados
    while ($fila = $resultado_4->fetch_assoc()) {
        // Obtener la fecha actual
        $fecha_notificacion = date('Y-m-d');

        $timestamp = strtotime($fecha_notificacion); // Convierte la fecha en un timestamp
        $fecha_formateada = date('Y-m-d', $timestamp);
                
     
        // Mostrar cada producto en un div con la clase alert-danger
        echo '<div class="alert alert-success" role="alert">';
        echo 'La ultima factura registrada es la No ' . $fila["no_factura"] . '. Fecha de notificación: ' . $fecha_formateada;
        echo '</div>';
    }
} else {
    // Si no se encontraron resultados
    echo '<div class="alert alert-success" role="alert">';
    echo "No se encontraron productos agotados.";
}

?>
  <?php

  // Consulta SQL para seleccionar los productos con unidades_producto igual o inferior a 10
$sql = "SELECT ref_producto, descripcion_producto, unidades_producto FROM productos WHERE unidades_producto <= 10";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los resultados
    while ($fila = $resultado->fetch_assoc()) {
        // Obtener la fecha actual
        $fecha_notificacion = date('Y-m-d');

        $timestamp = strtotime($fecha_notificacion); // Convierte la fecha en un timestamp
        $fecha_formateada = date('Y-m-d', $timestamp);
                
     
        // Mostrar cada producto en un div con la clase alert-danger
        echo '<div class="alert alert-danger" role="alert">';
        echo 'El producto ' . $fila["descripcion_producto"] . ' (' . $fila["ref_producto"] . ') está próximo a agotarse. Cantidad actual: ' . $fila["unidades_producto"] . '. Fecha de notificación: ' . $fecha_formateada;
        echo '</div>';
    }
} else {
    // Si no se encontraron resultados
    echo '<div class="alert alert-success" role="alert">';
    echo "No se encontraron productos agotados.";
}

// Cerrar la conexión
$conexion->close();
?>
</body>
</html>