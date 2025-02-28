<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Ventas
</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container-fluid alert alert-info sombra">
    <h1>Administración de Ventas  <i class="fas fa-dollar-sign"></i></h1> <a href="inicio_admin.php"class="btn btn-dark btn-sm">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?> </div>
    


<div class="container-fluid">

      <p>
        <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
        <a href="devoluciones.php" class="btn btn-danger">Ver Devoluciones</a>
      </p>
    
</div><hr>
<div class="container-fluid">
         <div class=" alert alert-info">
         <h5>Filtrar por:</h5>
    <div class="row">
        <div class="col">
        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="fecha_venta">Fecha de Venta:</label><br>
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
                <label for="estado">Estado:</label><br>
                <input type="text" id="estado" name="estado"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="todos">Consultar todas las ventas</label><br>
    <input type="submit" value="Consultar" name="consultar_todos">
</form>
        </div>
        </div>
        </div>
    </div>
</div>

<hr>
         
<div class="container-fluid">

<section id="porFactura">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["factura_venta_consulta"])) { // Verifica si el campo específico está presente
include '../conexion/conexion.php';

            $factura_venta = $_POST['factura_venta_consulta'];

            $sql = "SELECT * FROM ventas WHERE factura_venta = '$factura_venta'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '. $factura_venta .'</div>';
            
                echo "<table class='table table-bordered table-striped'style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
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
                echo "<th style='border: 1px solid #000;'>Accion</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
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
                    echo "<td style='border: 1px solid #000;'>";
                    if($fila["estado"]=="Realizada"){
                        echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
                   
                    }
                    echo "</td>";
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
</section>
</div>

<div class="container-fluid">
<section id="porCedula">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["cedula_cliente_consulta"])) { // Verifica si el campo específico está presente
include '../conexion/conexion.php';

            $cedula_cliente = $_POST['cedula_cliente_consulta'];

            $sql = "SELECT * FROM ventas WHERE doc_cliente_venta = '$cedula_cliente'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '. $cedula_cliente .'</div>';

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
                echo "<th style='border: 1px solid #000;'>Acción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
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
                    echo "<td style='border: 1px solid #000;'>";
                    if($fila["estado"]=="Realizada"){
                        echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
                                       }
                    echo "</td>";
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
</section>

</div>

<div class="container-fluid">

<section id="porReferencia">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["ref_producto"])) { // Verifica si el campo específico está presente
include '../conexion/conexion.php';

            $ref_producto = $_POST['ref_producto'];

            $sql = "SELECT * FROM ventas WHERE ref_prod_venta = '$ref_producto'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '. $ref_producto .'</div>';

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
                echo "<th style='border: 1px solid #000;'>Acción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
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
                    echo "<td style='border: 1px solid #000;'>";
                    if($fila["estado"]=="Realizada"){
                        echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
                                       }
                    echo "</td>";
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
</section>
</div>


<div class="container-fluid">

<section id="porFecha">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["fecha_venta"])) { // Verifica si el campo específico está presente
include '../conexion/conexion.php';

            $fecha_venta = $_POST['fecha_venta'];

            $sql = "SELECT * FROM ventas WHERE DATE(fecha_hora_venta) = '$fecha_venta'";

            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '. $fecha_venta .'</div>';

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
                echo "<th style='border: 1px solid #000;'>Acción</th>";
                echo "</tr>";
                
                while ($fila = $resultado->fetch_assoc()) {
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
                    echo "<td style='border: 1px solid #000;'>";
                    if($fila["estado"]=="Realizada"){
                        echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
                                       }
                    echo "</td>";
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
</section>
</div>

<div class="container-fluid">

<section id="todos">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
    // Verifica si el campo específico está presente
    include '../conexion/conexion.php';
   
    // Consulta SQL para sumar la columna 'valor_total_venta' en la tabla 'ventas'
    $sql = "SELECT SUM(valor_total_venta) AS total_ventas FROM ventas";
    $resultado = $conexion->query($sql);
    
    // Verificar si se obtuvo un resultado
    if ($resultado->num_rows > 0) {
        // Obtener el valor total de las ventas
        $fila = $resultado->fetch_assoc();
        $totalVentas = $fila['total_ventas'];
        
        // Mostrar el valor total de las ventas
        echo '<div class="alert alert-success" role="alert">';
        echo 'El valor total de las ventas es: $' . number_format($totalVentas, 0);
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning" role="alert">';
        echo "No se encontraron registros en la tabla de ventas.";
        echo '</div>';
    }

    $sql = "SELECT * FROM ventas";

    $resultado = $conexion->query($sql);
    $num_filas = $resultado->num_rows;
  
    if ($resultado->num_rows > 0) {
        
        echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda</div>';
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
        echo "<th style='border: 1px solid #000;'>Acción</th>";
        echo "</tr>";
        
        $suma_total = 0; // Inicializa la suma total
        
        while ($fila = $resultado->fetch_assoc()) {
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
            echo "<td style='border: 1px solid #000;'>";
            if($fila["estado"]=="Realizada"){
                echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
            }
            echo "</td>";
            echo "</tr>";
            
            $suma_total += floatval($fila["valor_total_venta"]); // Suma el valor total de la venta
        }
        
        // Agregar fila para la suma total
        echo "<tr style='border: 1px solid #000;'>";
        echo "<td colspan='5' style='border: 1px solid #000; text-align: right;'><strong>Suma Total:</strong></td>";
        echo "<td style='border: 1px solid #000;'><strong>" . number_format($suma_total, 2) . "</strong></td>";
        echo "<td colspan='9' style='border: 1px solid #000;'></td>";
        echo "</tr>";
        
        echo "</table>";
    } else {
        echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
    }
    $conexion->close();
}
?>  </section>
</div>
<section id="porEstado">
<div class="container-fluid">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["estado"])) { // Verifica si el campo específico está presente
        include '../conexion/conexion.php';

        $estado = $_POST['estado'];

        $sql = "SELECT * FROM ventas WHERE estado = '$estado'";
        $resultado = $conexion->query($sql);
        $num_filas = $resultado->num_rows;
        if ($resultado->num_rows > 0) {
            echo '<div class="alert alert-success" role="alert">'. $num_filas .' resultados de la búsqueda: ' . $estado  . ' </div>';

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
            echo "<th style='border: 1px solid #000;'>Acción</th>";
            echo "</tr>";
            $suma_total = 0; // Inicializa la suma total

            while ($fila = $resultado->fetch_assoc()) {
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
                echo "<td style='border: 1px solid #000;'>";
                if($fila["estado"]=="Realizada"){
                    echo "<a href='devo_venta.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' '>DEVOLUCION</a>";
                }
                echo "</td>";
                echo "</tr>";
                $suma_total += floatval($fila["valor_total_venta"]); // Suma el valor total de la venta
            }
            // Agregar fila para la suma total
            echo "<tr style='border: 1px solid #000;'>";
            echo "<td colspan='5' style='border: 1px solid #000; text-align: right;'><strong>Suma Total:</strong></td>";
            echo "<td style='border: 1px solid #000;'><strong>" . number_format($suma_total, 2) . "</strong></td>";
            echo "<td colspan='9' style='border: 1px solid #000;'></td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
        }
        $conexion->close();
    }
}
?>    </div>
</section>        

</body>
</html>
<script>
    // Al cargar la página, suma los valores de la columna "Valor Total Venta"
    document.addEventListener("DOMContentLoaded", function() {
        const valores = document.querySelectorAll('.valor-venta');
        let suma = 0;
        
        valores.forEach(valor => {
            suma += parseFloat(valor.textContent) || 0; // Suma los valores
        });
        
        document.getElementById('suma-total').textContent = suma.toFixed(2); // Muestra la suma con 2 decimales
    });
    
