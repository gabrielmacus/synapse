<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 23/11/2017
 * Time: 12:58 PM
 */
//Leo los datos
include (BASE_PATH."/.base/db/read.php");
if(empty($_GET["act"]))
{
    $bodyClass[]="{$itemType}-list";

    $incBody=TEMPLATE_PATH."/{$itemType}/list.php";

    $items = [];

    foreach ($data as $k=>$v){
        $items[$v["id"]]["data1"] =$v["title"];
        $items[$v["id"]]["id"]=$v["id"];
    }


}
else
{


    if(empty($dontPrint))
    {
        echo json_encode($data);

    }

}