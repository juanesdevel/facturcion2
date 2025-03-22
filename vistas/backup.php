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
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>Administrador</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .mensaje {
            text-align: right;
            margin-left: 20px;
        }
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>  
</head>
<body>
<div class="container-fluid alert alert-info sombra">
    <h1>Administración Backup</h1> 
    <a href="inicio_admin.php" class="btn btn-dark btn-sm">Regresar</a><span> </span>
    <?php echo "Usuario: ".$_SESSION['usuario']; ?>
</div>
<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
        <form method="POST">
            <!-- Botón para ejecutar el backup -->
            <button type="submit" name="backup" class="btn btn-primary">Realizar Backup</button>
        </form></div> 
        <div class="col-10"><?php
// Incluir el archivo de seguridad de sesión
include '../conexion/conexion.php';

if (isset($_POST['backup'])) {
    try {
        // Conectar a la base de datos con PDO
        $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Nombre del archivo de backup
        $fecha = date("Ymd-His");
        $backup_file = "../backup/backup_{$dbname}_{$fecha}.sql";

        // Abrir archivo para guardar el backup
        $file = fopen($backup_file, 'w+');
        if (!$file) {
            throw new Exception("No se puede crear el archivo de backup.");
        }

        // Escribir el encabezado del archivo SQL
        fwrite($file, "-- Backup de la base de datos: $dbname\n");
        fwrite($file, "-- Fecha de creación: " . date("Y-m-d H:i:s") . "\n\n");

        // Obtener todas las tablas
        $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

        // Recorrer todas las tablas
        foreach ($tables as $table) {
            // Obtener la estructura de la tabla
            $create_table_stmt = $pdo->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_ASSOC);
            fwrite($file, "-- Estructura de la tabla $table\n");
            fwrite($file, $create_table_stmt['Create Table'] . ";\n\n");

            // Obtener los datos de la tabla
            $rows = $pdo->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                fwrite($file, "-- Datos de la tabla $table\n");

                foreach ($rows as $row) {
                    $row_data = array_map([$pdo, 'quote'], $row); // Escapar los valores
                    $row_values = implode(", ", $row_data);
                    fwrite($file, "INSERT INTO $table VALUES ($row_values);\n");
                }

                fwrite($file, "\n");
            }
        }

        fclose($file);

        echo "<div class='alert alert-success'>Backup realizado con éxito. Archivo guardado en: {$backup_file}</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error al realizar el backup: " . $e->getMessage() . "</div>";
    }
}
?>
</div>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="row">
            <div class="col"><img src="../img/Backup.png" alt="Backup"> </div>
            <div class="col">
                <h2>
                    Este opción genera un backup de toda la base de datos en formato SQL. 
                    Si requiere restaurar los datos con algún backup obtenido, se debe comunicar con soporte técnico.
                    Para más información comuníquese con juan_egallegoc@soy.sena.edu.co
                </h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>
