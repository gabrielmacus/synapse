<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 01/11/2017
 * Time: 02:40 PM
 */
use \Firebase\JWT\JWT;

unset($user["password"]);

setcookie("tk",JWT::encode($user,$_ENV["auth"]["secret"]),time()+$_ENV["auth"]["sessionTime"],'/');

$redirect =($_ENV["website"]["root"] !="")?$_ENV["website"]["root"]."/{$language}/{$_ENV["website"]["panelAccess"]}/":"/{$language}/{$_ENV["website"]["panelAccess"]}/";


if(!empty($_COOKIE["redirect"]))
{
    $redirect = $_COOKIE["redirect"];
}

header("Location: {$redirect}");