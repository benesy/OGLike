<?php

class   Resource{
    private $_lastUpdate;
    private $_amount;

    public function getLastUpdate(){
        return $this->_lastUpdate;
    }

    public function setLastUpdate($lastUpdate){
        $this->_lastUpdate = $lastUpdate;
    }

    public function getAmount(){
        return $this->_amount;
    }

    public function setAmount($amount){
        $this->_amount = $amount;
    }
}