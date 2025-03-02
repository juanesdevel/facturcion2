<?php
include '../conexion/conexion.php';
include '../conexion/sesion.php';

$errors = [];

if(isset($_POST['submit'])){
    // Sanitize and validate input
    $id_usuario = filter_input(INPUT_POST, 'idUsuario', FILTER_SANITIZE_NUMBER_INT);
    $codigo = filter_input(INPUT_POST, 'codigoUsuario', FILTER_SANITIZE_STRING);
    $nombre = filter_input(INPUT_POST, 'nombreUsuario', FILTER_SANITIZE_STRING);
    $password = $_POST['password']; // Don't sanitize password to preserve complexity
    $rol = filter_input(INPUT_POST, 'rolUsuario', FILTER_SANITIZE_STRING);

    // Validate input
    if (!preg_match('/^[A-Za-z\s]{1,40}$/', $nombre)) {
        $errors[] = "El nombre no debe contener números, ni caracteres especiales y debe tener máximo 40 caracteres.";
    }
    if (!preg_match('/^\d{4}$/', $codigo)) {
        $errors[] = "El código debe ser un número de 4 dígitos.";
    }
    if (!in_array($rol, ['bloqueado', 'asesor', 'admin'])) {
        $errors[] = "Rol de usuario no válido.";
    }
    if (!empty($password) && !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,12}$/', $password)) {
        $errors[] = "La contraseña debe contener entre 4 y 12 caracteres, incluyendo números y letras.";
    }

    if (empty($errors)) {
        // Prepare SQL statement
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre_usuario=?, rol_usuario=?, codigo_usuario=?, contrasena_usuario=? WHERE id_usuario=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssi", $nombre, $rol, $codigo, $hashed_password, $id_usuario);
        } else {
            $sql = "UPDATE usuarios SET nombre_usuario=?, rol_usuario=?, codigo_usuario=? WHERE id_usuario=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssi", $nombre, $rol, $codigo, $id_usuario);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Los datos fueron actualizados correctamente'); location.assign('usuario.php');</script>";
        } else {
            echo "<script>alert('ERROR: Los datos no fueron actualizados'); location.assign('usuario.php');</script>";
        }
        $stmt->close();
    } else {
        // Display errors
        echo "<script>alert('Errores de validación:\\n" . implode("\\n", $errors) . "');</script>";
    }
} else {
    $id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM usuarios WHERE id_usuario=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    $nombre = $fila["nombre_usuario"];
    $rol = $fila["rol_usuario"];
    $codigo = $fila["codigo_usuario"];
    $password_actual = $fila["contrasena_usuario"]; // Obtenemos la contraseña actual
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="alert alert-info">
            <h3>Editar Usuario</h3>
            <a href="usuario.php" class="btn btn-dark">Regresar</a>
        </div>
        
        <form id="formulario" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="form-group">
                <label for="nombreUsuario">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" value="<?= htmlspecialchars($nombre) ?>" required>
                <small id="nombreUsuarioError" class="form-text text-danger"></small>
            </div>
            
            <div class="form-group">
                <label for="codigoUsuario">Código de Usuario:</label>
                <input type="text" class="form-control" id="codigoUsuario" name="codigoUsuario" value="<?= htmlspecialchars($codigo) ?>" required>
                <small id="codigoUsuarioError" class="form-text text-danger"></small>
            </div>
            
            <div class="form-group">
                <label for="passwordActual">Contraseña Actual (hash):</label>
                <input type="text" class="form-control" id="passwordActual" value="<?= htmlspecialchars($password_actual) ?>" readonly>
                <small class="form-text text-muted">Nota: Se muestra el hash de la contraseña, no el texto original.</small>
            </div>
            
            <div class="form-group">
                <label for="rolUsuario">Rol de Usuario:</label>
                <select class="form-control" id="rolUsuario" name="rolUsuario" required>
                    <option value="bloqueado" <?= $rol == 'bloqueado' ? 'selected' : '' ?>>Bloqueado</option>
                    <option value="asesor" <?= $rol == 'asesor' ? 'selected' : '' ?>>Asesor</option>
                    <option value="admin" <?= $rol == 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="password">Nueva Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="passwordError" class="form-text text-danger"></small>
            </div>
            
            <input type="hidden" name="idUsuario" value="<?= htmlspecialchars($id_usuario) ?>">
            
            <button class="btn btn-primary" type="submit" name="submit">Actualizar</button>
        </form>
    </div>

    <script>
    document.getElementById('formulario').addEventListener('submit', function(event) {
        let isValid = true;
        const nombreUsuario = document.getElementById('nombreUsuario');
        const codigoUsuario = document.getElementById('codigoUsuario');
        const password = document.getElementById('password');

        // Validar nombre de usuario
        if (!/^[A-Za-z\s]{1,40}$/.test(nombreUsuario.value)) {
            document.getElementById('nombreUsuarioError').textContent = 'El nombre no debe contener números, ni caracteres especiales y debe tener máximo 40 caracteres.';
            isValid = false;
        } else {
            document.getElementById('nombreUsuarioError').textContent = '';
        }

        // Validar código de usuario
        if (!/^\d{4}$/.test(codigoUsuario.value)) {
            document.getElementById('codigoUsuarioError').textContent = 'El código debe ser un número de 4 dígitos.';
            isValid = false;
        } else {
            document.getElementById('codigoUsuarioError').textContent = '';
        }

        // Validar contraseña (solo si se ha ingresado una nueva)
        if (password.value !== '' && !/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,12}$/.test(password.value)) {
            document.getElementById('passwordError').textContent = 'La contraseña debe contener entre 4 y 12 caracteres, incluyendo números y letras.';
            isValid = false;
        } else {
            document.getElementById('passwordError').textContent = '';
        }

        if (!isValid) {
            event.preventDefault();
        } else if (!confirm('¿Estás seguro de actualizar este usuario?')) {
            event.preventDefault();
        }
    });
    </script>
</body>
</html>