<?php
session_start();
require_once("Controler/Login.php");
require_once("Controler/Game.php");

try {
    if (isset($_SESSION['login'])){
        if (isset($_GET['page'])){
            switch ($_GET['page']) {
                case 'ranking' :
                    $game = new Game();
                    $game->Ranking();
                    break;
                case 'attack' :
                    $game = new Game();
                    $game->Attack();
                    break;
                case 'headquarter' :
                    $game = new Game();
                    $game->HeadQuarter();
                    break;
                case 'disconnect' :
                    $disconnect = new Login();
                    $disconnect->disconnect();
                    break;    
                default :
                    $game = new Game();
                    $game->HeadQuarter();
                    break;
            }
        }
        else {
            $game = new Game();
            $game->HeadQuarter();
        }
    }
    else if (isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'disconnect' :
                $disconnect = new Login();
                $disconnect->disconnect();
                break;
            case 'connection' :
                $connection = new Login();
                $connection->connect();
                break;
            default :
                $login = new Login();
                $login->loginMenu();
        }
    }
    else{
        $login = new Login();
        $login->loginMenu();
    }

}
catch (Exception $e){
    echo "Erreur : ".$e;
}