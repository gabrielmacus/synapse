<?php

include "check-user-data.php";

if(empty($userData))
{

    setcookie("redirect",$_SERVER["REQUEST_URI"]);
    header("Location: {$_ENV['website']['root']}/{$language}/{$_ENV["website"]["panelAccess"]}/user/login");
    exit();
}