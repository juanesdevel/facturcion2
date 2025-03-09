<?php
// api_auth.php - Coloca este archivo en tu carpeta de conexión
include 'conexion.php';

// Establece las cabeceras para las respuestas de la API
header('Content-Type: application/json');

// Función para manejar la autenticación mediante API
function handleApiAuthentication() {
    global $conexion;
    
    // Verifica si la solicitud es de tipo POST, si no, devuelve un error
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        http_response_code(405); // Método no permitido
        echo json_encode(['Estado' => 'error', 'Mensaje' => 'Método no permitido']);
        return;
    }
    
    // Obtiene los datos en formato JSON de la solicitud
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    
    // Verifica si los datos JSON son válidos
    if (!$data) {
        http_response_code(400); // Solicitud incorrecta
        echo json_encode(['Estado' => 'error', 'Mensaje' => 'Datos JSON inválidos']);
        return;
    }
    
    // Verifica si los campos requeridos están presentes
    if (!isset($data['usuario']) || !isset($data['contrasena'])) {
        http_response_code(400); // Solicitud incorrecta
        echo json_encode(['Estado' => 'error', 'Mensaje' => 'Falta el usuario o la contraseña']);
        return;
    }
    
    // Sanitiza la entrada para evitar ataques XSS
    $usuario = htmlspecialchars($data['usuario']);
    $contrasena = htmlspecialchars($data['contrasena']);
    
    // Prepara la consulta para buscar al usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena_usuario = ?";
    $stmt = $conexion->prepare($sql);
    
    // Verifica si la consulta se preparó correctamente
    if (!$stmt) {
        http_response_code(500); // Error interno del servidor
        echo json_encode(['Estado' => 'error', 'Mensaje' => 'Error en la base de datos: ' . $conexion->error]);
        return;
    }
    
    // Vincula los parámetros y ejecuta la consulta
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verifica si el usuario existe en la base de datos
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rol = $row["rol_usuario"];
        
        // Genera un token de autenticación (para producción, usa JWT u otro método seguro)
        $token = bin2hex(random_bytes(32));
        
        // Devuelve una respuesta de éxito con la información del usuario
        echo json_encode([
            'Estado' => 'Exitoso',
            'mensaje' => 'Autenticación exitosa',
            'token' => $token,
            'usuario' => [
                'usuario' => $row["nombre_usuario"],
                'rol' => $rol
            ],
            'redirigir a' => ($rol == 'admin') ? '../vistas/inicio_admin.php' : '../vistas/inicio_operador.php'
        ]);
    } else {
        // Credenciales inválidas
        http_response_code(401); // No autorizado
        echo json_encode(['Estado' => 'error', 'Mensaje' => 'Usuario o contraseña incorrecta']);
    }
    
    // Cierra la consulta y la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>
