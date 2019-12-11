<?php

abstract class BDDParam{
    private $dbHost;
    private $dbBase;
    private $dbUser;
    private $dbPwd;
    private $dbCharset;
    private $dbDns;
    private $dbOptions;

    function    __construct()
    {
        $this->dbHost = '127.0.0.1';
        $this->dbBase = 'ogamelike';
        $this->dbUser = 'root';
        $this->dbPwd = 'root';
        $this->dbCharset = 'utf8mb4';
        $this->dbOptions = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];
        $this->dbDns = 'mysql:host='.$this->dbHost.';dbname='.$this->dbBase.';charset='.$this->dbCharset;

    }

    public function     getDbDns(){
        return $this->dbDns;
    }

    public function     getDbUser(){
        return $this->dbUser;
    }

    public function     getDbPwd(){
        return $this->dbPwd;
    }

    public function     getDbOptions(){
        return $this->dbOptions;
    }

}