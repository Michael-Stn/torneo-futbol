<?php global $teams; ?>

<?php foreach ($teams as $team): ?>
    <div id='listado'>
        <table>
            <thead>
            <tr>
                <th colspan='3'><?= $team['name'] ?></th>
            </tr>
            <tr>
                <th>#</th>
                <th>Jugador</th>
                <th>Goles</th>
            </thead>
            <tbody>
            <?php foreach ($team['players'] as $player): ?>
                <tr>

                    <td class="txt-center"><?= $player['number'] ?></td>
                    <td><?= $player['name'] ?></td>
                    <td class="txt-center"><?= $player['goals'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class='espacio'></div>
<?php endforeach; ?>