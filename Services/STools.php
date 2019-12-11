<?php
require_once("Model/Manager/BDD.php");

class      STools extends BDD{

    public function     checkEmptyPost($var){
        if (isset($_POST[$var]) && !empty($_POST[$var]))
            return true;
        return false;
    }

    public function     checkEmptyGet($var){
        if (isset($_GET[$var]) && !empty($_GET[$var]))
            return true;
        return false;
    }

    public function     getDate(){
        date_default_timezone_set('Europe/Paris');
        return date("Y-m-d H:i:s");
    }

    public function     getTimeStamp($time){
        date_default_timezone_set('Europe/Paris');
        return strtotime($time);
    }

    public function     getSelectedPage($page){
        if (isset($_GET['page']))
            if (isset($_GET['page']) && $_GET['page'] == $page)
                return "nav-link active";
            else
                return "nav-link";
        else if ($page == "headquarter")
            return "nav-link active";
        return "nav-link";
    }
}