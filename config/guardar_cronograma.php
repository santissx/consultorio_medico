<?php
include 'connection.php';

try {

if (isset($_POST["guardar_cronograma"])) {
    // Obtener y validar los datos del formulario
    $id_medico = $_POST["id_medico"];
    $dia = $_POST["dia"];
    $horario_entrada = $_POST["id_horario_entrada"];
    $horario_salida = $_POST["id_horario_salida"];
    
    $conn->begin_transaction();
    
    $sql_cronogramas = "INSERT INTO cronogramas (id_medico, dia, id_horario_entrada, id_horario_salida) VALUES ('$id_medico', '$dia', '$horario_entrada', '$horario_salida')";
    if  ($conn->query($sql_cronogramas)){

        $conn->commit();
        echo '<script>alert("cronograma guardado correctamente");</script>';
    } else {
    $conn->rollback();
        echo '<script>alert("Error en la solicitud");</script>';
    }
} else if (isset($_POST["editar_cronograma"])) {
    $id_cronograma =$_POST["id_cronograma"];
    $id_medico = $_POST["id_medico"];
    $dia = $_POST["dia"];
    $horario_entrada = $_POST["id_horario_entrada"];
    $horario_salida = $_POST["id_horario_salida"];
    
    $conn->begin_transaction();
    
    $sql_cronogramas = "UPDATE cronogramas SET id_medico = '$id_medico', dia = '$dia', id_horario_entrada = '$horario_entrada', id_horario_salida = '$horario_salida' WHERE id_cronograma = '$id_cronograma'";
    if  ($conn->query($sql_cronogramas)){

        $conn->commit();
        echo '<script>alert("cronograma editado correctamente");</script>';
    } else {
    $conn->rollback();
        echo '<script>alert("Error en la solicitud");</script>';}
};
} catch (Exception $e) {
    // Si ocurre alguna excepción, muestra un mensaje de alerta
    echo '<script>alert("Ocurrió un error al guardar el cronograma. Por favor, verifique que ingreso todos los campos.");</script>';
};
// Cerrar la conexión
$conn->close();


// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/cronograma.php");
exit;


?>
