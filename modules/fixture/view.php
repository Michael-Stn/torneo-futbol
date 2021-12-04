<?php global $fixture; ?>

<?php foreach ($fixture as $zones): ?>
    <div class='espacio'><?= $zones['name'] ?></div>
    <div id='listado'>
        <?php foreach ($zones['journeys'] as $journey): ?>
            <table>
                <thead>
                <tr>
                    <th>Fecha: <?= $journey['number'] ?></th>
                </tr>
                <tr>
                    <th>Partido</th>
                    <th>Local</th>
                    <th class="txt-center"><?= $journey['date'] ?></th>
                    <th>Visitante</th>
                    <th class="txt-center">Hora</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($journey['matches'] as $key => $match): ?>
                    <tr>
                        <td class="txt-center"><?= $key + 1 ?></td>
                        <td class="min-w150"><?= $match['local'] ?></td>
                        <td class="txt-center">Vs.</td>
                        <td class="min-w150"><?= $match['visitor'] ?></td>
                        <td class="txt-center"><?= $match['hour'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
    <div class='espacio'></div>
<?php endforeach; ?>


