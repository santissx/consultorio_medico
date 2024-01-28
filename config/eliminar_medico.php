<?php
include 'connection.php';

$id= $_GET['id'];
$eliminar= "DELETE FROM medicos where id_medico='$id'";
$resultado=mysqli_query($connection, $eliminar);
if ($eliminar) {
    echo "El médico ha sido eliminado exitosamente.";
} else {
    echo "Error al intentar eliminar el médico: " . mysqli_error($connection);
}
$connection->close();
?>