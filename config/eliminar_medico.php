<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id_persona = $_GET['id_persona'];

    $eliminar_relaciones = "DELETE FROM medicosxespecialidades WHERE id_medico='$id'";
    $resultado_relaciones = mysqli_query($conn, $eliminar_relaciones);
    // Preparar la consulta de eliminación
    $eliminar = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    $eliminar_relacion = "DELETE FROM datos_personales WHERE id_persona='$id_persona'";
    $resultado2 = mysqli_query($conn, $eliminar_relacion);
    $eliminar_persona = "DELETE FROM personas WHERE id_persona='$id_persona'";
    $resultado3 = mysqli_query($conn, $eliminar_persona);
    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El médico ha sido eliminado exitosamente.";
    } else {
        echo "Error al intentar eliminar el médico: " . mysqli_error($connection);
    }
} else {
    echo "ID no proporcionado o no válido.";
}


// Cerrar la conexión
mysqli_close($conn);
// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicos.php");
exit;
?>
