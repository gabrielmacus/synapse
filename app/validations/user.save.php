
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 24/10/2017
 * Time: 12:40 PM
 */

$validationErrors=[];

$min=4;$max=20;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="username";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$regex ="/^(?=.{{$min},{$max}}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/";
$prop="username";
$msg = $_LANG["validation.error.invalidFormat"];
if(!empty($_POST[$prop]) && !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$min=4;$max=100;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="password";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}




$min=4;$max=70;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="name";

if(!empty($_POST[$prop]) && !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$min=4;$max=70;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="surname";
if(!empty($_POST[$prop]) && !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$regex ='/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/';
$prop="email";
$msg = $_LANG["validation.error.invalidEmail"];
if(!empty($_POST[$prop]) && !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}



$prop="permission_id";
$msg =$_LANG["validation.error.cantBeEmpty"];
if(empty($_POST[$prop]) || !is_numeric($_POST[$prop]))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


if(count($validationErrors))
{
    throw new Exception(json_encode($validationErrors),400);
}
