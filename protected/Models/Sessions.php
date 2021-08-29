<?php

namespace Models;

use System\Table;

class Sessions extends Table {


    public function __construct() {

        parent::__construct();

        echo $this->TableName();

        //var_dump($this->SetFields());

        
    }

}