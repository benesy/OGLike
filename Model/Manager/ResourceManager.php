<?php
require_once("Model/Manager/BuildingManager.php");
require_once("Model/Resource.php");
require_once("Services/STools.php");

class           ResourceManager extends BDD{
    
    public function updateResources(){
        $buildingManager = new BuildingManager();
        $t = new STools();

        $taux = $buildingManager->getProduction();
        $rs = $this->getResources();
        $rsTimestamp = $t->getTimeStamp($rs->getLastUpdate());
        $curTimestamp = $t->getTimeStamp($t->getDate());
        $addResources = $taux*($curTimestamp - $rsTimestamp)/60;
        $addResources += $rs->getAmount();
        $this->dbquery("UPDATE `resources` SET `lastUpdate`= '".$t->getDate()."',`amount`= '".$addResources."' WHERE `userId`= '".$_SESSION['id']."';");
    }

    public function getResources(){
        $res = $this->dbquery("SELECT * FROM resources WHERE userId = '".$_SESSION['id']."';");
        $res = $res->fetchAll();
        if (!empty($res)){
            $res = $res[0];
            $resource = new Resource();
            $resource->setAmount($res['amount']);
            $resource->setLastUpdate($res['lastUpdate']);
            return $resource;
        }
        $this->createResource();
        return $this->getResources();
    }

    private function createResource(){
        $t = new STools();
        $res = $this->dbquery("INSERT INTO `resources` (`userId`, `lastUpdate`, `amount`) VALUES ('".$_SESSION['id']."','".$t->getDate()."' , '0');");
    }
}