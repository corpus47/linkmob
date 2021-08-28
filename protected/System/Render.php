<?php

namespace System;

use System\Dbh;

class Render {

    private $dbh = NULL;

    public function __construct($config = NULL,$action = NULL) {

       $this->dbh = Dbh::getInstance($config)::$dbh;

    }

    public function dump($action = NULL) {
        var_dump($action);
        $dbh = $this->dbh;
        //var_export($dbh);
        //exit;
    }

}