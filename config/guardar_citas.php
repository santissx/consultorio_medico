<?php
include 'connection.php';

if (isset($_POST["guardar_cita"])) {
    // Obtener y validar los datos del formulario
    $paciente = $_POST["id_paciente"];
    $medico = $_POST["id_medico"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["id_estado"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    // Insertar en la tabla `citas`
    $sql_citas = "INSERT INTO citas (fecha_y_hora, id_estado, id_paciente, id_medico) VALUES ('$fecha','$estado','$paciente', '$medico' )";
    if  ($conn->query($sql_citas)){

        $conn->commit();
        echo '<script>alert("Cita guardada correctamente");</script>';
    } else {
    $conn->rollback();
        echo '<script>alert("Error en la solicitud");</script>';
    }
} else if (isset($_POST["editar_cita"])) {
    $id_cita = $_POST['id_cita'];
    $paciente = $_POST["id_paciente"];
    $medico = $_POST["id_medico"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["id_estado"];


    $sql_citas2 = "UPDATE citas SET fecha_y_hora='$fecha', id_estado='$estado', id_medico='$medico', id_paciente='$paciente' WHERE id_cita='$id_cita'";
    
    if (mysqli_query($conn, $sql_citas2)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }
};


// Cerrar la conexión
$conn->close();

// Redirigir a medicos.php después de 2 segundos
header("refresh:0;url=../views/citas.php");
exit;
?>