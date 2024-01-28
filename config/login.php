<?php
require 'connection.php';

if (isset($_POST["login"])) {
    $usuario = $_POST["username"];
    $password = $_POST["contraseña"];

    $sql = "SELECT * FROM USUARIOS WHERE username = '$usuario' AND contraseña = '$password'";
    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $num_registros = mysqli_num_rows($resultado);

    if ($num_registros > 0) {
        echo '<script>alert("Inicio de sesión exitoso. ¡Bienvenido ' . $usuario . '!");</script>';
        echo '<script>window.location.href = "../views/menu.html";</script>';
    } else {
        echo '<script>alert("Usuario o contraseña incorrectos.");</script>';
        echo '<script>window.location.href = "../views/login.html";</script>';
    }
}
?>
