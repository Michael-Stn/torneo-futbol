<?php

$conn = new Connection();


$query = '
    SELECT e.id AS equipo_id, e.nombre AS equipo_nombre, 
        j.nombre, j.numero, j.goles
    FROM equipos AS e
        INNER JOIN jugadores AS j
            ON e.id = j.id_equipo AND j.eliminado = 0
    WHERE e.eliminado = 0
    ORDER BY e.nombre, j.numero;
';
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$results) {
    require '../no_records.php';
    exit();
}

// Estructurar la información
$teams = [];
foreach ($results as $r) {
    if (!isset($teams[$r['equipo_id']])) {
        $teams[$r['equipo_id']] = [
            'name' => $r['equipo_nombre'],
            'players' => []
        ];
    }
    $player = [
        'name' => $r['nombre'],
        'number' => $r['numero'],
        'goals' => $r['goles']
    ];
    array_push($teams[$r['equipo_id']]['players'], $player);
}

global $teams;
require 'view.php';