<?php
// Iniciar la sesión
session_start();


// Tiempo de inactividad permitido (en segundos)
$tiempo_inactividad = 6000; // 10 minutos

// Verificar si la variable de sesión 'LAST_ACTIVITY' está definida
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calcular el tiempo de inactividad
    $tiempo_transcurrido = time() - $_SESSION['LAST_ACTIVITY'];

    // Si el tiempo transcurrido es mayor que el tiempo de inactividad permitido
    if ($tiempo_transcurrido > $tiempo_inactividad) {
        // Guardar un mensaje de sesión cerrada por inactividad
      
        // Destruir la sesión y redirigir al usuario
        session_unset();
        session_destroy();
        // Redirige al usuario a la página de inicio (index.php)
        echo '<script>alert("La sesión se cerró por inactividad");location.assign("../index.php");</script>';
        exit();
    }
}

// Actualizar el tiempo de actividad
$_SESSION['LAST_ACTIVITY'] = time();

// Verificar si la variable de sesión 'usuario' está definida y es válida
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == '') {
    // Guardar un mensaje de acceso no autorizado
    $_SESSION['mensaje'] = "No tiene acceso.";
    
    // Redirigir al usuario a la página de inicio
    header("Location: index.php");
    exit();
}
?>

