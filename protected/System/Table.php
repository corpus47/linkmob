<?php

namespace System;

use System\Dbh;

class Table {

    protected $table_name = NULL;

    public $config = NULL;

    public $dbh = NULL;

    public $fields = array();

    public $sql_params = array();

    public function __construct() {

        $this->config = Config::getInstance()::$config;

        $this->dbh = Dbh::getInstance($this->config)::$dbh;

    }

    public function SetTableName($name) {

        $this->table_name = $name;

    }

    public function GetTableName() {
        return $this->table_name;
    }

    public function SetFields() {

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
        }

    }

    private function error($message = '') {
        die($message . ' - ' . __CLASS__ . ' - ' . __FUNCTION__);
    }
    
    private function makewhere($or = FALSE) {

        $where = " WHERE";

        foreach($this->sql_params as $params) {
            for($i = 0; $i<=2,$i++) {
                if( $i < 2 ) {
                    $where .= $params[$i];
                } else {
                    $where .= ':' . $params
                }
            }
        }

    }

    public function deleteSql_params() {

        $this->sql_params = array();

    }

    public function findById($pk = NULL) {

        if($pk == NULL) {
            return false;
        }

    }

    public function getRows($attr = array()) {

    }

    public function addParam($name = NULL, $condition = NULL) {

        if(!isset($this->sql_params[$name])) {

            $this->sql_params[] = array($name,$condition,$value);

        }

    }

    public function getParams() {
        var_export($this->sql_params);
    }

}