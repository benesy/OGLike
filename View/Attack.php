<?php ob_start(); ?>
attack
<?php 
    $content = ob_get_contents();
    ob_clean();
?>