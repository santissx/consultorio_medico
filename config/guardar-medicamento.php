<?php
include 'connection.php';

if (isset($_POST["guardar-medicamento"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["ingrediente"])) {
    // Obtener y validar los datos del formulario de medicamentos
    $nombre = $_POST["nombre"];
    $descrip = $_POST["descripcion"];
    $ingrediente = $_POST["ingrediente"];
    $activo = $_POST["activo"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();
    $sql_medicamento = "INSERT INTO medicamentos (nombre, descripcion, ingrediente_activo, activo) VALUES ('$nombre', '$descrip', '$ingrediente', '$activo')";
    $conn->query($sql_medicamento);

    $conn->commit();

    echo '<script>alert("Medicamento insertado correctamente");</script>';
} 
else if (isset($_POST["guardar_prescripcion"]) && isset($_POST["fecha"]) && isset($_POST["id_medico"]) && isset($_POST["id_paciente"]) && isset($_POST["id_medicamento"])) {
    // Obtener y validar los datos del formulario de prescripciones
    $fechaP = $_POST["fecha"];
    $id_medico = $_POST["id_medico"];
    $id_paciente = $_POST["id_paciente"];
    $id_medicamento = $_POST["id_medicamento"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();
    $sql_prescripcion = "INSERT INTO prescripciones (fecha_prescripcion, id_medico, id_paciente, id_medicamento) VALUES ('$fechaP', '$id_medico', '$id_paciente', '$id_medicamento')";
    $conn->query($sql_prescripcion);

    $conn->commit();

    echo '<script>alert("prescripcion insertado correctamente");</script>';
} 
else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();

// Redirigir a medicos.php después de 2 segundos
header("refresh:1;url=../views/medicamentos.php");
exit;