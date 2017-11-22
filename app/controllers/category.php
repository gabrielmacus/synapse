<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 21/11/2017
 * Time: 20:26
 */

//Leo los datos
include (BASE_PATH."/.base/db/read.php");
if(empty($_GET["act"]))
{
    $bodyClass[]="{$itemType}-list";
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";


    $items = [];
    foreach ($data as $k=>$v)
    {

    }




}
else
{


    if(empty($dontPrint))
    {
        echo json_encode($data);

    }

}
