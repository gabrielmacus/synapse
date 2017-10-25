<?php

$validationErrors=[];

$regex ="/^.{4,100}$/";
$msg  = str_replace("{a}",4,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",100,$msg);
$prop="name";


if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$regex ="/^.{1,2000}$/";
$msg  = str_replace("{a}",1,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",2000,$msg);
$prop="cmd";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}

if(count($validationErrors))
{
    throw new Exception(json_encode($validationErrors),400);
}
