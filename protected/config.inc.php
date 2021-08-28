<?php

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