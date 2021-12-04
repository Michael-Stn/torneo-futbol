<?php
global $zones, $teams;

// Obtener la cantidad registros de la zona con más equipos
$maxCount = 0;
foreach ($teams as $t) {
    if (count($t) > $maxCount)
        $maxCount = count($t);
}

?>

<div id='listado'>
    <table>
        <thead>
        <tr>
            <?php foreach ($zones as $z): ?>
                <th><?= $z ?></th>
            <?php endforeach; ?>
        </tr>
        <thead>
        <tbody>
        <?php for ($i = 1; $i <= $maxCount; $i++): ?>
            <tr>
                <?php foreach ($zones as $key => $z): ?>
                    <td><?= array_shift($teams[$key]) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>
<div class='espacio'></div>

