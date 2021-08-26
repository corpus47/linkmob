<?php

namespace System;

class BaseClass {

	private static $instance = NULL;

	public function __construct() {

	}
	
	public static function getInstance() {

		if ( is_null( self::$instance ) )
	    {
	      self::$instance = new BaseClass();
	    }
	    return self::$instance;
		
	}

}