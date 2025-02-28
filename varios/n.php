<?php
include("conexion.php");

// Realizar la consulta para obtener todas las filas que contienen el número más alto en la columna factura_venta
$sql_5 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
$sql_6 = "SELECT * FROM ventas WHERE factura_venta = (SELECT MAX(factura_venta) FROM ventas)";
$resultado_5 = mysqli_query($conexion, $sql_5);
$resultado_2 = mysqli_query($conexion, $sql_2);


    if (mysqli_num_rows($resultado_5) > 0 && mysqli_num_rows($resultado_6) > 0) {
        // Obtener la primera fila de resultados
        $fila_5 = mysqli_fetch_assoc($resultado_5);
        $fila_6 = mysqli_fetch_assoc($resultado_6);

       
        $no_factura = $fila_5['no_factura'];
        if ($fila_5['no_factura'] == $fila_6['factura_venta']) {
            // Si los valores son iguales
            header("Location: factura_borrador.php");
           
        } else {
            header("Location: nueva_venta.php");
             
        }
    } else {
        echo "No se encontraron filas con el número de factura más alto en la tabla ventas.";

} 
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
