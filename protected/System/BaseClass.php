<?php

namespace System;

class BaseClass {


	public function __construct() {

		
	}

	/*
	*
	* @param string $method method name
	* $param mixed  $ex     PDO exeption
	*/
	public function dump_error($method,$ex){

		die("Error: -> " . $method . " " . $ex->getMessage());

		exit(-1);

	}

}