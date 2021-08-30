<?php

namespace System;

use System\Dbh;
use Models\Sessions;

class SessionHandler implements \SessionHandlerInterface {

	private static $instance = NULL;

	private static $sessions;

    private function __construct() {

		self::$sessions = new Sessions();

		//var_dump(self::$sessions->findById(2));

		//exit;

    } 

    public static function getInstance($config = NULL) {

		if ( is_null( self::$instance ) ) {
	      self::$instance = new SessionHandler();
	    }
	    return self::$instance;
		
	}

	public function open($save_path,$session_name) {

		$limit = time() - (3600 * 24);

		self::$sessions->addParam('timestamp','<', time());

		return self::$sessions->deleteByWhere();
	}

	public function close() {
		return '';
	}

	public function read($key) {

		$res = self::$sessions->findById($key);

		if($res !== false) {
			return (string)$res['data'];
		} else {
			return false;
		}


	}

	public function write($key,$val) {


		self::$sessions->replaceInto();
	}

	public function destroy($key) {

	}

	public function gc($maxLifeTime) {

	}
}
