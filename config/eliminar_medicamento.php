<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id_medicamento = $_GET['id'];
   
    $sql_medicamentos = "UPDATE medicamentos SET activo='0'";
    
    if (mysqli_query($conn, $sql_medicamentos)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }

} else if (isset($_GET['id_prescripcion'])) {
    $id_prescripcion = $_GET['id_prescripcion'];
   
    $eliminarP = "DELETE FROM prescripciones WHERE id_prescripcion='$id_prescripcion'";
    $resultadoP = mysqli_query($conn, $eliminarP);
    if ($resultadoP) {
        echo "La prescripcion ha sido eliminada exitosamente.";
    } else {
        echo "Error al intentar eliminar la prescripcion: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);

// Redirigir a medicamentos.php después de 2 segundos
header("refresh:2;url=../views/medicamentos.php");
exit;
?>

