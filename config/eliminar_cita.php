<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $eliminar = "DELETE FROM citas WHERE id_cita='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    if ($resultado) {
        echo "La cita ha sido eliminado exitosamente.";
    } else {

        echo "Error al intentar eliminar la cita: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);
// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/citas.php");
exit;
?>