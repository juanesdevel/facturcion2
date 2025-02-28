<?php
//seguridad de sesion
session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion == null || $varsesion == '') {
    echo "No tiene Acceso";
    die();
}
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de usuarios</title>
        <style>
        /* CSS para cambiar el color de fondo */
        body {
            background-color: #f5f5dc; /* Cambia #f0f0f0 por el color deseado */
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="alert alert-info">
    <h3>ANULAR FACTURA</h3>
</div>
<a href="Facturas.php">Regresar</a><br><br>
<span></span>
<?php
// Obtener datos del formulario si no se ha enviado
if(!isset($_POST['no_factura'])) {
    $no_factura = $_GET['no_factura'];

    $sql = "SELECT * FROM ventas WHERE factura_venta = '$no_factura'";
    $resultado = mysqli_query($conexion, $sql);
    $num_filas = mysqli_num_rows($resultado);

    if ($num_filas > 0) {
        echo "<h3>$num_filas Ventas para la Factura <span>$no_factura</span></h3>";
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
        echo "<th style='border: 1px solid #000;'>Acciones</th>";
        echo "</tr>";
        
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
            echo "<td style='border: 1px solid #000;'>";
            echo "<a href='devo_venta_2.php?id_venta=" . $fila['id_venta'] . "' class='btn btn-danger' onclick='return confirmar()'>DEVOLUCION</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados para la factura de venta especificada.";
    }
    mysqli_close($conexion);
}
?>

</body>
</html>
