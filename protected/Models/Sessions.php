<?php

namespace Models;

use System\Table;

class Sessions extends Table {

    public function __construct() {

        parent::__construct();

        $this->SetTableName('sessions');
        
    }




}