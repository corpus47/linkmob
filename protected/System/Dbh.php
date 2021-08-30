<?php

namespace System;

use \PDO;
use System\BaseClass;

class Dbh extends BaseClass{
	
	private static $instance = NULL;

	public static $dbh = NULL;

	private function __construct($config = NULL) {

		$dsn = "mysql:host=" . $config['database']['host'].";dbname=" . $config['database']['db'];

        try {

            self::$dbh = new \PDO( $dsn, $config['database']['user'], $config['database']['pw']);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $ex) {

        	//$config['log']->log_to_file('Dbh error: ' . $ex->getMessage());

        	//$config['email']->alert_email('Dbh error: ' . $ex->getMessage());

            //die('System halted! ->' . __METHOD__ . " " . $ex->getMessage());

            //exit;

			$this->dump_error(__METHOD__,$ex);

        }
 
    }

    public static function getInstance($config = NULL) {

		if ( is_null( self::$instance ) )
	    {
	      self::$instance = new Dbh($config);
	    }
	    return self::$instance;
		
	}

}