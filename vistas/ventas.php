<?php
// Incluir archivos necesarios para la conexión a base de datos y gestión de sesiones
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Ventas</title>
    <!-- Inclusión de Bootstrap y Font Awesome para estilos -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery para funcionalidades dinámicas -->
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <style>
        /* Efectos de sombra para elementos visuales */
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        /* Estilo para las tablas y sus bordes */
        .tabla-ventas {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }
        .tabla-ventas th, .tabla-ventas td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
    <script>
        // Función para confirmar eliminación
        function confirmar() {
            return confirm('¿Está seguro de eliminar el item seleccionado?');
        }
        
        // Al cargar la página, suma los valores de la columna "Valor Total Venta"
        document.addEventListener("DOMContentLoaded", function() {
            const valores = document.querySelectorAll('.valor-venta');
            let suma = 0;
            
            valores.forEach(valor => {
                suma += parseFloat(valor.textContent) || 0; // Suma los valores
            });
            
            // Actualizar el elemento que muestra la suma total si existe
            const sumaTotalElement = document.getElementById('suma-total');
            if (sumaTotalElement) {
                sumaTotalElement.textContent = suma.toFixed(2); // Muestra la suma con 2 decimales
            }
        });
    </script>
</head>
<body>
    <!-- Encabezado con título y botón de regreso -->
    <div class="container-fluid alert alert-info sombra">
        <h1>Administración de Ventas <i class="fas fa-dollar-sign"></i></h1> 
        <a href="inicio_admin.php" class="btn btn-dark btn-sm">Regresar</a>
        <span> </span><?php echo "Usuario: " . $_SESSION['usuario']; ?>
    </div>
    
    <!-- Botones de acción principales -->
    <div class="container-fluid">
        <p>
            <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
            <a href="devoluciones.php" class="btn btn-danger">Ver Devoluciones</a>
        </p>
    </div>
    <hr>
    
    <!-- Sección de filtros para búsqueda -->
    <div class="container-fluid">
        <div class="alert alert-info">
            <h5>Filtrar por:</h5>
            <div class="row">
                <!-- Filtro por fecha de venta -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="fecha_venta">Fecha de Venta:</label><br>
                        <input type="date" id="fecha_venta" name="fecha_venta"><br><br>
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                
                <!-- Filtro por número de factura -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="factura_venta">Número de Factura:</label><br>
                        <input type="text" id="factura_venta" name="factura_venta_consulta"><br><br>
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                
                <!-- Filtro por cédula de cliente -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="cedula_cliente">Cédula de Cliente:</label><br>
                        <input type="text" id="cedula_cliente" name="cedula_cliente_consulta"><br><br>
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                
                <!-- Filtro por referencia de producto -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="ref_producto">Referencia de producto:</label><br>
                        <input type="text" id="ref_producto" name="ref_producto"><br><br>
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                
                <!-- Filtro por estado -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="estado">Estado:</label><br>
                        <input type="text" id="estado" name="estado"><br><br>
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                
                <!-- Consultar todas las ventas -->
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="todos">Consultar todas las ventas</label><br>
                        <input type="submit" value="Consultar" name="consultar_todos">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    
    <?php
    // Función para generar encabezados de tabla
    function generarEncabezadosTabla() {
        echo "<table class='table table-bordered table-striped tabla-ventas'>";
        echo "<tr>";
        echo "<th>ID Venta</th>";
        echo "<th>Factura Venta</th>";
        echo "<th>Fecha/Hora Venta</th>";
        echo "<th>Nombre Cliente</th>";
        echo "<th>Documento Cliente</th>";
        echo "<th>Valor Total Venta</th>";
        echo "<th>Asesor Venta</th>";
        echo "<th>Caja</th>";
        echo "<th>Forma de Pago</th>";
        echo "<th>Unidades Venta</th>";
        echo "<th>Referencia Producto</th>";
        echo "<th>Producto Venta</th>";
        echo "<th>Valor Producto</th>";
        echo "<th>Estado</th>";
        echo "<th>Acción</th>";
        echo "</tr>";
    }
    
    // Función para generar filas de tabla con datos
    function generarFilasTabla($resultado) {
        $suma_total = 0;
        
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["id_venta"] . "</td>";
            echo "<td>" . $fila["factura_venta"] . "</td>";
            echo "<td>" . $fila["fecha_hora_venta"] . "</td>";
            echo "<td>" . $fila["nom_cliente"] . "</td>";
            echo "<td>" . $fila["doc_cliente_venta"] . "</td>";
            echo "<td class='valor-venta'>" . $fila["valor_total_venta"] . "</td>";
            echo "<td>" . $fila["asesor_venta"] . "</td>";
            echo "<td>" . $fila["caja"] . "</td>";
            echo "<td>" . $fila["forma_de_pago"] . "</td>";
            echo "<td>" . $fila["unidades_venta"] . "</td>";
            echo "<td>" . $fila["ref_prod_venta"] . "</td>";
            echo "<td>" . $fila["producto_venta"] . "</td>";
            echo "<td>" . $fila["valor_producto"] . "</td>";
            echo "<td>" . $fila["estado"] . "</td>";
            echo "<td>";
            if ($fila["estado"] == "Realizada") {
                echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger'>DEVOLUCIÓN</a>";
            }
            echo "</td>";
            echo "</tr>";
            
            $suma_total += floatval($fila["valor_total_venta"]);
        }
        
        // Agregar fila para la suma total
        echo "<tr>";
        echo "<td colspan='5' style='text-align: right;'><strong>Suma Total:</strong></td>";
        echo "<td><strong id='suma-total'>" . number_format($suma_total, 2) . "</strong></td>";
        echo "<td colspan='9'></td>";
        echo "</tr>";
        
        echo "</table>";
        
        return $suma_total;
    }
    
    // Función para mostrar mensajes de alerta
    function mostrarAlerta($tipo, $mensaje) {
        echo "<div class='alert alert-$tipo' role='alert'>$mensaje</div>";
    }
    
    // Procesar formularios POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../conexion/conexion.php';
        
        // Consulta por número de factura
        if (isset($_POST["factura_venta_consulta"])) {
            $factura_venta = $_POST['factura_venta_consulta'];
            $sql = "SELECT * FROM ventas WHERE factura_venta = '$factura_venta'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            echo "<div class='container-fluid'><section id='porFactura'>";
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda: $factura_venta");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        // Consulta por cédula de cliente
        else if (isset($_POST["cedula_cliente_consulta"])) {
            $cedula_cliente = $_POST['cedula_cliente_consulta'];
            $sql = "SELECT * FROM ventas WHERE doc_cliente_venta = '$cedula_cliente'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            echo "<div class='container-fluid'><section id='porCedula'>";
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda: $cedula_cliente");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        // Consulta por referencia de producto
        else if (isset($_POST["ref_producto"])) {
            $ref_producto = $_POST['ref_producto'];
            $sql = "SELECT * FROM ventas WHERE ref_prod_venta = '$ref_producto'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            echo "<div class='container-fluid'><section id='porReferencia'>";
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda: $ref_producto");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        // Consulta por fecha de venta
        else if (isset($_POST["fecha_venta"])) {
            $fecha_venta = $_POST['fecha_venta'];
            $sql = "SELECT * FROM ventas WHERE DATE(fecha_hora_venta) = '$fecha_venta'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            echo "<div class='container-fluid'><section id='porFecha'>";
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda: $fecha_venta");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        // Consulta por estado
        else if (isset($_POST["estado"])) {
            $estado = $_POST['estado'];
            $sql = "SELECT * FROM ventas WHERE estado = '$estado'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            echo "<div class='container-fluid'><section id='porEstado'>";
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda: $estado");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        // Consultar todas las ventas
        else if (isset($_POST['consultar_todos'])) {
            echo "<div class='container-fluid'><section id='todos'>";
            
            // Consulta para obtener el total de ventas
            $sql_suma = "SELECT SUM(valor_total_venta) AS total_ventas FROM ventas";
            $resultado_suma = $conexion->query($sql_suma);
            
            if ($resultado_suma->num_rows > 0) {
                $fila_suma = $resultado_suma->fetch_assoc();
                $totalVentas = $fila_suma['total_ventas'];
                mostrarAlerta("success", "El valor total de las ventas es: $" . number_format($totalVentas, 0));
            } else {
                mostrarAlerta("warning", "No se encontraron registros en la tabla de ventas.");
            }
            
            // Consulta para obtener todos los registros
            $sql = "SELECT * FROM ventas";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            
            if ($num_filas > 0) {
                mostrarAlerta("success", "$num_filas resultados de la búsqueda");
                generarEncabezadosTabla();
                generarFilasTabla($resultado);
            } else {
                mostrarAlerta("danger", "No se encontraron resultados de la búsqueda.");
            }
            
            echo "</section></div>";
        }
        
        $conexion->close();
    }
    ?>
</body>
</html>