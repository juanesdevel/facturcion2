<?php
// Incluir archivos de conexión y validación de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';

/**
 * Función para mostrar una tabla de resultados de facturas
 * @param mysqli_result $resultado - Resultado de la consulta a mostrar
 * @return void
 */
function mostrarTablaFacturas($resultado) {
    $num_filas = $resultado->num_rows;
    
    if ($num_filas > 0) {
        echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados encontrados</div>';
        
        // Iniciar tabla con estilos consistentes
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead><tr>";
        echo "<th>ID</th>";
        echo "<th>No. Factura</th>";
        echo "<th>Estado</th>";
        echo "<th>Fecha Factura</th>";
        echo "<th>Fecha Anulación</th>";
        echo "<th>Descripción Anulación</th>";
        echo "<th>Doc. Cliente</th>";
        echo "<th>Nombre Cliente</th>";
        echo "<th>Asesor</th>";
        echo "<th>Caja</th>";
        echo "<th>Forma de Pago</th>";
        echo "<th>Total con IVA</th>";
        echo "<th>Doc. Factura</th>";
        echo "<th>Acción</th>";
        echo "</tr></thead><tbody>";
        
        // Iterar sobre los resultados
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila["id_factura"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["no_factura"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["estado"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["fecha_factura"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["fecha_anulacion"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["descripcion_anulacion"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["doc_cliente"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["nom_cliente"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["asesor"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["caja"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["forma_de_pago"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["total_venta_con_iva"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["doc_factura"]) . "</td>";
            echo "<td>";
            echo "<a href='anular_factura.php?no_factura=" . htmlspecialchars($fila['no_factura']) . "' class='btn btn-danger btn-sm'>VER FACTURA</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
    }
}

/**
 * Función para ejecutar consulta y mostrar resultados
 * @param mysqli $conexion - Objeto de conexión a la base de datos
 * @param string $sql - Consulta SQL a ejecutar
 * @param string $filtro - Descripción del filtro aplicado (opcional)
 * @return void
 */
function ejecutarConsultaYMostrar($conexion, $sql, $filtro = '') {
    $resultado = $conexion->query($sql);
    
    if ($filtro) {
        echo '<div class="alert alert-info">Filtro aplicado: ' . htmlspecialchars($filtro) . '</div>';
    }
    
    mostrarTablaFacturas($resultado);
}

// Variable para controlar si se debe cerrar la conexión al final
$cerrar_conexion = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Facturas</title>
    <!-- Script para confirmación de eliminación -->
    <script>
        function confirmar() {
            return confirm('¿Está seguro de eliminar el ítem seleccionado?');
        }
    </script>
    <!-- Estilos CSS -->
    <style>
        body {
            background-color: #f5f5dc; /* Fondo beige */
        }
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
    <!-- Bootstrap y Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Encabezado de la página -->
    <div class="container-fluid alert alert-info sombra mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Administración de Facturas <i class="fas fa-file-invoice-dollar"></i></h1>
            <div>
                <a href="inicio_admin.php" class="btn btn-dark btn-sm mr-2">Regresar</a>
                <span class="font-weight-bold">Usuario: <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
            </div>
        </div>
    </div>

    <!-- Botón de actualizar -->
    <div class="container-fluid mb-3">
        <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a>
    </div>
    
    <hr>
    
    <!-- Formularios de filtrado -->
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Filtrar por:</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Filtrado por fecha -->
                    <div class="col-md">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="fecha_factura">Fecha de Factura:</label>
                                <input type="date" id="fecha_factura" name="fecha_factura" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </form>
                    </div>
                    
                    <!-- Filtrado por número de factura -->
                    <div class="col-md">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="no_factura">Número de Factura:</label>
                                <input type="text" id="no_factura" name="no_factura" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </form>
                    </div>
                    
                    <!-- Filtrado por cédula de cliente -->
                    <div class="col-md">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="doc_cliente">Cédula de Cliente:</label>
                                <input type="text" id="doc_cliente" name="doc_cliente" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </form>
                    </div>
                    
                    <!-- Filtrado por estado -->
                    <div class="col-md">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="estado">Estado de Factura:</label>
                                <input type="text" id="estado" name="estado" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </form>
                    </div>
                    
                    <!-- Consultar todas las facturas -->
                    <div class="col-md">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="todos">Consultar todas las Facturas</label>
                                <br>
                                <button type="submit" name="consultar_todos" class="btn btn-primary mt-4">Consultar todas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    
    <!-- Sección de resultados -->
    <div class="container-fluid">
        <?php
        // Procesar formulario si se ha enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cerrar_conexion = true;
            
            // Filtro por fecha
            if (isset($_POST["fecha_factura"]) && !empty($_POST["fecha_factura"])) {
                $fecha_factura = $conexion->real_escape_string($_POST['fecha_factura']);
                $sql = "SELECT * FROM facturas WHERE DATE(fecha_factura) = '$fecha_factura'";
                ejecutarConsultaYMostrar($conexion, $sql, "Fecha: $fecha_factura");
            }
            
            // Filtro por número de factura
            elseif (isset($_POST["no_factura"]) && !empty($_POST["no_factura"])) {
                $no_factura = $conexion->real_escape_string($_POST['no_factura']);
                $sql = "SELECT * FROM facturas WHERE no_factura = '$no_factura'";
                ejecutarConsultaYMostrar($conexion, $sql, "Número de factura: $no_factura");
            }
            
            // Filtro por cédula de cliente
            elseif (isset($_POST["doc_cliente"]) && !empty($_POST["doc_cliente"])) {
                $doc_cliente = $conexion->real_escape_string($_POST['doc_cliente']);
                $sql = "SELECT * FROM facturas WHERE doc_cliente = '$doc_cliente'";
                ejecutarConsultaYMostrar($conexion, $sql, "Cédula del cliente: $doc_cliente");
            }
            
            // Filtro por estado
            elseif (isset($_POST["estado"]) && !empty($_POST["estado"])) {
                $estado = $conexion->real_escape_string($_POST['estado']);
                $sql = "SELECT * FROM facturas WHERE estado = '$estado'";
                ejecutarConsultaYMostrar($conexion, $sql, "Estado: $estado");
            }
            
            // Consultar todas las facturas
            elseif (isset($_POST["consultar_todos"])) {
                $sql = "SELECT * FROM facturas";
                ejecutarConsultaYMostrar($conexion, $sql, "Todas las facturas");
            }
        }
        
        // Cerrar la conexión si se ha ejecutado alguna consulta
        if ($cerrar_conexion && isset($conexion)) {
            $conexion->close();
        }
        ?>
    </div>

    <!-- Scripts de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>