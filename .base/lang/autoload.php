<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 02/10/2017
 * Time: 22:27
 */


$langPath=BASE_PATH."/app/lang/{$language}.json";
$siteLangPath= BASE_PATH."/site/lang/{$language}.json";

if(!file_exists($langPath) || !file_exists($siteLangPath))
{
    throw new Exception("error.langNotExists",400);
}

$_LANG= json_decode(file_get_contents($langPath),true);

$_SITE_LANG= json_decode(file_get_contents($siteLangPath),true);



