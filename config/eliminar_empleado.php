<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id_persona = $_GET['id_persona'];
    $eliminar = "DELETE FROM empleados WHERE id_empleado='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    $eliminar_relacion = "DELETE FROM datos_personales WHERE id_persona='$id_persona'";
    $resultado2 = mysqli_query($conn, $eliminar_relacion);
    $eliminar_persona = "DELETE FROM personas WHERE id_persona='$id_persona'";
    $resultado3 = mysqli_query($conn, $eliminar_persona);
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
header("refresh:2;url=../views/empleados.php");
exit;
?>
