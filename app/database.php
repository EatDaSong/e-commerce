<?php

namespace app;

use \PDO;

class database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO() {

        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function queryFetchAll($statement) {

        $req = $this->getPDO()->query($statement);
        $datas = $req->FetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function queryFetchAllClass($statement, $class_name) {

        $req = $this->getPDO()->query($statement);
        $datas = $req->FetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }

    public function prepareClass($statement, $attributes, $class_name, $one = false) { //Si atribue one sur true, on exec un simple fetch
        
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->FetchAll();
        }
        return $datas;
    }
    
    public function prepareAssoc($statement)    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        return $datas;
    }
    
    public function queryFetchAssoc($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        return $datas;
    }
    
    public function prepareExec($statement) {
        $req = $this->getPDO()->prepare($statement);
        $req->execute();
    }

}
