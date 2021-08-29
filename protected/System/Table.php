<?php

namespace System;

use System\Dbh;

class Table {

    public $config = NULL;

    public $dbh = NULL;

    public $fields = array();

    public $sql_params = array();


    public function __construct() {

        $this->config = Config::getInstance()::$config;

        $this->dbh = Dbh::getInstance($this->config)::$dbh;

        $this->SetFields();

    }

    public function TableName() {

        $path = explode('\\',strtolower(get_class($this)));

        return array_pop($path);
    }

    public function SetFields() {

        try {
            $sql = "DESCRIBE " . $this->TableName();

            $sth = $this->dbh->prepare($sql);

            $sth->execute();

        } catch(\PDOException $ex) {

            die($ex->getMessage());
        }

        echo '<pre>';var_export($sth->fetchAll());echo '</ pre>';

    }

    public function insert($row = array()) {

        if(empty($row)) {
            return false;
        }

    }

    public function deleteByID($id = null) {

        if ($id == NULL) {
            return false;
        }

    }

    public function deleteByWhere(){

        if(count($this->sql_params) == 0) {
            $this->error('Nincsenek paraméterek');
        } else {

            $sql = 'DELETE FROM ' . $this->TableName() . $this->makewhere();

            $sth = $this->dbh->prepare($sql);
            //var_dump($sql);exit;
            foreach($this->sql_params as $params) {
                $param = ':' . $params[0];
                $sth->bindParam($param,$params[2]);
            }

            try{

                return $sth->execute();

            } catch(\PDOException $ex) {
                die($ex->getMessage());
            }

        }

    }

    private function error($message = '') {
        die($message . ' - ' . __CLASS__ . ' - ' . __FUNCTION__);
    }

    /**
    * Make sql string
    *
    * @param boolean $or
    * @param integer $limit  
    * @param string  $orderby ordered field name
    *
    */
    private function makewhere($or = FALSE, $limit = NULL, $orderby = NULL) {

        $where = " WHERE";

        if($or) {
            $rel = 'OR'; 
        } else {
            $rel = 'AND';
        }

        $i = 0; 

        foreach($this->sql_params as $params) {
            $where .= ' ' . $params[0] . ' ' . $params[1] . ' :' . $params[0];
            $i++;
            if($i < count($this->sql_params)) {
                $where .= ' ' . $rel;
            }
        }

        if($limit !== NULL) {
            $where .= ' LIMIT ' . $limit;
        }

        if($orderby !== NULL) {

            $where .= " ORDER BY " . $orderby;

        }

        //$this->deleteSql_params();

        return $where;

    }

    public function deleteSql_params() {

        $this->sql_params = array();

    }

    public function findById($id = NULL) {

        if($id == NULL) {
            return false;
        }
        $this->addParam('id','=',$id);
        $sql = "SELECT * FROM " . $this->TableName() . $this->makewhere();
        $sth = $this->dbh->prepare($sql);
        foreach($this->sql_params as $params) {
            $param = ':' . $params[0];
            $sth->bindParam($param,$params[2]);
        }
        try{

            $sth->execute();

        } catch(\PDOException $ex) {
            die($ex->getMessage());
        }

        return $sth->fetch();

    }

    public function getRows($attr = array()) {

    }

    /*
    * Replace into implementation
    *
    * @param array $attr
    */
    public function replaceInto($attr = NULL) {

    }

    public function addParam($name = NULL, $condition = NULL, $value = NULL) {

        if(!isset($this->sql_params[$name])) {

            $this->sql_params[] = array($name,$condition, $value);

        }

    }

}