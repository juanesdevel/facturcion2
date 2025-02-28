<?php
//seguridad de sesion
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Facturas</title>
        <style>
        /* CSS para cambiar el color de fondo */
        body {
            background-color: #f5f5dc; /* Cambia #f0f0f0 por el color deseado */
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-info">
         <h1>Anular Factura</h1>
            <a class="btn btn-dark"href="Facturas.php">Regresar</a><br><br>
        </div>
    </div>

    <?php
// Obtener el valor del número de factura desde el método GET
$no_factura = $_GET['no_factura'] ?? '';

// Verificar si se ha enviado un número de factura
if (!empty($no_factura)) {
    // Si se ha enviado un número de factura, establecerlo como el valor por defecto
    $valor_factura = htmlspecialchars($no_factura);
} else {
    // Si no se ha enviado un número de factura, dejar el campo vacío
    $valor_factura = '';
}

    // Preparar la consulta SQL
    $consulta = "SELECT estado FROM facturas WHERE no_factura = $valor_factura";
    $resultado_2 = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado_2) > 0) {
        // Obtener la primera fila de resultados
        $fila = mysqli_fetch_assoc($resultado_2);
        $estado = $fila['estado'];
    }
?>
<!-- Sección principal de información de factura -->
<div class="container-fluid">
    <!-- Cabecera con información básica de la factura -->
    <div class="container-fluid alert alert-info">
        <h4>Número de factura: <?php echo $valor_factura; // Muestra el número de factura ?> </h4>
        <h3>Estado de la Factura: <?php echo $estado; // Muestra el estado actual de la factura ?> </h3>
        
        <?php
        // Verifica si la factura está cerrada para mostrar el formulario de anulación
        if ($fila["estado"] == "Cerrada") {
            // Formulario para anular la factura que solo se muestra si la factura está cerrada
            echo '<form action="../procesos_factura_admin/validar_factura_anular.php" method="post">
                <!-- Campo oculto para enviar el número de factura -->
                <input type="hidden" size="5" id="factura" name="factura" value="' . htmlspecialchars($valor_factura) . '" readonly required>
                <div class="form-group">
                
                <!-- Campo para seleccionar la fecha y hora de anulación -->
                <div class="form-group">
                    <label for="fecha_hora_anulacion">Fecha y Hora de Anulación:</label>
                    <input type="datetime-local" class="form-control" id="fecha_anulacion" name="fecha_anulacion" required>
                </div>
                
                </div>
                <!-- Campo para especificar el motivo de la anulación -->
                <div class="form-group">
                    <label for="descripcion_devo">Motivo por el cual se anula:</label>
                    <textarea class="form-control" id="descripcion_anulacion" name="descripcion_anulacion" rows="3" required></textarea>
                </div>
                <!-- Botón para enviar el formulario y anular la factura -->
                <button class="btn btn-danger" type="submit" name="submit" value="Anular">ANULAR</button>
            </form>
            </div>';
        }
        ?>
    </div>
</section>

<!-- Sección que muestra la información detallada de la factura seleccionada -->
<section id="porfactura">
    <div class="container-fluid">
        <?php
        // Verifica si se ha enviado el formulario con el número de factura
        if(!isset($_POST['no_factura'])) {
            // Obtiene el número de factura desde la URL
            $no_factura = $_GET['no_factura'];
            
            // Consulta para obtener los datos de la factura específica
            $sql_1 = "SELECT * FROM facturas WHERE no_factura = '$no_factura'";
            $resultado_1 = $conexion->query($sql_1);
            $num_filas_2 = $resultado_1->num_rows;

            // Verifica si se encontraron resultados
            if ($resultado_1->num_rows > 0) {
                // Muestra un encabezado con el número de factura
                echo "<h4>Factura actual: No $no_factura </h4>";
                
                // Crea la tabla para mostrar los detalles de la factura
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Factura</th>";
                echo "<th style='border: 1px solid #000;'>No factura</th>";
                echo "<th style='border: 1px solid #000;'>Estado </th>";
                echo "<th style='border: 1px solid #000;'>Fecha Factura</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Nombre Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Asesor</th>";
                echo "<th style='border: 1px solid #000;'>caja</th>";
                echo "<th style='border: 1px solid #000;'>Forma de Pago</th>";
                echo "<th style='border: 1px solid #000;'>Total de Venta con IVA</th>";
                echo "<th style='border: 1px solid #000;'>Documento Factura</th>";
                echo "</tr>";
                
                // Recorre cada fila de resultados y la muestra en la tabla
                while ($fila_2 = $resultado_1->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["id_factura"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["no_factura"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["estado"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["fecha_factura"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["doc_cliente"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["nom_cliente"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["asesor"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["caja"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["forma_de_pago"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["total_venta_con_iva"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila_2["doc_factura"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // Mensaje cuando no se encuentran resultados
                echo "No se encontraron resultados para la factura de venta especificada.";
            }
        }
        ?>
    </div>
</section>

<!-- Sección que muestra las ventas individuales asociadas a la factura -->
<section>
    <div class="container-fluid">
        <?php
        // Verifica si se ha enviado el formulario con el número de factura
        if(!isset($_POST['no_factura'])) {
            // Obtiene el número de factura desde la URL
            $no_factura = $_GET['no_factura'];

            // Consulta para obtener todas las ventas asociadas a la factura
            $sql = "SELECT * FROM ventas WHERE factura_venta = '$no_factura'";
            $resultado = mysqli_query($conexion, $sql);
            $num_filas = mysqli_num_rows($resultado);

            // Verifica si se encontraron resultados
            if ($num_filas > 0) {
                // Muestra un encabezado con el número de ventas y el número de factura
                echo "<h4>$num_filas Ventas para la Factura <span>$no_factura</span></h4>";
                
                // Crea la tabla para mostrar los detalles de las ventas
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Venta</th>";
                echo "<th style='border: 1px solid #000;'>Fecha/Hora Venta</th>";
                echo "<th style='border: 1px solid #000;'>Nombre Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Venta</th>";
                echo "<th style='border: 1px solid #000;'>Caja</th>";
                echo "<th style='border: 1px solid #000;'>Forma de Pago</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Producto Venta</th>";
                echo "<th style='border: 1px solid #000;'>Valor Producto</th>";
                echo "<th style='border: 1px solid #000;'>Estado</th>";
                echo "</tr>";
                
                // Recorre cada fila de resultados y la muestra en la tabla
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_hora_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["nom_cliente"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_total_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["asesor_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["caja"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["forma_de_pago"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_prod_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["producto_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["estado"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // Mensaje cuando no se encuentran resultados
                echo "No se encontraron resultados para la factura de venta especificada.";
            }
            // Cierra la conexión a la base de datos
            mysqli_close($conexion);
        }
        ?>
    </div>
</section></body>
</html>
