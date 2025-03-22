<?php
// Encabezados requeridos para la API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Incluir la conexión a la base de datos
include_once 'conexion.php';

// Inicializar la estructura de la respuesta
$response = array();
$response['Exitoso'] = false;
$response['Mensaje'] = "";
$response['data'] = null;
$response['redirect'] = "";

// Obtener los datos enviados en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

// Si los datos se envían a través de un formulario POST en lugar de JSON
if (!$data && isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $data = array(
        'usuario' => $_POST['usuario'],
        'contrasena' => $_POST['contrasena']
    );
}

// Validar que los datos requeridos estén presentes
if ($data && isset($data['usuario']) && isset($data['contrasena'])) {
    // Sanitizar la entrada del usuario para evitar inyección de código
    $usuario = htmlspecialchars(strip_tags($data['usuario']));
    $contrasena = htmlspecialchars(strip_tags($data['contrasena']));
    
    // Preparar la consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena_usuario = ?";
    $stmt = $conexion->prepare($sql);
    
    // Verificar si la preparación de la consulta falló
    if (!$stmt) {
        $response['Mensaje'] = "Error en la preparación de la consulta: " . $conexion->error;
        echo json_encode($response);
        exit();
    }
    
    // Vincular los parámetros a la consulta
    $stmt->bind_param("ss", $usuario, $contrasena);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            
            // Configurar la respuesta como autenticación exitosa
            $response['Exitoso'] = true;
            $response['Mensaje'] = "Autenticación exitosa";
            
            // Agregar los datos del usuario a la respuesta
            $response['data'] = array(
                'usuario' => $user_data['nombre_usuario'],
                'rol' => $user_data['rol_usuario'],
                'id_usuario' => $user_data['id_usuario'],
                // Se pueden agregar más datos del usuario si es necesario
            );
            
            // Redirigir según el rol del usuario
            if ($user_data['rol_usuario'] == 'admin') {
                $response['redirect'] = '../vistas/inicio_admin.php';
            } elseif ($user_data['rol_usuario'] == 'asesor') {
                $response['redirect'] = '../vistas/inicio_operador.php';
            } else {
                $response['redirect'] = '../index.php';
                $response['Mensaje'] = "Usuario sin autorización de ingreso";
                $response['Exitoso'] = false;
            }
        } else {
            // Si el usuario o contraseña son incorrectos
            $response['Mensaje'] = "Acceso denegado: Usuario o contraseña incorrecta";
        }
    } else {
        // Si la ejecución de la consulta falló
        $response['Mensaje'] = "Error al ejecutar la consulta: " . $stmt->error;
    }
    
    // Cerrar la consulta preparada
    $stmt->close();
} else {
    // Si la solicitud no contiene datos válidos
    $response['Mensaje'] = "Datos incompletos o formato inválido";
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Devolver la respuesta en formato JSON
echo json_encode($response);
?><?php
// Encabezados requeridos para la API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Incluir la conexión a la base de datos
include_once 'conexion.php';

// Inicializar la estructura de la respuesta
$response = array();
$response['Exitoso'] = false;
$response['Mensaje'] = "";
$response['data'] = null;
$response['redirect'] = "";

// Obtener los datos enviados en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

// Si los datos se envían a través de un formulario POST en lugar de JSON
if (!$data && isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $data = array(
        'usuario' => $_POST['usuario'],
        'contrasena' => $_POST['contrasena']
    );
}

// Validar que los datos requeridos estén presentes
if ($data && isset($data['usuario']) && isset($data['contrasena'])) {
    // Sanitizar la entrada del usuario para evitar inyección de código
    $usuario = htmlspecialchars(strip_tags($data['usuario']));
    $contrasena = htmlspecialchars(strip_tags($data['contrasena']));
    
    // Preparar la consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena_usuario = ?";
    $stmt = $conexion->prepare($sql);
    
    // Verificar si la preparación de la consulta falló
    if (!$stmt) {
        $response['Mensaje'] = "Error en la preparación de la consulta: " . $conexion->error;
        echo json_encode($response);
        exit();
    }
    
    // Vincular los parámetros a la consulta
    $stmt->bind_param("ss", $usuario, $contrasena);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            
            // Configurar la respuesta como autenticación exitosa
            $response['Exitoso'] = true;
            $response['Mensaje'] = "Autenticación exitosa";
            
            // Agregar los datos del usuario a la respuesta
            $response['data'] = array(
                'usuario' => $user_data['nombre_usuario'],
                'rol' => $user_data['rol_usuario'],
                'id_usuario' => $user_data['id_usuario'],
                // Se pueden agregar más datos del usuario si es necesario
            );
            
            // Redirigir según el rol del usuario
            if ($user_data['rol_usuario'] == 'admin') {
                $response['redirect'] = '../vistas/inicio_admin.php';
            } elseif ($user_data['rol_usuario'] == 'asesor') {
                $response['redirect'] = '../vistas/inicio_operador.php';
            } else {
                $response['redirect'] = '../index.php';
                $response['Mensaje'] = "Usuario sin autorización de ingreso";
                $response['Exitoso'] = false;
            }
        } else {
            // Si el usuario o contraseña son incorrectos
            $response['Mensaje'] = "Acceso denegado: Usuario o contraseña incorrecta";
        }
    } else {
        // Si la ejecución de la consulta falló
        $response['Mensaje'] = "Error al ejecutar la consulta: " . $stmt->error;
    }
    
    // Cerrar la consulta preparada
    $stmt->close();
} else {
    // Si la solicitud no contiene datos válidos
    $response['Mensaje'] = "Datos incompletos o formato inválido";
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Devolver la respuesta en formato JSON
echo json_encode($response);
?>