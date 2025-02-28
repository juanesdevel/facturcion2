<?php
//seguridad de sesion
include '../conexion/conexion.php';
include '../conexion/sesion.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de clientes en factura</title>
    <!DOCTYPE html>
<html>
<head>
    <!-- Script para confirmar la eliminación de usuarios -->
    <script>
    /**
     * Función que muestra un cuadro de diálogo de confirmación
     * @return {boolean} True si el usuario confirma, False si cancela
     */
    function confirmar(){
        return confirm('¿Esta seguro de elimininar el usuario de la base de datos?');
    }
    </script>
    
    <!-- Estilos CSS personalizados -->
    <style>
        /* CSS para establecer el color de fondo de la página */
        body {
            background-color: #f5f5dc; /* Color beige claro (similar a "bisque") */
        }
    </style>
    
    <!-- Importación de la biblioteca Bootstrap para estilos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Importación de jQuery para funcionalidades JavaScript -->
    <script src="librerias/jquery-3.2.1.min.js"></script>
</head>
<body>
    <!-- Encabezado de la página con título y botón de retorno -->
    <div class="container-fluid">
        <div class="alert alert-info">
            <h2>Administracion de clientes en factura</h2> 
            <a href="factura_borrador.php" class="btn btn-dark">Regresar</a>
            <span> </span>
            <?php echo "Usuario: ".$_SESSION['usuario']; // Muestra el nombre del usuario actual de la sesión ?>
        </div>
    </div>
    <hr>
    
    <!-- Sección de botones de acción principal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p>
                    <!-- Botones para crear cliente y nueva factura -->
                    <a class="btn btn-primary" href="nuevo_cliente_factura.php">Crear Cliente</a>
                    <a href="factura_borrador.php" class="btn btn-success">Nueva Factura</a>
                </p>
            </div>
        </div>
    </div>
    <hr>
    
    <!-- Sección de búsqueda de clientes -->
    <section id="buscar">
        <div class="container-fluid">
            <div class="alert alert-info">
                <h5>Filtrar por:</h5>
                <!-- Formulario de búsqueda que se envía a sí mismo -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" placeholder="Documento Cliente" id="doc_cliente" name="doc_cliente">
                    <input type="submit" value="Consultar"> 
                </form>
            </div>
            <hr>
        </div>
        
        <!-- Sección de resultados de la búsqueda -->
        <div class="container-fluid">
            <?php
            // Procesa el formulario solo cuando se envía mediante POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verifica si se ha proporcionado el campo de documento del cliente
                if (isset($_POST["doc_cliente"])) {
                    // Obtiene el valor del documento del cliente
                    $doc_cliente = $_POST['doc_cliente'];
                    
                    // Consulta SQL para buscar clientes por número de documento
                    $sql = "SELECT * FROM clientes WHERE doc_cliente = '$doc_cliente'";
                    $resultado_2 = $conexion->query($sql);
                    $num_filas = $resultado_2->num_rows;
                    
                    // Verifica si se encontraron resultados
                    if ($resultado_2->num_rows > 0) {
                        // Muestra mensaje con la cantidad de resultados encontrados
                        echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '.$doc_cliente.'</div>';
                        
                        // Crea la tabla con los resultados
                        echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                        echo "<tr style='border: 1px solid #000;'>";
                        echo "<th style='border: 1px solid #000;'>ID Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Nombre Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Celular 1 Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Celular 2 Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Dirección Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Correo Cliente</th>";
                        echo "<th style='border: 1px solid #000;'>Acciones</th>";
                        echo "</tr>";
                        
                        // Recorre cada fila de resultados y la muestra en la tabla
                        while ($fila = $resultado_2->fetch_assoc()) {
                            echo "<tr style='border: 1px solid #000;'>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["id_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["nom_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["cel1_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["cel2_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["direccion_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>" . $fila["correo_cliente"] . "</td>";
                            echo "<td style='border: 1px solid #000;'>";
                            // Botón para actualizar datos del cliente
                            echo "<a href='editar_cliente_factura.php?id_cliente=" . $fila['id_cliente'] . "' class='btn btn-primary'>ACTUALIZAR</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        // Mensaje cuando no se encuentran resultados
                        echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
                    }
                    // Cierra la conexión a la base de datos
                    $conexion->close();
                }
            }
            ?>
        </div>
    </section>
</body>
</html>

<script>
        function copiarTexto() {
            // Obtener el elemento de entrada
            var campo = document.getElementById("doc_cliente");
            
            // Seleccionar el texto dentro del campo
            campo.select();
            
            // Copiar el texto seleccionado al portapapeles
            document.execCommand("copy");
            
            // Deseleccionar el texto
            window.getSelection().removeAllRanges();
        }
    </script>