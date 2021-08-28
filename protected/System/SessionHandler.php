<?php

namespace System;

use System\Dbh;
use Models\Sessions;

class SessionHandler implements \SessionHandlerInterface {

	private static $instance = NULL;

    private function __construct() {

		$sessions = new Sessions();

		$sessions->deleteByWhere();

    } 

    public static function getInstance($config = NULL) {

		if ( is_null( self::$instance ) )
	    {
	      self::$instance = new SessionHandler();
	    }
	    return self::$instance;
		
	}

	public function open($save_path,$session_name) {

	}

	public function close() {

	}

	public function read($key) {

	}

	public function write($key,$val) {

	}

	public function destroy($key) {

	}

	public function gc($maxLifeTime) {

	}
}
