<?php

$conn = new Connection();

/**
 * Obtener estructura de las zonas, con su listado de equipos
 * Todos los puntajes con estado inicial de 0
 *
 * @param Connection $conn
 * @return array Zonas [equipos]
 */
function _getZonesWithTeams(Connection $conn): array
{
    $query = '
        SELECT z.id AS zona_id, z.nombre AS zona_nombre,
            e.id AS equipo_id, e.nombre AS equipo_nombre
        FROM zonas AS z
            INNER JOIN equipos AS e
                ON z.id = e.id_zona AND e.eliminado = 0
        WHERE z.eliminado = 0;
    ';
    $stmt = $conn->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$results) {
        require '../no_records.php';
        exit();
    }

    $zones = [];
    foreach ($results as $zone) {
        if (!isset($zones[$zone['zona_id']])) {
            $zones[$zone['zona_id']] = [
                'name' => $zone['zona_nombre'],
                'teams' => []
            ];
        }
        $team = [
            'name' => $zone['equipo_nombre'],
            'pj' => 0,
            'pg' => 0,
            'pe' => 0,
            'pp' => 0,
            'np' => 0,
            'gf' => 0,
            'gc' => 0,
            'df' => 0,
            'pts' => 0
        ];
        $zones[$zone['zona_id']]['teams'][$zone['equipo_id']] = $team;
    }
    return $zones;
}

/**
 * Calcular los puntos y estadísticas de cada equipo
 *
 * @param array $zones Estructura de zonas (se modifica por referencia)
 * @param mixed $idZone ID de la zona
 * @param mixed $idTeam ID del equipo
 * @param int $goals Goles a favor
 * @param int $goalsOpp Goles en contra
 */
function _calculate_points(array &$zones, $idZone, $idTeam, int $goals, int $goalsOpp)
{
    if (!isset($zones[$idZone]['teams'][$idTeam])) return;
    $team = $zones[$idZone]['teams'][$idTeam];

    $team['pj']++;

    if ($goals > $goalsOpp) {
        // El equipo ganó
        $team['pg']++;
        $team['pts'] += 3;
    } else if ($goals === $goalsOpp) {
        // El equipo empató
        $team['pe']++;
        $team['pts'] += 1;
    } else {
        // El equipo perdió
        $team['pp']++;
    }

    // Goles
    $team['gf'] += $goals;
    $team['gc'] += $goalsOpp;
    $team['df'] = $team['gf'] - $team['gc'];

    $zones[$idZone]['teams'][$idTeam] = $team;
}

/**
 * Ordenar la posición de los equipos según sus puntos y DF
 *
 * @param array $zones Zonas con los equipos
 * @return array Zonas con los equipos ordenados
 */
function _sortPositions(array $zones): array
{
    foreach ($zones as &$zone) {
        usort($zone['teams'], function ($a, $b) {
            if ($a['pts'] === $b['pts']) {
                return $b['df'] - $a['df'];
            }
            return $b['pts'] - $a['pts'];
        });
    }
    return $zones;
}

$zones = _getZonesWithTeams($conn);

$query = '
    SELECT id_zona, id_local, id_visitante, goles_local, goles_visitante 
    FROM partidos
    WHERE eliminado = 0 AND jugado = 1;
';
$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$results) {
    require '../no_records.php';
    exit();
}

foreach ($results as $r) {
    if (!isset($zones[$r['id_zona']])) continue;
    _calculate_points($zones, $r['id_zona'], $r['id_local'], $r['goles_local'], $r['goles_visitante']);
    _calculate_points($zones, $r['id_zona'], $r['id_visitante'], $r['goles_visitante'], $r['goles_local']);
}

$zones = _sortPositions($zones);

global $zones;
require 'view.php';
