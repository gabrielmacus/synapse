<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 31/10/2017
 * Time: 01:58 PM
 */

$uri['action'] =(!empty($uri['action']))?".{$uri['action']}":$uri['action'];


if(empty($uri["module"]))
{
    $uri["module"]="home";
    $uri["action"]="";
}

$itemType= $uri["module"];


$policiesPath = (!empty($_ENV["panel"]))?POLICIES_PATH:SITE_POLICIES_PATH;
$validationPath  = (!empty($_ENV["panel"]))?VALIDATION_PATH:SITE_VALIDATION_PATH;
$controllerPath =  (!empty($_ENV["panel"]))?CONTROLLER_PATH:SITE_CONTROLLER_PATH;
$templatePath = (!empty($_ENV["panel"]))?TEMPLATE_PATH:SITE_TEMPLATE_PATH;

//Policies

if(isset($_ENV["policies"]["{$uri['module']}{$uri['action']}"]) && is_array($_ENV["policies"]["{$uri['module']}{$uri['action']}"]))
{

    foreach ($_ENV["policies"]["{$uri['module']}{$uri['action']}"] as $policy)
    {

        $policiesInc=$policiesPath."/{$policy}.php";

        if(file_exists($policiesInc))
        {
            include ($policiesInc);
        }
    }

}
elseif(!empty($_ENV[$_ENV["website"]["panelAccess"]]))
{
    //En el panel, x defecto chequeo autenticacion y permisos, si no hay policies especificadas para el controlador

    //Politica "si esta logueado"
    $isLogged =$policiesPath."/isLogged.php";
    if(file_exists($isLogged))
    {
        include ($isLogged);
    }
    //Politica "chequeo los permisos"
    $cpermissions =$policiesPath."/checkPermissions.php";
    if(file_exists($cpermissions))
    {
        include ($cpermissions);
    }





}

//Validation
$validationInc = "{$validationPath}/{$uri['module']}{$uri['action']}.php";

if( !empty($_GET["act"]) && file_exists($validationInc))
{
    include ($validationInc);
}


include ($controllerPath."/{$uri['module']}{$uri['action']}.php");

if(!empty($incBody))
{
    if(empty($incLayout))
    {
        $incLayout = $templatePath."/layouts/layout.php";
    }

    if(empty($incNavbar))
    {
        if(file_exists($templatePath."/navbars/navbar.php"))
        {
            $incNavbar = $templatePath."/navbars/navbar.php";
        }

    }
    include $incLayout;

}

