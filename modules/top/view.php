<?php global $players; ?>
<div id='listado'>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Jugador</th>
            <th>Goles</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($players as $player): ?>
            <tr>
                <td class="txt-center"><?= $player['number'] ?></td>
                <td><?= "{$player['name']} ({$player['team']})" ?></td>
                <td class="txt-center"><?= $player['goals'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='espacio'></div>
