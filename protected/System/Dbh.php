<?php

namespace System;

use \PDO;

class Dbh extends BaseClass {
	
	private static $instance = NULL;

	private static $dbh = NULL;

	private static $log;

	public function __construct($config = NULL) {

		parent::getInstance();

		$dsn = "mysql:host=" . $config['database']['host'].";dbname=" . $config['database']['db'];

        try {

            self::$dbh = new \PDO( $dsn, $config['database']['user'], $config['database']['pw']);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $ex) {

        	$config['log']->log_to_file('Dbh error: ' . $ex->getMessage());

        	//$config['email']->alert_email('Dbh error: ' . $ex->getMessage());

            die('System halted!');

            exit;

        }
 
    }

    public function get_dbh() {

    	return self::$dbh;	

    }

}