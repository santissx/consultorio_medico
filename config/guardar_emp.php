<?php
include 'connection.php';

if (isset($_POST["guardar_emp"])) {
    // Obtener y validar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $id_puesto = $_POST["puesto"];
    $dni = $_POST["dni"];
    $tipo = $_POST["tipo_doc"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();
    // Resto del código...
    // 1. Insertar en la tabla `registros`
    $sql_registro = "INSERT INTO registros (nombres, apellidos) VALUES ('$nombre', '$apellido')";
    $conn->query($sql_registro);

    // Obtener el ID generado para la tabla `registros`
    $id_registro = $conn->insert_id;
    // 2. Insertar en la tabla `documentaciones`
    $sql_documentacion = "INSERT INTO documentaciones (id_tipos_documentos ,dni) VALUES ('$tipo','$dni')";
    $conn->query($sql_documentacion);

    // Obtener el ID generado para la tabla `documentaciones`
    $id_documentacion = $conn->insert_id;

    // 3. Insertar en la tabla `personas` utilizando los IDs de registro y documentación
    $sql_persona = "INSERT INTO personas (sexo, fecha_nacimiento, id_registro, id_documentacion) VALUES ('$sexo', '$fechaN', '$id_registro', '$id_documentacion')";
    $conn->query($sql_persona);

    // Obtener el ID generado para la tabla `personas`
    $id_persona = $conn->insert_id;

    // 3. Insertar en la tabla `datos_personales`
    $sql_datos_personales = "INSERT INTO datos_personales (telefonos, correo, id_persona) VALUES ('$telefono', '$correo', '$id_persona')";
    $conn->query($sql_datos_personales);

    // 4. Insertar en la tabla `empleados`
    $sql_empleado = "INSERT INTO empleados (id_puesto, id_persona) VALUES ('$id_puesto', '$id_persona')";
    $conn->query($sql_empleado);

    // Obtener el ID generado para la tabla `empleado`
    $id_empleado = $conn->insert_id;

    
    $id_documentacion = $conn->insert_id;


    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
} 

// Cerrar la conexión
$conn->close();


// Redirigir a medicos.php después de 2 segundos
header("refresh:1;url=../views/empleados.php");
exit;
?>