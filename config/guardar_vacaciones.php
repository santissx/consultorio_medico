    <?php
    include 'connection.php';

    if (isset($_POST["guardar-vacaciones-medico"])) {
        $id_medico = $_POST["id_medico"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $fecha_fin = $_POST["fecha_fin"];
        $id_estado = $_POST["id_estado"];


        $conn->begin_transaction();
        $sql_medico = "INSERT INTO vacaciones (id_medico,fecha_inicio, fecha_fin, id_estado) VALUES ('$id_medico' ,'$fecha_inicio', '$fecha_fin', '$id_estado')";
        if ($conn->query($sql_medico)) {
            $conn->commit();
            echo '<script>alert("Vacaciones de médico registradas correctamente");</script>';
        } else {
            echo '<script>alert("Error al registrar las vacaciones de médico: ' . $conn->error . '");</script>';
        }
    }

    if (isset($_POST["guardar_vac_emp"])) {
        $id_empleado = $_POST["id_empleado"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $fecha_fin = $_POST["fecha_fin"];
        $id_estado = $_POST["id_estado"];

        $sql_empleado = "INSERT INTO vacaciones (id_empleado, fecha_inicio, fecha_fin, id_estado) VALUES ('$id_empleado', '$fecha_inicio', '$fecha_fin', '$id_estado')";
        if ($conn->query($sql_empleado)) {
            $conn->commit();
            echo '<script>alert("Vacaciones de empleado registradas correctamente");</script>';
        } else {
            echo '<script>alert("Error al registrar las vacaciones de empleado: ' . $conn->error . '");</script>';
        }
    }

    // Cerrar la conexión
    $conn->close();

    // Redireccionar después de 2 segundos
    header("refresh:2;url=../views/vacaciones.php");
    exit;
    ?>