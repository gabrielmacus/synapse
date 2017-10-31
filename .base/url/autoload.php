<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 15/10/2017
 * Time: 22:04
 */


$requestUri= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


if(!empty($_ENV["website"]["root"]))
{
    $requestUri = str_replace($_ENV["website"]["root"],"",$requestUri);
}

$requestUri = explode("/",$requestUri);

//Elimino el item vacio
array_splice($requestUri,0,1);

//Obtengo el lenguaje
$language = reset($requestUri);

//Verifico si es un lenguage, si no lo es, asigno el por defecto
if(!in_array($language,$_ENV["website"]["languages"]))
{

    $language = $_ENV["website"]["defaultLanguage"];


}
else
{
    array_splice($requestUri,0,1);
}


$idx=array_search($_ENV["website"]["panelAccess"],$requestUri);

if($idx !== FALSE)
{
    //Estoy en el panel
    $_ENV["panel"]=true;
    array_splice($requestUri,$idx,1);

}


$uri["module"]=reset($requestUri);

$uri["action"] = next($requestUri);



/*
$requestUri= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


if(!empty($_ENV["website"]["root"]))
{
    $requestUri = str_replace($_ENV["website"]["root"],"",$requestUri);
}

$requestUri = explode("/",$requestUri);

unset($requestUri[0]);

$language = reset($requestUri);

if(!in_array($language,$_ENV["website"]["languages"]))
{
    $language = $_ENV["website"]["defaultLanguage"];

}
else
{
    unset($requestUri[1]);
}


    $uri["module"]=reset($requestUri);

    $uri["action"] = next($requestUri);
*/