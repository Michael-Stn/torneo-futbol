<?php

$conn = new Connection();

$query = '
    SELECT z.id AS zona_id, z.nombre AS zona_nombre, p.nro_fecha,
        e1.nombre AS equipo_local, e2.nombre AS equipo_visitante, p.fecha_hora
    FROM zonas AS z
        INNER JOIN partidos AS p
            ON p.id_zona = z.id AND p.eliminado = 0 AND p.jugado = 0
        INNER JOIN equipos AS e1
            ON p.id_local = e1.id AND e1.eliminado = 0
        INNER JOIN equipos AS e2
            ON p.id_visitante = e2.id AND e2.eliminado = 0
    WHERE z.eliminado = 0
    ORDER BY z.id, p.nro_fecha, p.fecha_hora;
';
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$results) {
    require '../no_records.php';
    exit();
}

// Estructurar la información
$fixture = [];
foreach ($results as $r) {
    $matchTime = strtotime($r['fecha_hora']);

    // Estructura de zonas
    if (!isset($fixture[$r['zona_id']])) {
        $fixture[$r['zona_id']] = [
            'name' => $r['zona_nombre'],
            'journeys' => []
        ];
    }

    // Sub-estructura de fechas
    if (!isset($fixture[$r['zona_id']]['journeys'][$r['nro_fecha']])) {
        $fixture[$r['zona_id']]['journeys'][$r['nro_fecha']] = [
            'number' => $r['nro_fecha'],
            'date' => date('d/m/Y', $matchTime),
            'matches' => []
        ];
    }

    // Partidos por fecha
    $match = [
        'local' => $r['equipo_local'],
        'visitor' => $r['equipo_visitante'],
        'hour' => date('H:i', $matchTime)
    ];
    array_push($fixture[$r['zona_id']]['journeys'][$r['nro_fecha']]['matches'], $match);
}

global $fixture;
require 'view.php';