<?php global $matchesResults; ?>

<?php foreach ($matchesResults as $zones): ?>
    <div class='espacio'><?= $zones['name'] ?></div>
    <div id="listado">
        <?php foreach ($zones['journeys'] as $journey): ?>
            <h3>Fecha Nro. <?= $journey['number'] ?></h3>
            <table>
                <thead>
                <tr>
                    <th>Partido</th>
                    <th class="min-w150">Local</th>
                    <th></th>
                    <th class="txt-center"><?= $journey['date'] ?></th>
                    <th></th>
                    <th class="min-w150">Visitante</th>
                    <th class="txt-center">Hora</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($journey['matches'] as $key => $match): ?>
                    <tr>
                        <td class="txt-center"><?= $key + 1 ?></td>
                        <td class="min-w150"><?= $match['local'] ?></td>
                        <td class="txt-center"><?= $match['local_goals'] ?></td>
                        <td class="txt-center">-</td>
                        <td class="txt-center"><?= $match['visitor_goals'] ?></td>
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
