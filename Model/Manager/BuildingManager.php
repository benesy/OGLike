<?php
require_once("Model/Building.php");
require_once("Model/Manager/BDD.php");

class   BuildingManager extends BDD{

    public function getProduction(){
        $res = $this->dbquery("Select  SUM(building.prod) as prod FROM userbuildings INNER JOIN building ON userbuildings.lvl = building.lvl and userbuildings.buildingId = building.id WHERE userId = '".$_SESSION['id']."';");
        $res = $res->fetchAll();
            if (isset($res))
                return $res[0]['prod'];
            return 0;
    }

    public function getAllBuilding(){
        $buildings = array();
        $res = $this->dbquery("Select userbuildings.buildingId, userbuildings.lvl, building.resource, building.name, building.prod, building.cost FROM userbuildings INNER JOIN building ON userbuildings.lvl = building.lvl and userbuildings.buildingId = building.id WHERE userId = '".$_SESSION['id']."';");
        $res = $res->fetchAll();
        if (!empty($res)){
            foreach ($res as $dbBuilding){
                $building = new Building();
                $building->setId($dbBuilding['buildingId']);
                $building->setLvl($dbBuilding['lvl']);
                $building->setResources($dbBuilding['resource']);
                $building->setName($dbBuilding['name']);
                $building->setProd($dbBuilding['prod']);
                $building->setCost($dbBuilding['cost']);
                array_push($buildings, $building);
            }
            return $buildings;
        }
        return false;
    }

    public function getBuildingUpGrade($lvl, $resource){
        $res = $this->dbquery("SELECT cost FROM `building` WHERE lvl = ".$lvl." and resource = ".$resource.";");
        $res = $res->fetchAll();
        if (isset($res) && isset($res[0]))
            return $res[0]['cost'];
        return -1;
    }

    public function upgradeBuilding($lvl, $resource, $rs){
        $lvlup = $lvl + 1;
        $this->dbquery("UPDATE `userbuildings` SET `lvl`= ".$lvlup." WHERE `userId`= ".$_SESSION['id']." AND `lvl`= ".$lvl." LIMIT 1;");
        $this->dbquery("UPDATE `resources` SET `amount`= '".$rs."' WHERE `userId`= '".$_SESSION['id']."';");
    }

    public function addBuilding($resource){
        $res = $this->dbquery("INSERT INTO `userbuildings` (`userId`, `buildingId`, `lvl`) VALUES ('".$_SESSION['id']."', '".$resource."', '0');");
    }
}