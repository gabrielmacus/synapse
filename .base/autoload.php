<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 02/10/2017
 * Time: 22:07
 */

define('BASE_PATH',dirname(dirname(__FILE__)));
define('LOG_PATH',BASE_PATH."/.base/log");

define('CONTROLLER_PATH',BASE_PATH."/app/controllers");
define('TEMPLATE_PATH',BASE_PATH."/app/templates");
define('POLICIES_PATH',BASE_PATH.'/app/policies');
define('VALIDATION_PATH',BASE_PATH.'/app/validations');


define("SITE_CONTROLLER_PATH",BASE_PATH."/site/controllers");
define("SITE_TEMPLATE_PATH",BASE_PATH."/site/templates");
define('SITE_POLICIES_PATH',BASE_PATH.'/site/policies');
define('SITE_VALIDATION_PATH',BASE_PATH.'/site/validations');

//Tipos de permisos
define("PERMISSION_ME",1);
define("PERMISSION_GROUP",2);
define("PERMISSION_EVERYONE",3);

set_error_handler(function($errno, $errstr, $errfile, $errline){


    if(error_reporting())
    {

        throw new Exception("[{$errstr},{$errline},{$errfile}]",$errno);


    }




},E_ALL);


//Composer
//include (BASE_PATH."/vendor/autoload.php");

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



