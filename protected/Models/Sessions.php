<?php

namespace Models;

use System\Table;

class Sessions extends Table {


    public function __construct() {

        //parent::__construct();

        $this->init();

        //echo __CLASS__;

        $this->SetTableName('sessions');
        
    }

    public function SetFields() {

        $this->fields = array(
                                'id',
                                'timestamp',
                                'data');

    }




}