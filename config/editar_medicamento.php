<?php
include 'connection.php';

if (isset($_POST["editar_med"])) {
    // Obtener y validar los datos del formulario
    $id_medicamento = $_POST["id_medicamento"];
    $nombre = $_POST["nombreEditar"];
    $descrip = $_POST["descripEditar"];
    $ingrediente = $_POST["ingredienteEditar"];
    
    // Actualizar `medicamentos`
    $sql_medicamento = "UPDATE medicamentos SET nombre='$nombre', descripcion='$descrip', ingrediente_activo='$ingrediente' WHERE id_medicamento='$id_medicamento'";
    
    if (mysqli_query($conn, $sql_medicamento)) {
        $conn->commit();
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }
} else if  (isset($_POST["editar_pres"])) {
    // Obtener y validar los datos del formulario
    $id_medicamento = $_POST["id_medicamento"];
    $id_prescripcion = $_POST["id_prescripcion"];
    $id_medico = $_POST["id_medico"];
    $id_paciente = $_POST["id_paciente"];
    $fecha = $_POST["fechaEditar"];

    
    // Actualizar `medicamentos`
    $sql_prescrip = "UPDATE prescripciones SET id_medicamento='$id_medicamento', id_medico='$id_medico', id_paciente='$id_paciente', fecha_prescripcion='$fecha' WHERE id_prescripcion='$id_prescripcion'";
    
    if (mysqli_query($conn, $sql_prescrip)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }

}

// Cerrar la conexión
$conn->close();

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicamentos.php");
exit;
?>
