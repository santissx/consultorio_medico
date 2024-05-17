<?php
include 'connection.php';

if (isset($_GET['id_sustitucion'])) {
    $id = $_GET['id_sustitucion'];
    $eliminar = "DELETE FROM sustituciones WHERE id_sustitucion='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    if ($resultado) {
        echo "El empleado ha sido eliminado exitosamente.";
    } else {
        echo "Error al intentar eliminar el empleado: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);
// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/sustituciones.php");
exit;
?>
