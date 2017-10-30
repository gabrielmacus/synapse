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
