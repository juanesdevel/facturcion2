<?php
if(isset($_POST['submit'])){
    // Recoger datos del formulario
   
$factura_venta = $_POST['factura_venta'];
$nom_cliente = $_POST['nom_cliente'];
$doc_cliente_venta = $_POST['doc_cliente_venta'];
$valor_total_venta = $_POST['valor_total_venta'];
$caja = $_POST['caja'];
$asesor_venta = $_POST['asesor_venta'];
$forma_de_pago = $_POST['forma_de_pago'];
$producto_venta = $_POST['producto_venta'];
$valor_producto = $_POST['valor_producto'];


    include("conexion.php");

    $sql = "INSERT INTO ventas (factura_venta, nom_cliente, doc_cliente_venta, valor_total_venta, caja, asesor_venta, forma_de_pago, producto_venta, valor_producto,) 
        VALUES ('$factura_venta', '$nom_cliente', '$doc_cliente_venta', $valor_total_venta, '$caja','$asesor_venta' '$forma_de_pago', '$producto_venta', $valor_producto)";

        if ($conexion->query($sql) === TRUE) {
            echo '<script>alert("Datos guardados correctamente");location.assign("productos.php");</script>';
        } else {
            echo "<script> alert ('ERROR: Los datos no fueron ingresados a la base de datos'); location.assign ('productos.php'); </script>";
        }
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="factura_borrador.php">regresar</a>
</body>
</html>