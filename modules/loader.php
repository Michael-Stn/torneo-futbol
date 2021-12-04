<?php

require '../config/conn.php';

$page = $_POST['page'] ?? '';

try {

    switch ($page) {
        case 'teams':
            require 'teams/index.php';
            break;
        case 'players':
            require 'players/index.php';
            break;
        case 'fixture':
            require 'fixture/index.php';
            break;
        case 'results':
            require 'results/index.php';
            break;
        case 'positions':
            require 'positions/index.php';
            break;
        case 'top':
            require 'top/index.php';
            break;
        default:
            require 'no_records.php';
    }

} catch (PDOException $e) {
    echo '<p>Se ha presentado un error al consultar la base de datos...<p>';

    $msg = "Error PDO: {$e->getMessage()}";
    echo "<script>console.error(\"$msg\")</script>";
} catch (Exception $e) {
    echo '<p>Se ha presentado un error, por favor intente nuevamente...<p>';

    $msg = "Excepción: {$e->getMessage()}";
    echo "<script>console.error(\"$msg\")</script>";
}
