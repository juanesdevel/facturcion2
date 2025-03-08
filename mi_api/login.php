<?php
require 'database.php'; // Importa el archivo que contiene la conexión a la base de datos

// Captura y decodifica los datos JSON enviados en la petición
$data = json_decode(file_get_contents("php://input"), true);

// Verifica que la petición contenga los campos requeridos: usuario y contraseña
if (isset($data["usuario"]) && isset($data["contrasena"])) {
   $usuario = $data["usuario"];
   $contrasena = $data["contrasena"]; // Contraseña sin encriptar recibida del cliente

   // Prepara una consulta SQL para buscar el usuario en la base de datos
   // La preparación previene inyecciones SQL
   $stmt = $pdo->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
   $stmt->execute([$usuario]); // Ejecuta la consulta con el nombre de usuario
   $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado como un array asociativo

   // Verifica si el usuario existe y si la contraseña coincide con el hash almacenado
   // password_verify compara la contraseña en texto plano con el hash almacenado
   if ($user && password_verify($contrasena, $user["contrasena"])) {
       // Si la autenticación es exitosa, devuelve un mensaje de éxito en formato JSON
       echo json_encode(["mensaje" => "Autenticacion Satisfactoria"]);
   } else {
       // Si el usuario no existe o la contraseña no coincide, devuelve un error
       echo json_encode(["error" => "Error en la autenticacion"]);
   }
} else {
   // Si faltan datos requeridos en la petición, devuelve un mensaje de error
   echo json_encode(["error" => "Datos incompletos"]);
}
?>