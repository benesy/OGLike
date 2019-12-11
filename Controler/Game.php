<?php
require_once("Model/Manager/ResourceManager.php");
require_once("Model/Manager/BuildingManager.php");
require_once("Services/SHeadQuarter.php");
require_once("Services/SLogin.php");
require_once("Services/STools.php");

class   Game{

    public function     Ranking(){
        $userManager = new UserManager();
        $rs = new ResourceManager();
        $buildingManager = new BuildingManager();
        $t = new STools();

        $rs->updateResources();
        $resource = $rs->getResources();
        $usr = $userManager->getAllUsers();
        $taux = $buildingManager->getProduction();
        $this->DisplayRanking("Classement", $usr, $resource, $taux);
    }

    public function     Attack(){
        $rs = new ResourceManager();
        $buildingManager = new BuildingManager();

        $rs->updateResources();
        $resource = $rs->getResources();
        $taux = $buildingManager->getProduction();
        $this->DisplayAttack("Attaquer", $resource, $taux);
    }

    public function     HeadQuarter(){
        $buildings = new BuildingManager();
        $rs = new ResourceManager();
        $hq = new SHeadQuarter();
        
        $rs->updateResources();
        $hq->CheckUpgrade();
        $resource = $rs->getResources();
        $allBuildings = $buildings->getAllBuilding();
        $taux = $buildings->getProduction();
        $this->DisplayHQ("QG", $allBuildings, $resource, $taux);
    }

    public function     DisplayRanking($title, $user, $resource, $taux){
        require("View/Resource.php");
        require("View/Ranking.php");
        require("View/Menu.php");
        require("View/Template.php");
    }

    public function     DisplayAttack($title, $resource, $taux){
        require("View/Attack.php");
        require("View/Resource.php");
        require("View/Menu.php");
        require("View/Template.php");
    }
    public function     DisplayHQ($title, $buildings, $resource, $taux){
        require("View/Resource.php");
        require("View/HeadQuarter.php");
        require("View/Menu.php");
        require("View/Template.php");
    }
}