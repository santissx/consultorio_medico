<?php
include 'connection.php';

if (isset($_POST["editar_vac_M"])) {
    $id_medico = $_POST["id_medico"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $id_estado = $_POST["id_estado"];
    $id_vacacion= $_POST["id_vacacion"];

   
    // Actualizar `medicamentos`
    $sql_vacacionesM = "UPDATE vacaciones SET id_medico='$id_medico', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_estado='$id_estado' WHERE id_vacacion='$id_vacacion'";
    
    if (mysqli_query($conn, $sql_vacacionesM)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente, pero no se actualizó ninguna fila.';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }
} else if  (isset($_POST["editar_vac_emp"])) {
    $id_empleado = $_POST["id_empleado"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $id_estado = $_POST["id_estado"];
    $id_vacacion= $_POST["id_vacacion"];

        
    $sql_vacacionesE = "UPDATE vacaciones SET id_empleado='$id_empleado', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_estado='$id_estado' WHERE id_vacacion='$id_vacacion'";
    
    if (mysqli_query($conn, $sql_vacacionesE)) {

        if (mysqli_affected_rows($conn) > 0) {
            echo 'La consulta se realizó correctamente. Se actualizaron ' . mysqli_affected_rows($conn) . ' filas.';
        } else {
            echo 'La consulta se realizó correctamente';
        }
    } else {
        echo 'Error al ejecutar la consulta: ' . mysqli_error($conn);
    }
};

// Cerrar la conexión
$conn->close();

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/vacaciones.php");
exit;
?>
