<?php
require_once("Services/SLogin.php");

class   Login{

    public function         connect(){
        $login = new SLogin();
        if ($login->checkUser())
            header('location:index.php');
        $this->loginMenu();
    }

    public function         disconnect(){
        session_destroy();
        header('location:index.php');
    }

    public function         loginMenu(){
        $tool = new STools();
        $title = "Connexion";
        
        if($tool->checkEmptyPost('login'))
            $connectionLogin = $_POST['login'];
        require("View/Login.php");
        require("View/Template.php");
    }
}