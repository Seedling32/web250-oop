<?php
ob_start(); // turn on output buffering

// session_start(); // turn on sessions if needed

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


require_once('functions.php');
require_once('status_error_functions.php');
require_once('db_credentials.php');
require_once('db_functions.php');
require_once('validation_functions.php');

/*
    You can list the required classes manually or use the autoload class.
    I have purposely left the autoload class because the code is difficult.
  */


// Autoload class definitions
function my_autoload($class)
{
  if (preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '.class.php');
  }
}
spl_autoload_register('my_autoload');

$database = db_connect();
DatabaseObject::set_database($database);
