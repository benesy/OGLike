<?php ob_start(); ?>
<div class="bg-secondary text-white">
    Diaments : <?= $resource->getAmount(); ?> (+<?= $taux ?> / min)
</div>
<?php 
    $resource = ob_get_contents();
    ob_clean();
?>