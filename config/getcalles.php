<?php

require 'connection.php';

$idbarrio = $conn->real_escape_string($_POST['id_barrio']);

$sql = $conn->query("SELECT id_calle, nom_calle FROM calles WHERE id_barrio = $idbarrio");

$respuesta = array();

while ($row = $sql->fetch_assoc()) {
    $respuesta[] = array(
        'id_calle' => $row['id_calle'],
        'nom_calle' => $row['nom_calle']
    );
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>