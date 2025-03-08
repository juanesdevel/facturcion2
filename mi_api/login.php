<?php
require 'database.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["usuario"]) && isset($data["contrasena"])) {
    $usuario = $data["usuario"];
    $contrasena = $data["contrasena"];

    $stmt = $pdo->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($contrasena, $user["contrasena"])) {
        echo json_encode(["mensaje" => "Autenticacion Satisfactoria"]);
    } else {
        echo json_encode(["error" => "Error en la autenticacion"]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}
?>