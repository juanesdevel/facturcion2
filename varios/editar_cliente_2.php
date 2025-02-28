<?php
include ("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
if(isset($_POST['submit'])){
    $id_cliente = $_POST['idCliente'];
    $nom_cliente = $_POST['nom_cliente'];
    $doc_cliente = $_POST['doc_cliente'];
    $cel1_cliente = $_POST['cel1_cliente'];
    $cel2_cliente = $_POST['cel2_cliente'];
    $direccion_cliente = $_POST['direccion_cliente'];
    $correo_cliente = $_POST['correo_cliente'];

    $sql = "UPDATE clientes SET nom_cliente='$nom_cliente', doc_cliente='$doc_cliente', cel1_cliente='$cel1_cliente', cel2_cliente='$cel2_cliente', direccion_cliente='$direccion_cliente', correo_cliente='$correo_cliente' WHERE id_cliente='$id_cliente'";

    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        echo "<script> alert ('Los datos fueron actualizados en la base de datos correctamente'); location.assign ('factura_borrador.php'); </script>";
    } else {
        echo "<script> alert ('ERROR: Los datos no fueron actualizados en la base de datos'); location.assign ('consulta_cliente_1.php'); </script>";
    }
// Cerrar conexión
mysqli_close($conexion);

}

    else{
        $id_cliente = $_GET['id_cliente'];
        $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);
        $nom_cliente = $fila["nom_cliente"];
        $doc_cliente = $fila["doc_cliente"];
        $cel1_cliente = $fila["cel1_cliente"];
        $cel2_cliente = $fila["cel2_cliente"];
        $direccion_cliente = $fila["direccion_cliente"];
        $correo_cliente = $fila["correo_cliente"];
        mysqli_close($conexion);
        
    ?>

<div class="container mt-4">
    <div class="alert alert-info"><h3 class="mb-0">EDITAR CLIENTE</h3> <a href="consulta_cliente_1.php" class="btn btn-dark mb-3">Regresar</a></div>
   

    <form id="formulario" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <label for="nom_cliente">Nombre de Cliente:</label>
            <input type="text" class="form-control" id="nom_cliente" name="nom_cliente" value="<?php echo $nom_cliente; ?>">
        </div>

        <div class="form-group">
            <label for="doc_cliente">Documento de Cliente:</label>
            <input type="text" class="form-control" id="doc_cliente" name="doc_cliente" value="<?php echo $doc_cliente; ?>">
        </div>

        <div class="form-group">
            <label for="cel1_cliente">Celular 1 de Cliente:</label>
            <input type="text" class="form-control" id="cel1_cliente" name="cel1_cliente" value="<?php echo $cel1_cliente; ?>">
        </div>

        <div class="form-group">
            <label for="cel2_cliente">Celular 2 de Cliente:</label>
            <input type="text" class="form-control" id="cel2_cliente" name="cel2_cliente" value="<?php echo $cel2_cliente; ?>">
        </div>

        <div class="form-group">
            <label for="direccion_cliente">Dirección de Cliente:</label>
            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" value="<?php echo $direccion_cliente; ?>">
        </div>

        <div class="form-group">
            <label for="correo_cliente">Correo de Cliente:</label>
            <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" value="<?php echo $correo_cliente; ?>">
        </div>

        <input type="hidden" name="idCliente" value="<?php echo $id_cliente; ?>">

        <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
                  
                  <?php
                  }
                  ?>
</body>
</html>