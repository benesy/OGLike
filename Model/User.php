<?php

class   User{
    private $_id;
    private $_pwd;
    private $_login;
    private $_pts;

    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id = $id;
    }
    public function getPwd(){
        return $this->_pwd;
    }

    public function setPwd($pwd){
        $this->_pwd = $pwd;
    }
    public function getLogin(){
        return $this->_login;
    }

    public function setLogin($login){
        $this->_login = $login;
    }
    public function getPts(){
        return $this->_pts;
    }

    public function setPts($pts){
        $this->_pts = $pts;
    }

    public function __toString(){
        return $this->_login." (".$this->_id.") : ".$this->_pwd." - pts : ".$this->_pts;
    }
}