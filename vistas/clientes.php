<?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Clientes</title>
    
    <style>
        body {
            background-color: #f5f5dc; /* Cambia #f5f5dc por el color deseado */
        }
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .tabla-con-bordes {
            border: 2px solid #000; /* Bordes de 2px de grosor y color negro */
        }
        .tabla-con-bordes th, .tabla-con-bordes td {
            border: 1px solid #000; /* Bordes de 1px de grosor y color negro para celdas */
        }
    </style>

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script>
        function confirmar(event) {
            if (!confirm('¿Está seguro de eliminar el usuario de la base de datos?')) {
                event.preventDefault(); // Evitar que se envíe el formulario
            }
        }
    </script>
</head>
<body>

<div class="container-fluid alert alert-info sombra">
    <h1>Administración de Clientes <i class="fas fa-user-friends"></i></h1>
    <a href="inicio_admin.php" class="btn btn-dark btn-sm">Regresar</a>
    <span> </span><?php echo "Usuario: " . htmlspecialchars($_SESSION['usuario']); ?>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="#" class="btn btn-primary" onclick="location.reload();">Actualizar página</a>
            <a href="nuevo_cliente.php" class="btn btn-success">Nuevo Cliente</a>
        </div>
    </div>
</div>
<hr>

<section id="buscar">
    <div class="container-fluid">
        <div class="alert alert-info">
            <div class="row">
                <div class="col">
                    <h5>Filtrar por:</h5>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="text" placeholder="Documento Cliente" id="doc_cliente" name="doc_cliente">
                        <input type="submit" value="Consultar">
                    </form>
                </div>
                <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="todos">Consultar todos los Clientes</label><br>
                        <input type="submit" value="Consultar" name="consultar_todos">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["doc_cliente"])) {
            include '../conexion/conexion.php';
            $doc_cliente = $conexion->real_escape_string($_POST['doc_cliente']); // Evita inyección SQL

            $sql = "SELECT * FROM clientes WHERE doc_cliente = '$doc_cliente'";
            $resultado_2 = $conexion->query($sql);

            if ($resultado_2->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $resultado_2->num_rows . ' resultados de la búsqueda: ' . htmlspecialchars($doc_cliente) . '</div>';
                
                echo "<table class='table table-bordered table-striped tabla-con-bordes'>";
                echo "<tr><th>ID Cliente</th><th>Nombre Cliente</th><th>Documento Cliente</th><th>Celular 1</th><th>Celular 2</th><th>Dirección</th><th>Correo</th><th>Acciones</th></tr>";

                while ($fila = $resultado_2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["id_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["nom_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["doc_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["cel1_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["cel2_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["direccion_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["correo_cliente"]) . "</td>";
                    echo "<td>
                          <a href='editar_cliente.php?id_cliente=" . $fila['id_cliente'] . "' class='btn btn-primary'>EDITAR</a>
                          <a href='eliminar_cliente.php?id_cliente=" . $fila['id_cliente'] . "' class='btn btn-danger' onclick='confirmar(event)'>ELIMINAR</a>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la Búsqueda.</div>';
            }
        } elseif (isset($_POST['consultar_todos'])) {
            $sql = "SELECT * FROM clientes";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">' . $resultado->num_rows . ' resultados de la búsqueda</div>';
                echo "<table class='table table-bordered table-striped tabla-con-bordes'>";
                echo "<tr><th>ID Cliente</th><th>Nombre Cliente</th><th>Documento Cliente</th><th>Celular 1</th><th>Celular 2</th><th>Dirección</th><th>Correo</th><th>Acciones</th></tr>";

                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["id_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["nom_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["doc_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["cel1_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["cel2_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["direccion_cliente"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["correo_cliente"]) . "</td>";
                    echo "<td>
                          <a href='editar_cliente.php?id_cliente=" . $fila['id_cliente'] . "' class='btn btn-primary'>EDITAR</a>
                          <a href='eliminar_cliente.php?id_cliente=" . $fila['id_cliente'] . "' class='btn btn-danger' onclick='confirmar(event)'>ELIMINAR</a>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo '<div class="alert alert-danger">No se encontraron resultados de la búsqueda.</div>';
            }
        }
        $conexion->close();
    }
    ?>
</div>

</body>
</html>