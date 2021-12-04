<?php

$conn = new Connection();

$query = '
    SELECT z.id AS zona_id, z.nombre AS zona_nombre, 
           e.id AS equipo_id, e.nombre AS equipo_nombre
    FROM zonas AS z
    INNER JOIN equipos AS e
        ON z.id = e.id_zona AND e.eliminado = 0
    WHERE z.eliminado = 0
    ORDER BY z.id, e.nombre;
';
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$results) {
    require '../no_records.php';
    exit();
}

// Estructurar la información
$teams = $zones = [];
foreach ($results as $r) {
    if (!isset($zones[$r['zona_id']])) {
        $zones[$r['zona_id']] = $r['zona_nombre'];
    }
    $teams[$r['zona_id']][$r['equipo_id']] = $r['equipo_nombre'];
}

global $zones, $teams;
require 'view.php';
