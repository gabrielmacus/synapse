<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 20/10/2017
 * Time: 04:41 PM
 */

$validationErrors=[];

$regex ="/^.{4,30}$/";
$msg  = str_replace("{a}",4,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",30,$msg);
$prop="name";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


if(count($validationErrors))
{
    throw new Exception(json_encode($validationErrors),400);
}
