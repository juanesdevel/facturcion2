
        

      <?php
if (isset($_POST['documento'])) {
    include 'conexion.php';
    $documento = $_POST['documento'];
    $sql = "SELECT * FROM clientes WHERE doc_cliente = '$documento'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
?>
        <form id="formulario_cliente">
        <input type="hidden" id="documento_cliente" value="<?php echo $row['doc_cliente']; ?>">
            <input type="hidden" id="nombre_cliente" value="<?php echo $row['nom_cliente']; ?>">
            <input type="hidden" id="direccion_cliente" value="<?php echo $row['direccion_cliente']; ?>">
            <input type="hidden" id="cel1_cliente" value="<?php echo $row['cel1_cliente']; ?>">
            <input type="hidden" id="correo_cliente" value="<?php echo $row['correo_cliente']; ?>">
        </form>
        <div id="datos_cliente">
            <span class="doc_cliente"><?php echo $row['doc_cliente']; ?></span>
            <span class="nombre_cliente"><?php echo $row['nom_cliente']; ?></span>
            <span class="direccion_cliente"><?php echo $row['direccion_cliente']; ?></span>
            <span class="cel1_cliente"><?php echo $row['cel1_cliente']; ?></span>
            <span class="correo_cliente"><?php echo $row['correo_cliente']; ?></span>
        </div>
<?php
    } else {
        echo '<div class="alert alert-danger">No se encontraron resultados para el número de documento ingresado.</div>';
    }
    $conexion->close();
}
?>

        


