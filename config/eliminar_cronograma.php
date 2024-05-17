<?php
include 'connection.php';

if (isset($_GET['id_cronograma'])) {
    $id = $_GET['id_cronograma'];
    $eliminar = "DELETE FROM cronogramas WHERE id_cronograma='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    if ($resultado) {
        echo "El cronograma ha sido eliminado exitosamente.";
    } else {
        echo "Error al intentar eliminar el cronograma: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);
// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/cronograma.php");
exit;
?>
