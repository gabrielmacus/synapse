<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 16/10/2017
 * Time: 23:50
 */

setcookie("tk", '', time()-3600, "/");

header("Location: {$_ENV["website"]["root"]}/user/login");
