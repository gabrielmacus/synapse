<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 16/10/2017
 * Time: 23:03
 */

if(!empty($_COOKIE["tk"]))
{
    $tk =$_COOKIE["tk"];

    if(!$userData = \Firebase\JWT\JWT::decode($tk,$_ENV["auth"]["secret"],array('HS256')))
    {

        unset($_COOKIE["tk"]);
		if(empty($_GET["act"]))
		{
			
		}
		else
		{
			throw new Exception("auth.error.invalidData",400);
		}
    }
}