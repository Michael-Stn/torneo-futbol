<?php $p404 = (isset($_REQUEST['page']) && $_REQUEST['page'] === '404'); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resources/css/estilos.css?v=1.0">
    <title>Torneo de fútbol</title>
</head>
<body>

<div id="header">
    <nav>
        <ul>
            <li><a href="<?= $p404 ? 'index.php' : '' ?>">Inicio</a></li>
            <li><a href="" class="btn-menu" data-page="teams">Equipos</a></li>
            <li><a href="" class="btn-menu" data-page="players">Jugadores</a></li>
            <li><a href="" class="btn-menu" data-page="fixture">Fixture</a></li>
            <li><a href="" class="btn-menu" data-page="results">Resultados</a></li>
            <li><a href="" class="btn-menu" data-page="positions">Posiciones</a></li>
            <li><a href="" class="btn-menu" data-page="top">Goleadores</a></li>
        </ul>
    </nav>
</div>
<div id="section">
    <?php if ($p404): require 'modules/page_404.php'; ?>
    <?php else: ?>
        <img id="img-logo" src="resources/img/logo.jpg" alt="Logo">
    <?php endif; ?>
</div>
<div class="espacio"></div>
<div id="footer"></div>

<!-- Scripts -->
<script src="resources/js/jquery-3.6.0.min.js"></script>
<script src="resources/js/lib.js?v=1.0"></script>
</body>
</html>
