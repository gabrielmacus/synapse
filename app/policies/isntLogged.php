<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 16/10/2017
 * Time: 23:13
 */
include BASE_PATH."/.base/auth/check-user-data.php";


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

    //TODO redireccionar correctamente aca, a la redireccion del usuario en cuestion

    header("Location: {$redirect}");

    exit();
}
