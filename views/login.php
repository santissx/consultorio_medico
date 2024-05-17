<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

<div class="contenedor">

<div class="contenedor">
        <form action="../config/loginback.php" method="post">
            <div>
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="pass" required>
            </div>
            <input type="submit" name="login" id="login" class="login" value="Iniciar sesión">
        </form>
        <?php if(isset($_GET['error'])) { ?>
                <p style="color: red;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
    </div>

<footer>

</footer>
    </div>
</body>
</html>