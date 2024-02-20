<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $eliminar_relaciones = "DELETE FROM medicosxespecialidades WHERE id_medico='$id'";
    $resultado_relaciones = mysqli_query($conn, $eliminar_relaciones);
    // Preparar la consulta de eliminación
    $eliminar = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado = mysqli_query($conn, $eliminar);
<<<<<<< HEAD
=======
    // Preparar la consulta de eliminación
    $eliminar = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado = mysqli_query($connection, $eliminar);
>>>>>>> ae8799872a3c6bb35a02632eed379aefe7f7d4f9

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El médico ha sido eliminado exitosamente.";
    } else {
<<<<<<< HEAD
        echo "Error al intentar eliminar el médico: " . mysqli_error($conn);
=======
        echo "Error al intentar eliminar el médico: " . mysqli_error($connection);
>>>>>>> ae8799872a3c6bb35a02632eed379aefe7f7d4f9
    }
} else {
    echo "ID no proporcionado o no válido.";
}

<<<<<<< HEAD
// Cerrar la conexión
mysqli_close($conn);
=======
mysqli_close($conn);
mysqli_close($connection);
>>>>>>> ae8799872a3c6bb35a02632eed379aefe7f7d4f9

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicos.php");
exit;
?>
