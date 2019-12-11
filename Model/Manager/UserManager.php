<?php
    require_once("Model/User.php");
    require_once("Model/Manager/BDD.php");

class   UserManager extends BDD{

    public function getUserByLogin($login){
        $res = $this->dbquery("SELECT * FROM `user` WHERE `login` = '".$login."';");
        $res = $res->fetchAll();
        if (!empty($res)){
            $res = $res[0];
            $usr = new User();
            $usr->setId($res['id']);
            $usr->setLogin($res['login']);
            $usr->setPwd($res['pwd']);
            $usr->setPts($res['pts']);
            return $usr;
        }
        return false;
    }

    public function getAllUsers()
    {
        $users = array();
        $res = $this->dbquery("SELECT * FROM `user` ORDER BY pts ASC;");
        $res = $res->fetchAll();
        if (!empty($res)){
            foreach ($res as $dbUser){
                $usr = new User();
                $usr->setId($dbUser['id']);
                $usr->setLogin($dbUser['login']);
                $usr->setPwd($dbUser['pwd']);
                $usr->setPts($dbUser['pts']);
                array_push($users, $usr);
                }
            return $users;
        }
        return false;
    }
}