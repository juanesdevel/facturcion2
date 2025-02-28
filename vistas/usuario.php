<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>function confirmar(){
        return confirm ('¿Esta seguro de elimininar el usuario de la base de datos?')}
    
    </script>
     <style>
     .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        </style>
 	
</head>
<body>
<?php

$sql="SELECT * from usuarios";
$resultado=mysqli_query($conexion,$sql);


?>
<div class="container-fluid alert alert-info sombra"  >
    <h1>Administración de Usuarios <i class="fas fa-user-alt"></i>
</h1> <a href="inicio_admin.php"class="btn btn-dark btn-sm">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?></div>
   
<div class="container-fluid">
<div class="row">
    <div class="col">
     
        <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a> 
        <a href="nuevo_usuario.php" class="btn btn-success">Nuevo Usuario</a>
     
    </div>
  </div>
</div><hr>



         <div class="container-fluid">
         <div class="alert alert-info">
         <h5>Filtrar por:</h5>
    <div class="row">
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="codigo_usuario">Codigo Usuario:</label><br>
                <input type="text" id="codigo_usuario" name="codigo_usuario"><br><br> <!-- Cambiado el nombre del campo -->
                <input type="submit" value="Consultar">
            </form>
        </div>
        <div class="col">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="todos">Consultar todos los Usuarios</label><br>
    <input type="submit" value="Consultar" name="consultar_todos">
</form>


        </div>
       
        </div>
    </div>
</div>
<hr>

<section id="codigo_usuario">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["codigo_usuario"])) { // Verifica si el campo específico está presente
           

            $codigo_usuario = $_POST['codigo_usuario'];

            $sql = "SELECT * FROM usuarios WHERE codigo_usuario = '$codigo_usuario'";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda: '.$codigo_usuario.'</div>';
               
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
echo "<tr style='border: 1px solid #000;'>";
echo "<th style='border: 1px solid #000;'>ID Usuario</th>";
echo "<th style='border: 1px solid #000;'>Código Usuario</th>";
echo "<th style='border: 1px solid #000;'>Rol Usuario</th>";
echo "<th style='border: 1px solid #000;'>Nombre Usuario</th>";
echo "<th style='border: 1px solid #000;'>Contraseña Usuario</th>";
echo "<th style='border: 1px solid #000;'>Acción</th>";
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr style='border: 1px solid #000;'>";
    echo "<td style='border: 1px solid #000;'>" . $fila["id_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["codigo_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["rol_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["nombre_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["contrasena_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>";
    echo "<a href='editar_usuario.php?id_usuario=" . $fila['id_usuario'] . "' class='btn btn-primary'>EDITAR</a>";
    echo "<a href='eliminar_usuario.php?id_usuario=" . $fila['id_usuario'] . "' class='btn btn-danger' onclick='return confirmar()'>ELIMINAR</a>";
              echo "</td>";
    echo "</tr>";

              }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
            }
            
        }
    }
    ?>
    </div>
</section>
<section id="usuarios">
<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_todos'])) {
                       
            $sql = "SELECT * FROM usuarios";
            $resultado = $conexion->query($sql);
            $num_filas = $resultado->num_rows;
            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $num_filas . ' resultados de la búsqueda</div>';
               
                echo "<table class='table table-bordered table-striped' style='border: 1px solid #000; border-collapse: collapse; width: 100%;'>";
echo "<tr style='border: 1px solid #000;'>";
echo "<th style='border: 1px solid #000;'>ID Usuario</th>";
echo "<th style='border: 1px solid #000;'>Código Usuario</th>";
echo "<th style='border: 1px solid #000;'>Rol Usuario</th>";
echo "<th style='border: 1px solid #000;'>Nombre Usuario</th>";
echo "<th style='border: 1px solid #000;'>Contraseña Usuario</th>";
echo "<th style='border: 1px solid #000;'>Acción</th>";
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr style='border: 1px solid #000;'>";
    echo "<td style='border: 1px solid #000;'>" . $fila["id_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["codigo_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["rol_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["nombre_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>" . $fila["contrasena_usuario"] . "</td>";
    echo "<td style='border: 1px solid #000;'>";
    echo "<a href='editar_usuario.php?id_usuario=" . $fila['id_usuario'] . "' class='btn btn-primary'>EDITAR</a>";
    echo "<a href='eliminar_usuario.php?id_usuario=" . $fila['id_usuario'] . "' class='btn btn-danger' onclick='return confirmar()'>ELIMINAR</a>";
              echo "</td>";
    echo "</tr>";

              }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
            }
            $conexion->close();
        }
    
    
    ?>
    </div>
</section>

     
</body>
</html>