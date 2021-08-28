<?php

namespace System;

class Render extends \System\BaseClass {

    public function __construct($config = NULL,$action = NULL) {

       $this->dbh = new \System\Dbh($config);

    }

    public static function dump($action = NULL) {
        var_dump($action);exit;
    }

}