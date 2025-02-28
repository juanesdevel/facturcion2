<?php
include 'conexion.php';
session_start();  // Iniciar sesión para manejar variables de sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario y sanitizarlos para evitar inyección de código
    $usuario = htmlspecialchars($_POST["usuario"]);
    $contrasena = htmlspecialchars($_POST["contrasena"]);

    // Consulta preparada para evitar inyecciones SQL
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena_usuario = ?";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error en la consulta: " . $conexion->error);
    }
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  // Obtener los datos del usuario

        // Almacenar el nombre de usuario en la sesión
        $_SESSION["usuario"] = $row["nombre_usuario"];

        // Obtener el rol del usuario desde la base de datos
        $rol = $row["rol_usuario"];

        // Verificar el rol del usuario
        if ($rol == "admin") {
            $_SESSION["rol"] = "admin";  // Crear sesión específica para admin
           
            echo '<script>alert("Bienvenido Usuario Administrador"); location.assign("../vistas/inicio_admin.php");</script>';
            exit();  // Detener el script después de redirigir
            echo '<div class="alert alert-success" role="alert">
            Bienvenido Usuario Administrador!
          </div>';
        } elseif ($rol == "asesor") {
            $_SESSION["rol"] = "asesor";  // Crear sesión específica para operador
            echo '<script>
            alert("Bienvenido ' . htmlspecialchars($_SESSION['usuario']) . '");
            location.assign("../vistas/inicio_operador.php");
            </script>';
        
            exit();
        } else {
            // Si el rol es otro, podrías manejarlo de forma diferente
            echo '<script>alert("Usuario sin autorización de ingreso."); location.assign("../index.php");</script>';
            exit();
        }
    } else {
        // Credenciales incorrectas
        echo '<script>alert("Acceso denegado: Usuario o contraseña incorrecta."); location.assign("../index.php");</script>';
    }

    // Cerrar el statement y la conexión
    $stmt->close();
    $conexion->close();
}
?>
