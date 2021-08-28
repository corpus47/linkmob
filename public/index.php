<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

require_once('..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'autoload.php');

require_once('..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'config.inc.php');

$req = explode('/', $_SERVER['REQUEST_URI']);

$app = new App();

$app::run();

?>
