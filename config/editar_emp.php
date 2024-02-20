<?php
include 'connection.php';

if (isset($_POST["editar_emp"])) {
    // Obtener y validar los datos del formulario
    $id_empleado = $_POST["id_empleado"];
    $id_personal = $_POST["id_personal"];
    $id_persona = $_POST["id_persona"];
    $id_puesto = $_POST["id_puesto"];
    $id_registro = $_POST["id_registro"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $puesto = $_POST["puesto"];

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

    // Actualizar `datos_personales`
    $sql_datos_personales = "UPDATE datos_personales SET telefonos='$telefono', correo='$correo' WHERE id_personal='$id_personal'";
    if (!$conn->query($sql_datos_personales)) {
        echo "Error en la actualización de datos_personales: " . $conn->error;
        $conn->rollback(); // Deshacer la transacción en caso de error
        exit;
    }

    // Actualizar la tabla `medicos`
    $sql_medico = "UPDATE empleados SET id_puesto='$puesto' WHERE id_puesto='$id_puesto'";
    if (!$conn->query($sql_medico)) {
        echo "Error en la actualización de medicos: " . $conn->error;
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
header("refresh:1;url=../views/empleados.php");
exit;
?>
