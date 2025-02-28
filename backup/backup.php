<?php
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