<?php
// Incluir la función de validación común
include_once "loginback.php";

// Validar si el usuario ha iniciado sesión
if (!session_start()) {
    // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    header('Location:../views/login.php');
    exit;
}

// Resto del código para manejar la vista específica...
?>