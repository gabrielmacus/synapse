<?php
//Leo los datos
include (BASE_PATH."/.base/db/read.php");


/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/10/2017
 * Time: 0:21
 */
if(empty($_GET["act"]))
{
    $bodyClass[]='repository-list';
    $incBody=TEMPLATE_PATH."/repository/list.php";


    $items = [];

    foreach ($data as $k=>$v)
    {

        $items[$v["id"]]["data1"]=$v["name"];
        $items[$v["id"]]["id"] =$v["id"];
    }

}
else
{
    if(empty($dontPrint))
    {
        echo json_encode($data);
    }

}
