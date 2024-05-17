<?php

require 'connection.php';

$idprovincia = $conn->real_escape_string($_POST['id_provincia']);

$sql = $conn->query("SELECT id_localidad, nom_loc FROM localidades WHERE id_provincia = $idprovincia ");

$respuesta = array();

while ($row = $sql->fetch_assoc()) {
    $respuesta[] = array(
        'id_localidad' => $row['id_localidad'],
        'nom_loc' => $row['nom_loc']
    );
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
