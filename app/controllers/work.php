<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 15/12/2017
 * Time: 04:19 PM
 */
//Leo los datos
include (BASE_PATH."/.base/db/read.php");
if(empty($_GET["act"]))
{
    $bodyClass[]="{$itemType}-list";

    $incBody=TEMPLATE_PATH."/{$itemType}/list.php";

    $items = [];



    foreach ($data as $k=>$v){
        $items[$v["id"]]["data1"] =$v["text"];


        if(!empty($v["associated"]) && !empty($v["associated"]["file"]) && !empty($v["associated"]["file"]["images"]))
        {
            $image = reset($v["associated"]["file"]["images"]["save"])["url"];

            $items[$v["id"]]["image"]=$image;
        }


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