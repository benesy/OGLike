<?php
require_once("Model/Manager/UserManager.php");
require_once("Services/Stools.php");

class       SLogin{

    public function checkUser(){
        $userManager = new UserManager();
        $loginService = new SLogin();
        $tool = new STools();
        if ($tool->checkEmptyPost("login") &&
            $tool->checkEmptyPost("pwd")){
                $login = $_POST['login'];
                $pwd = $_POST['pwd'];
                $dbUser = $userManager->getUserByLogin($login);
                if ($dbUser && (MD5($pwd) == $dbUser->getPwd())){
                    $_SESSION['id'] = $dbUser->getId();
                    $_SESSION['login'] = $dbUser->getLogin();
                    $_SESSION['pts'] = $dbUser->getPts();
                    return true;
                }
            }
            return false;
        }
}