
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 20/12/2017
 * Time: 12:57 PM
 */

$validationErrors=[];

/**
 * Name
 */

$prop="name";
$regex ="/^.{4,30}$/";
$msg  = str_replace("{a}",4,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",30,$msg);

if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$prop}"]=$msg;
}


/**
 * Email
 */
$msg =$_LANG["validation.error.invalidEmail"];
$prop = "from";

if(empty($_POST["from"]) || !ValidationService::validate($_POST[$prop],'/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD'))
{
    $validationErrors["{$prop}"]=$msg;
}

/**
 * Message
 */

$prop="message";
$regex ="/^.{10,500}$/";
$msg  = str_replace("{a}",10,$_LANG["validation.error.lengthBetween"]);
$msg  = str_replace("{b}",500,$msg);

if(empty($_POST[$prop]) || !ValidationService::validate($_POST[$prop],$regex,$msg))
{
    $validationErrors["{$prop}"]=$msg;
}




if(count($validationErrors))
{
    $validationErrors["isValidationError"]=true;

    throw new Exception(json_encode($validationErrors),400);
}




