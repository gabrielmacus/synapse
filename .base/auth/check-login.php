<?php

include "check-user-data.php";

if(empty($userData))
{

    if(empty($_GET["act"]))
    {
        setcookie("redirect",$_SERVER["REQUEST_URI"]);

        header("Location: {$_ENV['website']['root']}/{$language}/{$_ENV["website"]["panelAccess"]}/user/login",true,302);

        exit();


    }
    else
    {
       throw new Exception("auth.error.notLogged",403);
    }



}