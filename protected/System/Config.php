<?php

namespace System;

class Config {

    public static $config = array();

    private static $instance = NULL;

    private function __construct() {

        self::$config = array (

            'database' => array(
                'host' => DB_HOST,
                'user' => DB_USER,
                'pw' => DB_PSW,
                'db' => DB_DB,
            ),
            'admin_email' => 'csuporbela@gmail.com',
            'smtp' => array(
                //'host' => 'smtp.gmail.com',
                //'username' => 'csuporbela@gmail.com',
                //'password' => 'asy3848mt',
                //'port' => '587',
            ),
            'root_path' => str_replace( DIRECTORY_SEPARATOR . 'protected'  . DIRECTORY_SEPARATOR . 'System', '' , __DIR__),
            'root_url' => $_SERVER['HTTP_HOST'] .'/'
        
        );

        self::$config['views'] = self::$config['root_path'] . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'Views';


    }

    public static function getInstance($config = NULL) {

		if ( is_null( self::$instance ) )
	    {
	      self::$instance = new Config();
	    }
	    return self::$instance;
		
	}

}