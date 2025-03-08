<?php
// Definición de variables para la conexión a la base de datos
$host = "localhost";      // Servidor donde se aloja la base de datos (servidor local)
$dbname = "api_usuarios"; // Nombre de la base de datos
$username = "root";       // Usuario para acceder a la base de datos. Cambia según tu configuración
$password = "";           // Contraseña para acceder a la base de datos. En XAMPP suele estar vacía

try {
   // Creación del objeto PDO para establecer la conexión a la base de datos
   // Se especifica el tipo de base de datos (MySQL), host, nombre de la BD y codificación UTF-8
   $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
   
   // Configuración del modo de error para que PDO lance excepciones en caso de error
   // Esto facilita la depuración y el manejo de errores
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   // Captura de errores relacionados con la conexión
   // Si hay algún problema, termina la ejecución y muestra el mensaje de error
   die("Error en la conexión: " . $e->getMessage());
}
?>