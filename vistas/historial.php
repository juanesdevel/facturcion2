<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';
// Verificación del rol de administrador

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    // Si no es administrador, redirigir al inicio o denegar acceso
    echo '<script>alert("Acceso denegado. Solo administradores pueden acceder a esta página."); location.assign("inicio_operador.php");</script>';
    exit();  // Detener la ejecución si el usuario no tiene el rol adecuado
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- stilos -->
    <style>
    body {
        background-color: #fbfcfc;

    }

    .sombra {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .logo {
        width: 150px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <!-- Titulo de la pagina -->
    <div class="container-fluid alert alert-info sombra">
        <h1>Historial de Cambios</h1>
        <a href="inicio_admin.php" class="btn btn-dark btn-sm">Regresar</a><span>
        </span><?php echo "Usuario: ".$_SESSION['usuario'];?>
    </div>
    </div>
    <!-- botones de ingreso -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-primary sombra" onclick="location.reload();">Actualizar página</a>
                <a href="hclientes.php" class="btn btn-warning sombra">Registro de Clientes</a>
                <a href="husuarios.php" class="btn btn-warning sombra">Registro de Usuarios</a>
                <a href="hproductos.php" class="btn btn-warning sombra">Registro de Productos</a>

            </div>
        </div>
    </div>
    <hr>

</body>

</html>