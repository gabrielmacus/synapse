<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 16/10/2017
 * Time: 23:13
 */
include BASE_PATH."/app/auth/check-user-data.php";


if(!empty($userData))
{
    $redirect= $_ENV["website"]["root"];

    if(!empty($_COOKIE["redirect"]))
    {
        $redirect = $_COOKIE["redirect"];
    }


    if(empty($redirect))
    {
        $redirect ="/";
    }

    header("Location: {$redirect}");

    exit();
}
