
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 24/10/2017
 * Time: 12:40 PM
 */

$validationErrors=[];

$min=1;$max=70;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="name";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$min=1;$max=30;
$regex ="/^.{{$min},{$max}}$/";
$msg  = str_replace("{a}",$min,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",$max,$msg);
$prop="login_redirect";
if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}


$msg  = $_LANG["validation.error.invalidFormat"];
$prop="actions";
if(empty($_POST[$prop]) || !is_array($_POST[$prop]))
{
    $validationErrors["{$itemType}.{$prop}"][]=$msg;
}



if(count($validationErrors))
{
    throw new Exception(json_encode($validationErrors),400);
}
