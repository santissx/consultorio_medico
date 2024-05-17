<?php

require 'connection.php';

$idlocalidad = $conn->real_escape_string($_POST['id_localidad']);

$sql = $conn->query("SELECT id_barrio, nom_barrio FROM barrios WHERE id_localidad = $idlocalidad");

$respuesta = array();

while ($row = $sql->fetch_assoc()) {
    $respuesta[] = array(
        'id_barrio' => $row['id_barrio'],
        'nom_barrio' => $row['nom_barrio']
    );
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>