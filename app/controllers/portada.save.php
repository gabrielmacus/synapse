<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 04/11/2017
 * Time: 0:07
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
