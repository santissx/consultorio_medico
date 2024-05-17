<?php
// Incluir el archivo de conexión a la base de datos
include_once "connection.php";

// Definir la función iniciar_sesion()
function iniciar_sesion($username, $password, $conn) {
    // Preparar la consulta SQL para seleccionar un usuario con el nombre de usuario y contraseña proporcionados
    $consulta = "SELECT * FROM usuarios WHERE username = ? AND pass = ?";
    $sentencia = $conn->prepare($consulta);
    $sentencia->bind_param("ss", $username, $password);

    // Ejecutar la consulta
    $sentencia->execute();

    // Obtener el resultado de la consulta
    $resultado = $sentencia->get_result();

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($resultado->num_rows == 1) {
        // Devolver los datos del usuario encontrado
        return $resultado->fetch_assoc();
    } else {
        // Devolver false si no se encontró ningún usuario con las credenciales proporcionadas
        return false;
    }
}

// Obtener los datos del formulario de inicio de sesión
$username = $_POST['username'];
$passUsuario = $_POST['password'];

if (!empty($username) && !empty($passUsuario)) {
    // Intentar iniciar sesión con los datos proporcionados
    $usuario = iniciar_sesion($username, $passUsuario, $conn);

    if ($usuario) {
        // Iniciar sesión exitosamente
        if ($usuario['id_usuario'] == 0) {
            $nombreUsuario = "Admin";
        } else {
            // Aquí puedes hacer lo que necesites con los datos del usuario
        }

        // Iniciar sesión del usuario
        session_start();
        $_SESSION['id_usuario'] = $usuario['id_usuario'];

        // Redirigir al usuario al menú
        header('Location:../views/menu.php?accion=ingresar');
        exit;
    } else {
        // Si no existen usuarios con las credenciales proporcionadas, redirigir al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
        header('Location:../views/login.php?error=1');
        exit;
    }
} else {
    // Si el formulario está en blanco, redirigir al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
    header('Location:../views/login.php?error=2');
    exit;
}
?>