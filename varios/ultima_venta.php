<?php
include ("conexion.php");
// Realizar la consulta para obtener todas las filas que contienen el número más alto en la columna factura_venta
$sql_2 = "SELECT * FROM ventas WHERE factura_venta = (SELECT MAX(factura_venta) FROM ventas)";
$resultado_2 = mysqli_query($conexion, $sql_2);

if ($resultado_2) {
    if (mysqli_num_rows($resultado_2) > 0) {
     
    }
}
?>