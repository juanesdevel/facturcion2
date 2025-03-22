<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';
$doc_cliente_venta = $_POST['doc_cliente_venta'];


// Consultar el nombre del cliente en la base de datos
$sql = "SELECT nom_cliente, doc_cliente FROM clientes WHERE doc_cliente = '$doc_cliente_venta'";
$resultado = $conexion->query($sql);

// Verificar si se encontró el cliente
if ($resultado->num_rows > 0) {
    // Obtener el nombre del cliente
    $row = $resultado->fetch_assoc();
    $nom_cliente = $row['nom_cliente'];
     $doc_cliente = $row['doc_cliente'];
    // Devolver el nombre del cliente como respuesta
    echo json_encode(array("nom_cliente" => $nom_cliente, "doc_cliente" =>  $doc_cliente));
} else {
    // Si no se encontró el Cliente, devolver un mensaje de error
    echo json_encode(array("error" => "Cliente no encontrado"));
}



$conexion->close();
?>
