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
    <div class="container-fluid">
<div class="alert alert-info"><h1>Historial de Cambios - Usuarios</h1> 
         <a href="historial.php"class="btn btn-dark">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div><hr>

        
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
                <label for="codigo_usuario">Codigo Usuario:</label><br>
                <input type="text" id="codigo_usuario" name="codigo_usuario"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="todos">Consultar todos los Usuarios</label><br>
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
        $consulta = "SELECT * FROM auditoria_usuarios";
        $resultado = $conexion->query($consulta);

        // Verificar si hay resultados
        if ($resultado && $resultado->num_rows > 0) {
            // Ruta del archivo (Asegúrate de usar doble barra invertida en Windows o usa "/" en vez de "\")
            $rutaArchivo = "C:/Users/Developer2024/Desktop/Backup/AuditTrail_Usuarios.txt";

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
<section id="codigo_usuario">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["codigo_usuario"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $codigo_usuario = $_POST['codigo_usuario'];

            $sql = "SELECT * FROM auditoria_usuarios WHERE codigo_usuario = '$codigo_usuario'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {

                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' Resultados de la búsqueda: '. $codigo_usuario.'</div>';
               
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
echo "<tr style='border: 1px solid #000;'>";
echo "<th style='border: 1px solid #000;'>ID Usuario</th>";
echo "<th style='border: 1px solid #000;'>Código Usuario</th>";
echo "<th style='border: 1px solid #000;'>Rol Usuario</th>";
echo "<th style='border: 1px solid #000;'>Nombre Usuario</th>";
echo "<th style='border: 1px solid #000;'>Contraseña Usuario</th>";
echo "<th style='border: 1px solid #000;'>Accion</th>";
echo "<th style='border: 1px solid #000;'>Fecha de cambio</th>";
echo "<th style='border: 1px solid #000;'>Detalles</th>";
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr style='border: 1px solid #000;'>";
    echo "<td style='border: 1px solid #000;'>" . $fila["id_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["codigo_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["rol_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["nombre_usuario"] . "</td>";
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
<section id="usuarios">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
        include '../conexion/conexion.php';
            
            $sql = "SELECT * FROM auditoria_usuarios";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' Resultados de la búsqueda</div>';
                    
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
echo "<tr style='border: 1px solid #000;'>";
echo "<th style='border: 1px solid #000;'>ID Usuario</th>";
echo "<th style='border: 1px solid #000;'>Código Usuario</th>";
echo "<th style='border: 1px solid #000;'>Rol Usuario</th>";
echo "<th style='border: 1px solid #000;'>Nombre Usuario</th>";
echo "<th style='border: 1px solid #000;'>Accion</th>";
echo "<th style='border: 1px solid #000;'>Fecha de cambio</th>";
echo "<th style='border: 1px solid #000;'>Detalles</th>";
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr style='border: 1px solid #000;'>";
    echo "<td style='border: 1px solid #000;'>" . $fila["id_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["codigo_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["rol_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["nombre_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["accion"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["fecha"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["detalles"] . "</td>";
    echo "</tr>";

              }
                echo "</table>";
            } else {
                echo "No se encontraron usuarios.";
            }
            $conexion->close();
        }
    
    
    ?>
    </div>
</section>



</body>
</html>

<script>
     function imprimir() {
        window.print(); // Imprimir la pantalla
    }
</script>