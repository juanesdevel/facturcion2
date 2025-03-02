<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';
// Verificación del rol de administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    // Si no es administrador, redirigir al inicio o denegar acceso
    echo '<script>alert("Acceso denegado. Solo administradores pueden acceder a esta página."); location.assign("inicio_operador.php");</script>';
    exit();  // Detener la ejecución si el usuario no tiene el rol adecuado
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/horaYfecha.js" defer></script>
    <style>
    body {
        background-color: #fbfcfc;

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
</head>

<body>
    <div class="container-fluid alert alert-info sombra">
        <div class="row">
            <div class="col-8">
                <h1>Administrador</h1>
                <a href="../conexion/cerrar_sesion.php" class="btn btn-danger btn-sm sombra"
                    onclick="return confirmarCierreSesion()">Cerrar Sesión</a>
                <span><?php echo "Usuario: " . $_SESSION['usuario']; ?></span>
            </div>
            <div class="col-3">
                <p id="fechaHora"></p>
            </div>
            <div class="col-1">
                <div class="logo-container">
                    <img src="../img/presentacion.png" alt="Logo de la empresa" class="logo"
                        style="width: 80px; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="factura_borrador.php" class="btn btn-success sombra">Nueva Factura</a>
                <a href="ventas.php" class="btn btn-primary sombra">Administrar Ventas</a>
                <a href="facturas.php" class="btn btn-primary sombra">Administrar Facturas</a>
                <a href="clientes.php" class="btn btn-primary sombra">Administrar Clientes</a>
                <a href="productos.php" class="btn btn-primary sombra">Administrar Productos</a>
                <a href="usuario.php" class="btn btn-primary sombra">Administrar Usuarios</a>
                <a href="Historial.php" class="btn btn-info sombra">Historial de Cambios</a>
                <a href="backup.php" class="btn btn-info sombra">Backup</a>
            </div>
        </div>
    </div>
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
    </div>


    <div class="container-fluid">
        <?php
    // Consulta SQL para seleccionar la última factura registrada
    $sql1 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
    $resultado1= mysqli_query($conexion, $sql1);

    // Verificar si se encontraron resultados
    if ($resultado1->num_rows > 0) {
        while ($fila = $resultado1->fetch_assoc()) {
            $fecha_notificacion = date('Y-m-d');
            echo '<div class="container-fluid alert alert-success" role="alert">';
            echo 'La última factura registrada es la No ' . $fila["no_factura"] . '. Fecha de notificación: ' . $fecha_notificacion;
            echo '</div>';
        }
    } else {
        echo '<div class="container-fluid alert alert-success" role="alert">';
        echo "No se encontraron facturas registradas.";
        echo '</div>';
    }
    ?>
    </div>

    <div class="container-fluid">
        <?php
    // Consulta SQL para seleccionar productos con unidades menores o iguales a 10
    $sql2 = "SELECT ref_producto, descripcion_producto, unidades_producto FROM productos WHERE unidades_producto <= 10";
    $resultado2 = $conexion->query($sql2);

    // Verificar si se encontraron resultados
    if ($resultado2->num_rows > 0) {
        while ($fila = $resultado2->fetch_assoc()) {
            $fecha_notificacion = date('Y-m-d');
            echo '<div class="alert alert-danger" role="alert">';
            echo 'El producto ' . $fila["descripcion_producto"] . ' (' . $fila["ref_producto"] . ') está próximo a agotarse. Cantidad actual: ' . $fila["unidades_producto"] . '. Fecha de notificación: ' . $fecha_notificacion;
            echo '</div>';
        }
    }
    ?>
    </div>
    <div class="container-fluid">
        <?php
// Obtener la fecha actual en formato 'Y-m-d'
$fecha_hoy = date('Y-m-d');   

// Consulta SQL para sumar los valores de la columna valor_total_venta donde la fecha coincida con la fecha actual
$sql3 = "SELECT SUM(valor_total_venta) AS total_ventas 
        FROM ventas 
        WHERE DATE(fecha_hora_venta) = '$fecha_hoy'";

$resultado3 = $conexion->query($sql3);

// Verificar si se encontraron resultados
if ($resultado3->num_rows > 0) {
    $fila = $resultado3->fetch_assoc();
   
    $valor_total_ventas = $fila['total_ventas'];
    
    if ($valor_total_ventas) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'El valor total de las ventas del día es: ' . $valor_total_ventas . '';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo "No se registraron ventas el día de hoy.";
        echo '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">';
    echo "No se encontraron ventas registradas!.";
    echo '</div>';
}
?>

    </div>
    <div class="container-fluid">
        <?php
// Obtener la fecha actual en formato 'Y-m-d'
$fecha_hoy = date('Y-m-d');   

// Consulta SQL para sumar los valores de la columna valor_total_venta donde la fecha coincida con la fecha actual
$sql5 = "SELECT SUM(valor_devo) AS total_devoluciones 
        FROM devoluciones 
        WHERE DATE(fecha_devo) = '$fecha_hoy'";

$resultado5 = $conexion->query($sql5);

// Verificar si se encontraron resultados
if ($resultado5->num_rows > 0) {
    $fila = $resultado5->fetch_assoc();
   
    $total_devoluciones = $fila['total_devoluciones'];
    
    if ($total_devoluciones) {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'El valor total de las devoluciones del día es: ' . $total_devoluciones . '';
        echo '</div>';
    } 
} else {
    echo '<div class="alert alert-danger" role="alert">';
    echo "No se encontraron devoluciones registradas.";
    echo '</div>';
}
?>

    </div>

    <div class="container-fluid">
        <?php
    // Consulta SQL para seleccionar la mayor venta registrada
    $sql4 = "SELECT asesor_venta, fecha_hora_venta, valor_total_venta
             FROM ventas
             WHERE valor_total_venta = (SELECT MAX(valor_total_venta) FROM ventas)";

    // Ejecutar consulta
    $resultado4 = $conexion->query($sql4);

    // Verificar si se encontraron resultados
    if ($resultado4->num_rows > 0) {
        // Obtener los datos de la fila
        $fila = $resultado4->fetch_assoc();

        // Mostrar la alerta con los datos obtenidos
        echo '<div class="alert alert-success" role="alert">';
        echo 'El día y hora: ' . $fila["fecha_hora_venta"] . ' el asesor ' . $fila["asesor_venta"] . ' hizo la mayor venta de valor: ' . $fila["valor_total_venta"] . '';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo "No se encontraron productos con valor máximo.";
        echo '</div>';
    }

    // Cerrar conexión
    $conexion->close();
    ?>
    </div>

    <script>
    function confirmarCierreSesion() {
        return confirm("¿Está seguro de que desea cerrar la sesión?");
    }
    </script>