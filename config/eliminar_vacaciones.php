<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id_vacacion = $_GET['id'];
   
    $sql_vacacion = "DELETE from vacaciones where id_vacacion='$id_vacacion'";
    
    if (mysqli_query($conn, $sql_vacacion)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }

} else if (isset($_GET['id_vacacion'])) {
    $id_vacacion = $_GET['id_vacacion'];
   
    $eliminarP = "DELETE from vacaciones where id_vacacion='$id_vacacion'";
    $resultadoP = mysqli_query($conn, $eliminarP);
    if ($resultadoP) {
        echo "Las vacaciones ha sido eliminada exitosamente.";
    } else {
        echo "Error al intentar eliminar las vacaciones: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

// Cerrar la conexión
mysqli_close($conn);

// Redirigir a medicamentos.php después de 2 segundos
header("refresh:2;url=../views/vacaciones.php");
exit;
?>

