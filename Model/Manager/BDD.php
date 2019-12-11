<?php

require_once("BDDParam.php");

abstract class   BDD extends BDDParam{
    private $db = false;

    // Connexion à la BDD
    private function dbConnect(){
        $this->db = new PDO($this->getDbDns(), $this->getDbUser(), $this->getDbPwd(), $this->getDbOptions());
    }

    // Execute la requete passé en paramètre et renvoie le résultat renvoyé
    public function dbquery($query){
        if ($this->db == false)
            $this->dbConnect();
        $res = $this->db->query($query);
        return $res;
    }
}