<?php
// Config

define('ROOT_PATH',str_replace( DIRECTORY_SEPARATOR . 'protected'  , '' , __DIR__));

define('VIEWS_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'Views');

define('ROOT_URL',$_SERVER['HTTP_HOST'] .'/');

if($_SERVER['HTTP_HOST'] === 'linkmob.wplabor.hu') {
	define('LIVE',1);
} else {
	define('LIVE',0);
}

if(LIVE) {
	define('DB_HOST','');
	define('DB_USER','');
	define('DB_PSW','');
	define('DB_DB','');
} else {
	define('DB_HOST','localhost');
	define('DB_USER', 'root');
	define('DB_PSW', 'sc1959op');
	define('DB_DB', 'linkmob');
}

$config = array (

	'database' => array(
		'host' => DB_HOST,
		'user' => DB_USER,
		'pw' => DB_PSW,
		'db' => DB_DB,
	),
	'admin_email' => 'csuporbela@gmail.com',
	'smtp' => array(
		'host' => 'smtp.gmail.com',
		'username' => 'csuporbela@gmail.com',
		'password' => 'asy3848mt',
		'port' => '587',
	),
	'views' => VIEWS_PATH,

);

return $config;
