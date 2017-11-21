<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 04/11/2017
 * Time: 0:01
 */

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
    $bodyClass[]="{$itemType}-list";
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";


    $items = [];
    foreach ($data as $k=>$v)
    {
        if(!empty($v["name"]))
        {

            $f["size"]="{$v["size"]}";
            $f["id"] =$v["id"];
            $f["name"]=$v["name"];
            $f["description"]=$v["description"];
            $f["url"] =FileService::makeUrl($v);

            $items[]["file"]=$f;
        }

    }




}
else
{


    if(empty($dontPrint))
    {
        echo json_encode($data);

    }

}
