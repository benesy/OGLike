<?php 
    ob_start(); 
    $t = new STools()
?>
<nav  class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #e3f2fd;">
<div class="collapse navbar-collapse">
    <span class="navbar-brand mb-0 h1 "><?= $_SESSION['login'] ?></span>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="?page=ranking" class="<?= $t->getSelectedPage("ranking") ?>">Classement</a>
        </li>
        <li class="nav-item">
            <a href="?page=headquarter" class="<?= $t->getSelectedPage("headquarter") ?>">Batiment</a>
        </li>
        <li class="nav-item">
            <a href="?page=attack" class="<?= $t->getSelectedPage("attack") ?>">Attaquer</a>
        </li>
    </ul>
    </div>    
    <span><a href="?page=disconnect" class="nav-link">Deconnexion</a></span>
</nav>
<?php 
    $menu = ob_get_contents();
    ob_clean();
?>