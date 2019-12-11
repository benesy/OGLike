<?php

class   Building{
    private $_id;
    private $_name;
    private $_resource;
    private $_prod;
    private $_lvl;
    private $_cost;

    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function getName(){
        return $this->_name;
    }

    public function setName($name){
        $this->_name = $name;
    }

    public function getResources(){
        return $this->_resource;
    }

    public function setResources($resources){
        $this->_resource = $resources;
    }

    public function getProd(){
        return $this->_prod;
    }

    public function setProd($prod){
        $this->_prod = $prod;
    }
    public function getLvl(){
        return $this->_lvl;
    }

    public function setLvl($lvl){
        $this->_lvl = $lvl;
    }

    public function getCost(){
        return $this->_cost;
    }

    public function setCost($cost){
        $this->_cost = $cost;
    }

    public function __toString(){
        return $this->_name." (".$this->_id.") type ressource : ".$this->_resource." lvl : ".$this->_lvl." prod : ".$this->_lvl." cost:".$this->_cost ;
    }
}