<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar la sesión para manejar variables de sesión
session_start();

// Verificar si la solicitud es una API request
$is_api_request = false;
$content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';

// Si el tipo de contenido es JSON, se trata de una solicitud API
if (strpos($content_type, 'application/json') !== false) {
    $is_api_request = true;
    
    // Incluir el archivo de autenticación de la API y manejar la autenticación
    include 'api_auth.php';
    handleApiAuthentication();
    
    // Terminar la ejecución del script después de manejar la solicitud API
    exit();
}

// Manejo de la autenticación a través de un formulario HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y sanitizarlos para evitar inyección de código
    $usuario = htmlspecialchars($_POST["usuario"]);
    $contrasena = htmlspecialchars($_POST["contrasena"]);

    // Preparar la consulta SQL para evitar inyecciones SQL
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena_usuario = ?";
    $stmt = $conexion->prepare($sql);

    // Verificar si la consulta fue preparada correctamente
    if (!$stmt) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Enlazar los parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe en la base de datos
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Obtener los datos del usuario

        // Guardar el nombre de usuario en la sesión
        $_SESSION["usuario"] = $row["nombre_usuario"];

        // Obtener el rol del usuario
        $rol = $row["rol_usuario"];

        // Redirigir según el rol del usuario
        if ($rol == "admin") {
            $_SESSION["rol"] = "admin";  // Crear una sesión específica para el administrador
            
            echo '<script>alert("Bienvenido Usuario Administrador"); location.assign("../vistas/inicio_admin.php");</script>';
            exit();  // Finalizar el script después de la redirección
        } elseif ($rol == "asesor") {
            $_SESSION["rol"] = "asesor";  // Crear una sesión específica para el asesor
            
            echo '<script>
            alert("Bienvenido ' . htmlspecialchars($_SESSION['usuario']) . '");
            location.assign("../vistas/inicio_operador.php");
            </script>';
            exit();
        } else {
            // Manejo de usuarios con roles no autorizados
            echo '<script>alert("Usuario sin autorización de ingreso."); location.assign("../index.php");</script>';
            exit();
        }
    } else {
        // Mostrar alerta en caso de credenciales incorrectas
        echo '<script>alert("Acceso denegado: Usuario o contraseña incorrecta."); location.assign("../index.php");</script>';
    }

    // Cerrar la consulta y la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>
