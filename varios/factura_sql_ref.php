<?php
if (isset($_POST['buscar_referencia'])) {
    include 'conexion.php';
    $referencia = $_POST['buscar_referencia'];
    $sql = "SELECT * FROM productos WHERE ref_producto = '$referencia'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        echo $row['ref_producto']; 
        echo $row['descripcion_producto']; 
        echo $row['valor_producto'];

    } else {
        echo '<div class="alert alert-danger">No se encontraron resultados para la referencia ingresada.</div>';
    }
    $conexion->close();
}
?>

