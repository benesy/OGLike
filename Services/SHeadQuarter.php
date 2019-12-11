<?php
require_once("Services/Stools.php");

class       SHeadQuarter{

    public function checkUpgrade()
    {
        $t = new STools();
        $rs = new ResourceManager();
        $bm = new BuildingManager();

        if (isset($_GET["lvlup"]) && isset($_GET["resource"])) {
            $cost = $bm->getBuildingUpGrade($_GET['lvlup'] + 1, $_GET["resource"]);
            if ($cost != -1){
                $resource = $rs->getResources();
                $cost = $bm->getBuildingUpGrade($_GET['lvlup'], $_GET["resource"]);
                $updateRs = $resource->getAmount() - $cost;
                if ($cost != -1 && ($resource->getAmount() >= $cost))
                    $bm->upgradeBuilding($_GET['lvlup'], $resource, $updateRs);
            }
        }
        if (isset($_GET['newBuiding'])) {
            $bm->addBuilding(1);
        }
    }
}
