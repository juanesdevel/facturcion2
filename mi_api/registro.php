<?php
require 'database.php'; // Importar el archivo que contiene la conexión a la base de datos

// Lee los datos enviados en formato JSON desde la solicitud
// php://input captura el cuerpo de la petición HTTP
// json_decode convierte el JSON a un array asociativo (true)
$data = json_decode(file_get_contents("php://input"), true);

// Verifica que se hayan recibido los campos obligatorios (usuario y contraseña)
if (isset($data["usuario"]) && isset($data["contrasena"])) {
   $usuario = $data["usuario"];
   // Encripta la contraseña usando el algoritmo de hash seguro predeterminado
   // Esto es una buena práctica de seguridad para no almacenar contraseñas en texto plano
   $contrasena = password_hash($data["contrasena"], PASSWORD_DEFAULT);

   try {
       // Prepara una consulta SQL para insertar el nuevo usuario
       // El uso de preparación de consultas (prepare) previene inyecciones SQL
       $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
       // Ejecuta la consulta con los valores reales
       $stmt->execute([$usuario, $contrasena]);

       // Si la inserción fue exitosa, devuelve un mensaje de éxito en formato JSON
       echo json_encode(["mensaje" => "Registro exitoso"]);
   } catch (PDOException $e) {
       // Si hay un error (como un usuario duplicado), captura la excepción
       // y devuelve un mensaje de error amigable en formato JSON
       // Nota: Este catch asume que el error es por duplicación de usuario,
       // pero podrían existir otros errores de base de datos
       echo json_encode(["error" => "El usuario ya existe"]);
   }
} else {
   // Si faltan datos requeridos, devuelve un mensaje de error
   echo json_encode(["error" => "Datos incompletos"]);
}
?>