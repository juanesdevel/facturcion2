<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
if(isset($_POST['submit'])){
// Recoger datos del formulario
$nom_cliente = $_POST['nom_cliente'];
$doc_cliente = $_POST['doc_cliente'];
$cel1_cliente = $_POST['cel1_cliente'];
$cel2_cliente = $_POST['cel2_cliente'];
$direccion_cliente = $_POST['direccion_cliente'];
$correo_cliente = $_POST['correo_cliente'];

include ("conexion.php");
// SQL para insertar los datos en la tabla usuarios
$sql_insertar = "INSERT INTO clientes (nom_cliente, doc_cliente, cel1_cliente, cel2_cliente, direccion_cliente, correo_cliente) VALUES ('$nom_cliente', '$doc_cliente', '$cel1_cliente', '$cel2_cliente', '$direccion_cliente', '$correo_cliente')";

if ($conexion->query($sql_insertar) === TRUE) {
    echo '<script>alert("Datos guardados correctamente");location.assign("factura_borrador.php");</script>';
} else {
    echo "<script> alert ('ERROR: Los datos no fueron ingresados a la base de datos'); location.assign ('factura_borrador.php'); </script>";
}

// Cerrar conexión
$conexion->close();
}else{

?>
<body>
    <div class="alert alert-info">
    <h3>CREAR CLIENTE</h3>
    <a href="factura_borrador.php">Regresar</a>
    </div>
    <br><br>

    <section>
 
    
    <div class="container mt-5">
  <form id="formulario" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <div class="form-group">
      <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" placeholder="ID Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="nom_cliente">Nombre Cliente:</label>
      <input type="text" class="form-control" id="nom_cliente" name="nom_cliente" placeholder="Nombre Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="doc_cliente">Documento Cliente:</label>
      <input type="text" class="form-control" id="doc_cliente" name="doc_cliente" placeholder="Documento Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="cel1_cliente">Celular 1 Cliente:</label>
      <input type="text" class="form-control" id="cel1_cliente" name="cel1_cliente" placeholder="Celular 1 Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="cel2_cliente">Celular 2 Cliente:</label>
      <input type="text" class="form-control" id="cel2_cliente" name="cel2_cliente" placeholder="Celular 2 Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="direccion_cliente">Dirección Cliente:</label>
      <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Dirección Cliente" autocomplete="off">
    </div>
    
    <div class="form-group">
      <label for="correo_cliente">Correo Cliente:</label>
      <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="Correo Cliente" autocomplete="off">
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit" onclick="return validarCampos() && confirmarCreacion();">Crear Cliente</button>
    <button type="button" class="btn btn-secondary" onclick="confirmacionBorrardatos(); borrarDatos()">Limpiar</button>
  </form>
</div>


                <?php
                }
                ?>
<script>
  function saludo () {
    alert ("hola");
  }
  function validarCampos() {
    var nombreUsuario = document.getElementById("nombreUsuario").value;
    var codigoUsuario = document.getElementById("codigoUsuario").value;
    var password = document.getElementById("password").value;

        if (nombreUsuario === "" || codigoUsuario === "" || password === "") {
            alert("Debe llenar todos los campos.");
            return false; // Evita que el formulario se envíe si hay campos vacíos
        }
        return true; // Permite que el formulario se envíe si todos los campos están llenos
      }
      
function borrarDatos() {
        document.getElementById("formulario").reset();
}
     
    function confirmacionBorrardatos() {
        return confirm("¿Estás seguro que desea limpiar el formulario?");
        }
        function confirmarCreacion() {
         return confirm("¿Estás seguro de crear el nuevo usuario?");
          }
          

</script>
    </section>

</body>
</html>

