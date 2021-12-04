<?php

$conn = new Connection();

$query = '
    SELECT j.nombre, j.numero, j.goles, e.nombre AS equipo
    FROM jugadores AS j
        INNER JOIN equipos AS e
            ON j.id_equipo = e.id AND e.eliminado = 0
    WHERE j.eliminado = 0
    ORDER BY j.goles DESC, j.nombre
    LIMIT 5;
';
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$results) {
    require '../no_records.php';
    exit();
}

// Estructurar la información
$players = [];
foreach ($results as $r) {
    $player = [
        'name' => $r['nombre'],
        'number' => $r['numero'],
        'goals' => $r['goles'],
        'team' => $r['equipo']
    ];
    array_push($players, $player);
}

global $players;
require 'view.php';
