<?php
include 'connection.php';

if (isset($_POST["editar_pac"])) {
    // Obtener y validar los datos del formulario
    $id_medico = $_POST["id_medico"];
    $id_registro = $_POST["id_registro"];
    $id_personal = $_POST["id_personal"];
    $id_persona = $_POST["id_persona"];
    $id_paciente = $_POST["id_paciente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $dni= $_POST["dni"];
    $correo = $_POST["correo"];
    $informacion_medica = $_POST["informacion_medica"];
    $id_documentacion= $_POST["id_documentacion"];
    $id_tipo= $_POST["id_documento"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    // Actualizar `registros`
    $sql_registro = "UPDATE registros SET nombres='$nombre', apellidos='$apellido' WHERE id_registro='$id_registro'";
    if (!$conn->query($sql_registro)) {
        echo "Error en la actualización de registros: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }

    // Actualizar `personas`
    $sql_persona = "UPDATE personas SET sexo='$sexo', fecha_nacimiento='$fechaN' WHERE id_persona='$id_persona'";
    if (!$conn->query($sql_persona)) {
        echo "Error en la actualización de personas: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }
    $sql_documento = "UPDATE documentaciones SET id_tipos_documentos='$id_tipo', dni='$dni' WHERE id_documento='$id_documento'";
    if (!$conn->query($sql_documento)) {
        echo "Error en la actualización de documentos: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }
    // Actualizar `datos_personales`
    $sql_datos_personales = "UPDATE datos_personales SET telefonos='$telefono', correo='$correo' WHERE id_personal='$id_personal'";
    if (!$conn->query($sql_datos_personales)) {
        echo "Error en la actualización de datos_personales: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }

    // Actualizar la tabla `medicosxpacientes`
    $sql_especialidad = "UPDATE medicosxpacientes SET id_medico='$id_medico', id_paciente='$id_paciente'";;
    if (!$conn->query($sql_especialidad)) {
        echo "Error en la actualización de especialidades: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }

    $sql_pacientes = "UPDATE pacientes SET informacion_medica='$informacion_medica' WHERE id_paciente='$id_paciente'";
    if (!$conn->query($sql_pacientes)) {
        echo "Error en la actualización de datos_personales: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }
    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro editado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();

// Redirigir a medicos.php después de 2 segundos
header("refresh:1;url=../views/pacientes.php");
exit;
?>
