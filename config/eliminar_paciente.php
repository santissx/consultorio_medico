<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id_persona = $_GET['id_persona'];
    $id_medico = $_GET['id_medico'];


    $eliminar_medxpac = "DELETE FROM medicosxpacientes WHERE id_paciente='$id'";
    $resultado4 = mysqli_query ($conn, $eliminar_medxpac);
    if (!$resultado4) {
        echo "Error al intentar eliminar las relaciones medicosxpacientes: " . mysqli_error($conn);
        exit;
    }
    $eliminar = "DELETE FROM pacientes WHERE id_paciente='$id'";
    $resultado = mysqli_query($conn, $eliminar);

    $eliminar_relacion = "DELETE FROM datos_personales WHERE id_persona='$id_persona'";
    $resultado2 = mysqli_query($conn, $eliminar_relacion);

    $eliminar_persona = "DELETE FROM personas WHERE id_persona='$id_persona'";
    $resultado3 = mysqli_query($conn, $eliminar_persona);

    if ($resultado) {
        echo "El paciente ha sido eliminado exitosamente.";
    } else {
        echo "Error al intentar eliminar el paciente: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);

// Redirigir a pacientes.php después de 2 segundos
header("refresh:2;url=../views/pacientes.php");
exit;
?>
