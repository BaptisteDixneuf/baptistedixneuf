<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
error_reporting(E_ALL);



define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT . DS . 'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('HOST', $_SERVER['HTTP_HOST']);

require CORE . DS . 'includes.php';
new Dispatcher();
?>






