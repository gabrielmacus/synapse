<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 23/11/2017
 * Time: 12:58 PM
 */

if(empty($_GET["act"]))
{
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    include (BASE_PATH."/.base/db/save.php");

    echo json_encode($res);
}
