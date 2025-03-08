<?php
$host = "localhost";
$dbname = "api_usuarios";
$username = "root"; // Cambia según tu configuración
$password = ""; // Si usas XAMPP, deja esto vacío

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
