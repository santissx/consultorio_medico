<?php
include 'connection.php';

$id= $_GET['id'];
$eliminar= "DELETE FROM medicos where id_medico='$id'";
$resultado=mysqli_query($connection, $eliminar);
if ($resultado) {
    echo "El médico ha sido eliminado exitosamente.";
} else {
    echo "Error al intentar eliminar el médico: " . mysqli_error($connection);
}
$connection->close();
// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=medicos.php");
exit;
?>