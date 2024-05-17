<?php
include 'connection.php';

if (isset($_POST["guardar_sustitucion"])) {
    // Obtener y validar los datos del formulario
    $id_medico = $_POST["id_medico"];
    $alta_suplencia = $_POST["alta_suplencia"];
    $baja_suplencia = $_POST["baja_suplencia"];
    $estado = $_POST["id_estado"];
    
    $conn->begin_transaction();
    
    $sql_sustituciones = "INSERT INTO sustituciones (alta_suplencia, baja_suplencia, id_medico, id_estado) VALUES ('$alta_suplencia', '$baja_suplencia', '$id_medico', '$estado')";
    if  ($conn->query($sql_sustituciones)){

        $conn->commit();
        echo '<script>alert("Sustitucion guardada correctamente");</script>';
    } else {
    $conn->rollback();
        echo '<script>alert("Error en la solicitud");</script>';
    }
    }  else if (isset($_POST["editar_sustitucion"])) {
    $id_sustitucion = $_POST['id_sustitucion'];
    $id_medico = $_POST["id_medico"];
    $alta_suplencia = $_POST["alta_suplencia"];
    $baja_suplencia = $_POST["baja_suplencia"];
    $estado = $_POST["id_estado"];


    $sql_sustituciones2 = "UPDATE sustituciones SET alta_suplencia='$alta_suplencia', baja_suplencia='$baja_suplencia', id_medico='$id_medico', id_estado='$estado' WHERE id_sustitucion='$id_sustitucion'";
    
    if (mysqli_query($conn, $sql_sustituciones2)) {
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
header("refresh:2;url=../views/sustituciones.php");
exit;


?>
