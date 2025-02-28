<?php
$id_venta=$_GET['id_venta'];

include ("conexion.php");

$sql="SELECT * from ventas where id_venta='$id_venta'";
$resultado=mysqli_query($conexion,$sql);
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $ref_producto = $row['ref_prod_venta']; 
    $producto_venta = $row['producto_venta'];
    $valor_producto = $row['valor_producto'];
    $unidades_venta = $row['unidades_venta'];

    $sql_2="SELECT * from productos where ref_producto = '$ref_producto'";
    $resultado_2=mysqli_query($conexion,$sql_2);
    if ($resultado_2->num_rows > 0){
        $row2 = $resultado_2->fetch_assoc();
        $unidades_producto = $row2['unidades_producto'];
        $nuevo_stock = $unidades_venta + $unidades_producto;

        $sql_3="UPDATE productos SET descripcion_producto='$producto_venta', valor_producto='$valor_producto', unidades_producto='$nuevo_stock' WHERE ref_producto='$ref_producto'";

        $resultado_3=mysqli_query($conexion,$sql_3);
        if($resultado_3){
            $sql_4="DELETE from ventas where id_venta='$id_venta'";
            $resultado_4=mysqli_query($conexion,$sql_4);
            if ($resultado_4){
    include '../conexion/conexion.php';

// Realizar la consulta para obtener todas las filas que contienen el número más alto en la columna factura_venta
$sql_5 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
$sql_6 = "SELECT * FROM ventas WHERE factura_venta = (SELECT MAX(factura_venta) FROM ventas)";
$resultado_5 = mysqli_query($conexion, $sql_5);
$resultado_6 = mysqli_query($conexion, $sql_6);


    if (mysqli_num_rows($resultado_5) > 0 && mysqli_num_rows($resultado_6) > 0) {
        // Obtener la primera fila de resultados
        $fila_5 = mysqli_fetch_assoc($resultado_5);
        $fila_6 = mysqli_fetch_assoc($resultado_6);

       
        $no_factura = $fila_5['no_factura'];
        if ($fila_5['no_factura'] == $fila_6['factura_venta']) {
            // Si los valores son iguales
            header("Location: factura_borrador_2.php");
           
        } else {
            header("Location: nueva_venta_2.php");
             
        }
    } else {
        echo "No se encontraron filas con el número de factura más alto en la tabla ventas.";

} 


            }
        }   

    } else {
        echo "Error en la consulta: " . $conexion->error;
    }
}
mysqli_close($conexion);
?>
