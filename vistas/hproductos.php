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
    <title>Historial</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
           @media print {
            .no-print {
                display: none;
            }
        }
        </style>
</head>
<body>
<div class='container-fluid'>
<div class="alert alert-info"><h1>Historial de Cambios - Productos</h1> 
         <a href="historial.php"class="btn btn-dark">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div></div><hr> 

          <div class='container-fluid '>
             <button class='btn btn-info' onclick='imprimir()'>Imprimir</button>
             <a href='#' class='btn btn-primary' onclick='location.reload();'>Actualizar página</a> 
           </div>
           <hr> 
           <div class='container-fluid'>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input class="btn btn-success" type="submit" value="Descargar" name="backup">
        </form>
           </div></div><hr>
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
    if (isset($_POST["backup"])) {
        // Incluye el archivo de conexión
        include '../conexion/conexion.php';

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener los datos de la tabla 'auditoria_clientes'
        $consulta = "SELECT * FROM auditoria_productos";
        $resultado = $conexion->query($consulta);

        // Verificar si hay resultados
        if ($resultado && $resultado->num_rows > 0) {
            // Ruta del archivo (Asegúrate de usar doble barra invertida en Windows o usa "/" en vez de "\")
            $rutaArchivo = "C:/Users/Developer2024/Desktop/Backup/AuditTrail_Productos.txt";

            // Abrir un archivo en modo de escritura
            $archivo = fopen($rutaArchivo, "w");

            if ($archivo) {
                // Escribir los datos en el archivo
                while ($fila = $resultado->fetch_assoc()) {
                    // Implode separa los valores de cada fila con tabulaciones
                    $linea = implode("\t", $fila) . PHP_EOL;
                    fwrite($archivo, $linea);
                }

                // Cerrar el archivo
                fclose($archivo);
                echo '<script type="text/javascript">
    alert("Backup generado correctamente en: ' . $rutaArchivo . '");
</script>';

            } else {
                echo '<div class="alert alert-danger" role="alert">No se pudo abrir el archivo para escribir.</div>';

              
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No se encontraron datos en la tabla o error en la consulta.</div>';
           
        }

        // Cerrar la conexión
        $conexion->close();
    }
            }
            
?>
</div>
<section id="ref_producto">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["ref_producto"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $ref_producto = $_POST['ref_producto'];

            $sql = "SELECT * FROM auditoria_productos WHERE ref_producto = '$ref_producto'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {


                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' Resultados de la búsqueda: '. $ref_producto.'</div>';
               
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Producto</th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Descripción Producto</th>";
                echo "<th style='border: 1px solid #000;'>Categoría Producto</th>";
                echo "<th style='border: 1px solid #000;'>Valor Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Producto</th>";
                echo "<th style='border: 1px solid #000;'>Accion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha de cambio</th>";
                echo "<th style='border: 1px solid #000;'>Detalles</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["cat_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["accion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["detalles"] . "</td>";
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
    </div>
</section>

<section id="todos">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
        include '../conexion/conexion.php';

            $sql = "SELECT * FROM auditoria_productos";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {

                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' Resultados de la búsqueda</div>';
                

                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Producto</th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Descripción Producto</th>";
                echo "<th style='border: 1px solid #000;'>Categoría Producto</th>";
                echo "<th style='border: 1px solid #000;'>Valor Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Producto</th>";
                echo "<th style='border: 1px solid #000;'>Accion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha de cambio</th>";
                echo "<th style='border: 1px solid #000;'>Detalles</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["cat_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["accion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["detalles"] . "</td>";
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

<script>
     function imprimir() {
        window.print(); // Imprimir la pantalla
    }
</script>