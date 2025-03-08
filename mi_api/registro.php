<?php
require 'database.php'; // Importar conexión a la BD

// Leer datos enviados por el usuario
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["usuario"]) && isset($data["contrasena"])) {
    $usuario = $data["usuario"];
    $contrasena = password_hash($data["contrasena"], PASSWORD_DEFAULT); // Encriptar contraseña

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
        $stmt->execute([$usuario, $contrasena]);

        echo json_encode(["mensaje" => "Registro exitoso"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "El usuario ya existe"]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}
?>