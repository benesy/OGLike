<?php ob_start(); ?>
<div>
    <table class="table table-striped">
     <thead class="thead-dark">
        <tr>
            <th>Type</th>
            <th>Niveau</th>
            <th>Production</th>
            <th>Cout niveau sup</th>
            <th></th>
        </tr>
    </thead>
        <?php
        if ($buildings) 
            foreach ($buildings as $b) {?>
        <tr>
            <td><?= $b->getName(); ?></td>
            <td><?= $b->getLvl(); ?></td>
            <td><?= $b->getProd(); ?>/min</td>
            <td><?= $b->getCost(); ?></td>
            <td><a class="btn btn-sm btn-outline-secondary" href=<?="?page=headquarter&lvlup=".$b->getLvl()."&resource=".$b->getResources()?>>Ameillorer</a></td>
        </tr>
        <?php } ?>
    </table>
    <a href="?newBuiding=0" class="btn btn-sm btn-outline-secondary float-sm-right">Ajouter un batiment</a>
</div>
<?php 
    $content = ob_get_contents();
    ob_clean();
?>