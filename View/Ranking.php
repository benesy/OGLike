<?php ob_start(); ?>
<div>
    <table  class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Place</th>
            <th>Nom</th>
            <th>Points</th>
        </tr>
    </thead>
        <?php
        if ($user) 
            $i = 1;
            foreach ($user as $u) {?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $u->getLogin(); ?></td>
            <td><?= $u->getPts(); ?></td>
        </tr>
        <?php $i++; } ?>
    </table>
</div>
<?php 
    $content = ob_get_contents();
    ob_clean();
?>