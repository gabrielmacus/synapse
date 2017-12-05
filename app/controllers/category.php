<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 21/11/2017
 * Time: 20:26
 */

//No pagino

$dontPaginate = true;

//Leo los datos
include (BASE_PATH."/.base/db/read.php");


if(empty($_GET["act"]))
{
    $bodyClass[]="{$itemType}-list";
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";

    $items = [];

    ArrayService::makeCategoriesTree($data,0,$items);



}
else
{


    if(!empty($_GET["tree"]) && $_GET["tree"] == true)
    {
        $cat = $data;
        $data=[];
        ArrayService::makeCategoriesTree($cat,0,$data);

    }

    if(empty($dontPrint))
    {
        echo json_encode($data);

    }

}
