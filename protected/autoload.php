<?php

// Autoload

spl_autoload_register('myAutoLoad');

function myAutoLoad($className) {

	$extensions = '.php';

	$fullpath = __DIR__ . DIRECTORY_SEPARATOR . $className . $extensions;

	if(DIRECTORY_SEPARATOR == "/") {
	
		$fullpath = str_replace("\\" , "/", $fullpath);

	}

	

	if(!file_exists($fullpath)) {

		return false;

	}

	require_once $fullpath;

}

?>