<?php global $zones; ?>

<?php foreach ($zones as $zone): ?>
    <?php $count = 1; // # de cada registro ?>
    <div id='listado'>
        <table class="table-b1">
            <thead>
            <tr>
                <th>#</th>
                <th><?= $zone['name'] ?></th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>NP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DF</th>
                <th>PTS</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($zone['teams'] as $team): ?>
                <tr>
                    <td class="txt-center"><?= $count ?></td>
                    <td><?= $team['name'] ?></td>
                    <td class="txt-center"><?= $team['pj'] ?></td>
                    <td class="txt-center"><?= $team['pg'] ?></td>
                    <td class="txt-center"><?= $team['pe'] ?></td>
                    <td class="txt-center"><?= $team['pp'] ?></td>
                    <td class="txt-center"><?= $team['np'] ?></td>
                    <td class="txt-center"><?= $team['gf'] ?></td>
                    <td class="txt-center"><?= $team['gc'] ?></td>
                    <td class="txt-center"><?= $team['df'] ?></td>
                    <td class="txt-center"><?= $team['pts'] ?></td>
                </tr>
                <?php $count++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class='espacio'></div>
<?php endforeach; ?>