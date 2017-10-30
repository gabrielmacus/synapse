<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 02/10/2017
 * Time: 22:07
 */

define('BASE_PATH',dirname(dirname(__FILE__)));
define('CONTROLLER_PATH',BASE_PATH."/app/controllers");
define('TEMPLATE_PATH',BASE_PATH."/app/templates");
define('LOG_PATH',BASE_PATH."/.base/log");
define('POLICIES_PATH',BASE_PATH.'/app/policies');


set_error_handler(function($errno, $errstr, $errfile, $errline){


    throw new Exception("[{$errstr},{$errline},{$errfile}]",$errno);



},E_ALL);

include (BASE_PATH."/vendor/autoload.php");

if(empty($env) || $env = "DEV")
{
    $env = file_get_contents(BASE_PATH."/.base/env/development.json");
    
}
else if ($env = "PROD")
{
    $env = file_get_contents(BASE_PATH."/.base/env/production.json");

}

$_ENV = json_decode($env,true);

include ("url/autoload.php");

//For composer
//include (BASE_PATH."/vendor/autoload.php");

include ("lang/autoload.php");

include ("auth/autoload.php");

include ("services/autoload.php");

include ("db/autoload.php");
//For websockets
//include ("websockets/Chat.php");



