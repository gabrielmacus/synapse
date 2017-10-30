<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 15/10/2017
 * Time: 22:53
 */
include ("rb.php");

R::setup( "mysql:host={$_ENV["db"]["host"]}:{$_ENV["db"]["port"]};dbname={$_ENV["db"]["name"]}",
    $_ENV["db"]["user"], $_ENV["db"]["password"] ); //for both mysql or mariaDB

if(!R::testConnection())
{
    throw new Exception("db.error.connecting",500);
}
