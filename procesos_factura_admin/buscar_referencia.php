<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';
$ref_producto = $_POST['ref_prod_venta'];

// Consultar el nombre del cliente en la base de datos
$sql = "SELECT ref_producto, descripcion_producto, valor_producto, unidades_producto,cat_producto FROM productos WHERE ref_producto = '$ref_producto'";
$resultado = $conexion->query($sql);

// Verificar si se encontró el producto
if ($resultado->num_rows > 0) {
    // Obtener los datos del producto
    $row = $resultado->fetch_assoc();
    $descripcion_producto = $row['descripcion_producto'];
    $valor_producto = $row['valor_producto'];
    $unidades_producto = $row['unidades_producto'];
    $ref_producto = $row['ref_producto'];
    $cat_producto = $row['cat_producto'];
    // Devolver los datos del producto como respuesta en formato JSON
    echo json_encode(array("descripcion_producto" => $descripcion_producto, "valor_producto" => $valor_producto, "unidades_producto" => $unidades_producto, "ref_producto" => $ref_producto, "cat_producto" => $cat_producto));
} else {
    // Si no se encontró el producto, devolver un mensaje de error
    echo json_encode(array("error" => "Producto no encontrado"));
}

$conexion->close();
?>
