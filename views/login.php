<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php
    // Manejo de errores
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo "<p>Nombre de usuario o contraseña incorrectos.</p>";
        } elseif ($_GET['error'] == 2) {
            echo "<p>Por favor, complete todos los campos.</p>";
        }
    }
    ?>
    <form action="../config/loginback.php" method="POST">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>