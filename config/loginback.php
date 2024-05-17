<?php
require 'connection.php';
session_start();

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el usuario ya está autenticado, redirigir a la página de menú si es así
if(isset($_SESSION['id_usuario'])) {
    header("Location: ../views/menu.php");
    exit;
}

// Verificar si se ha enviado el formulario de login
if(isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    echo "Usuario ingresado: " . $username . "<br>";
    echo "Contraseña ingresada: " . $password . "<br>";
        
    $sql = "SELECT id_usuario, username, pass FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        $contra_guardad = $row['pass'];
        echo "Contraseña almacenada en la base de datos: " . $contra_guardada . "<br>";

        if(password_verify($password, $contra_guardada)) {
            // Iniciar sesión
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['pass'] = $row['pass'];
            // Redirigir a la página de menú
            header("Location: ../views/menu.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
            // Redirigir de vuelta a login.php con mensaje de error
            header("Location: ../views/login.php?error=".urlencode($error));
            exit;
        }
    } else {
        $error = "Usuario no encontrado";
        // Redirigir de vuelta a login.php con mensaje de error
        header("Location: ../views/login.php?error=".urlencode($error));
        exit;
    }
}
?>