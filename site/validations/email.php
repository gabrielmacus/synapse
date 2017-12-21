
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 20/12/2017
 * Time: 12:57 PM
 */

$validationErrors=[];

$regex ="/^.{4,30}$/";
$msg  = str_replace("{a}",4,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",30,$msg);
$prop="name";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$prop}"]=$msg;
}

if(count($validationErrors))
{
    $validationErrors["isValidationError"]=true;

    throw new Exception(json_encode($validationErrors),400);
}
