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
    <title>Administracion de usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>function confirmar(){
        return confirm ('¿Esta seguro de elimininar el item seleccionado?')}
    
    </script>
     
    
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <style>
     .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        </style>

</head>
<body>

    <div class= " container-fluid alert alert-danger sombra"><h1>Devoluciones <i class="fas fa-exchange-alt"></i>
</h1> <a href="ventas.php"class="btn btn-dark btn-sm">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?> </div>
    
<hr>

<div class="container-fluid">

<a href="#" class="btn btn-primary"onclick="location.reload();">Actualizar página</a> 

</div>
  
  </div>
</div><hr>



<div class="container-fluid">
         <div class=" alert alert-danger">
         <h5>Filtrar por:</h5>
    <div class="row">
        <div class="col">
        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="fecha_venta">Fecha de Devolución:</label><br>
                <input type="date" id="fecha_venta" name="fecha_venta"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="factura_venta">Número de Factura:</label><br>
                <input type="text" id="factura_venta" name="factura_venta_consulta"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="cedula_cliente">Cédula de Cliente:</label><br>
                <input type="text" id="cedula_cliente" name="cedula_cliente_consulta"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="ref_producto">Referencia de producto:</label><br>
                <input type="text" id="ref_producto" name="ref_producto"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="todos">Consultar todas las Devoluciones</label><br>
    <input type="submit" value="Consultar" name="consultar_todos">
</form>
        </div>
        </div>
        </div>
    </div>
</div>

<hr>

<!-- // seccion de devoluciones// -->
<div class="container-fluid">

<section id="porFactura">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["factura_venta_consulta"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $factura_venta = $_POST['factura_venta_consulta'];

            $sql = "SELECT * FROM devoluciones WHERE factura_devo = '$factura_venta'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo "<h4>$num_filas Resultados de la Devolución por Factura No: $factura_venta </h4>";
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Devolicion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Usuario Devolucion</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Id de Venta </th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Tipo de Devolucion Venta</th>";
                echo "<th style='border: 1px solid #000;'>Descripción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_devolucion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["usuario_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_pro"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["tipo_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_devo"] . "</td>";
                                      
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron Devoluciones para la Factura especificada!.</div>';

            }
            $conexion->close();
        }
    }
    ?>
</section>
</div>
<div class="container-fluid">
<section id="porCedula">

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["cedula_cliente_consulta"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $cedula_cliente = $_POST['cedula_cliente_consulta'];

            $sql = "SELECT * FROM devoluciones WHERE doc_cliente_devo = '$cedula_cliente'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo "<h4>$num_filas Resultados de la búsqueda por Documento No: $cedula_cliente </h4>";
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Devolicion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Usuario Devolucion</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Id de Venta </th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Tipo de Devolucion Venta</th>";
                echo "<th style='border: 1px solid #000;'>Descripción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_devolucion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["usuario_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_pro"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["tipo_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_devo"] . "</td>";
                                      
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron Devoluciones para la Cedula especificada!.</h5></div>';

            }
            $conexion->close();
        }
    }
    ?>
</section>
</div>

<div class="container-fluid">

<section id="porReferencia">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["ref_producto"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $ref_producto = $_POST['ref_producto'];

            $sql = "SELECT * FROM devoluciones WHERE ref_producto = '$ref_producto'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo "<h3>$num_filas Resultados de la búsqueda por Referencia: $ref_producto</h3>";
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Devolicion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Usuario Devolucion</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Id de Venta </th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Tipo de Devolucion Venta</th>";
                echo "<th style='border: 1px solid #000;'>Descripción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_devolucion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["usuario_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_pro"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["tipo_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_devo"] . "</td>";
                                      
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron Devoluciones para la Referencia especificada!.</h5></div>';

            }
            $conexion->close();
        }
    }
    ?>
</section>
</div>


<div class="container-fluid">

<section id="porFecha">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["fecha_venta"])) { // Verifica si el campo específico está presente
            include '../conexion/conexion.php';

            $fecha_venta = $_POST['fecha_venta'];

            $sql = "SELECT * FROM devoluciones WHERE DATE(fecha_devo) = '$fecha_venta'";

            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo "<h3>$num_filas Resultados de la búsqueda por Fecha: $fecha_venta</h3>";
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Devolicion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Usuario Devolucion</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Id de Venta </th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Tipo de Devolucion Venta</th>";
                echo "<th style='border: 1px solid #000;'>Descripción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_devolucion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["usuario_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_pro"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["tipo_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_devo"] . "</td>";
                                      
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron Devoluciones para la Fecha especificada!.</h5></div>';

            }
            $conexion->close();
        }
    }
    ?>
</section>
</div>

<div class="container-fluid">

<section id="todos">

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
         // Verifica si el campo específico está presente
         include '../conexion/conexion.php';
         
            $sql = "SELECT * FROM devoluciones";

            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo "<h4>$num_filas Resultados de la búsqueda </h4>";
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
                echo "<tr style='border: 1px solid #000;'>";
                echo "<th style='border: 1px solid #000;'>ID Devolicion</th>";
                echo "<th style='border: 1px solid #000;'>Fecha Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Asesor Usuario Devolucion</th>";
                echo "<th style='border: 1px solid #000;'>Documento Cliente</th>";
                echo "<th style='border: 1px solid #000;'>Id de Venta </th>";
                echo "<th style='border: 1px solid #000;'>Referencia Producto</th>";
                echo "<th style='border: 1px solid #000;'>Unidades Venta</th>";
                echo "<th style='border: 1px solid #000;'>Factura Devolución</th>";
                echo "<th style='border: 1px solid #000;'>Valor Total Venta</th>";
                echo "<th style='border: 1px solid #000;'>Tipo de Devolucion Venta</th>";
                echo "<th style='border: 1px solid #000;'>Descripción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr style='border: 1px solid #000;'>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_devolucion"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["fecha_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["usuario_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["doc_cliente_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["id_venta"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["ref_producto"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["unidades_pro"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["factura_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["valor_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["tipo_devo"] . "</td>";
                    echo "<td style='border: 1px solid #000;'>" . $fila["descripcion_devo"] . "</td>";
                                      
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron Devoluciones!.</h5></div>';

            }
            $conexion->close();
        }
    
    ?>
</section>
</div>




</body>
</html>