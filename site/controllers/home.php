<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05/12/2017
 * Time: 09:50 AM
 */


$originalItemType = $itemType;

//Tips
$itemType="tip";
$dontCheckPermissions=true;
$orderBy=["RAND()"];
$limit=5;
include (BASE_PATH."/.base/db/read.php");
$oTips=$data;

foreach ($oTips as $k=>$v)
{
    $tips[]=["text"=>$v["text"],"icon","icon"=>reset($v["associated"]["file"]["icon"]["save"])["url"]];
}
//


//Trabajos realizados
$itemType="work";
$dontCheckPermissions=true;
$limit=18;
include (BASE_PATH."/.base/db/read.php");
$oWorks=$data;

foreach ($oWorks as $k=>$v)
{
    $portfolio[]=[

        "text"=>$v["text"],
        "images"=>$v["associated"]["file"]["images"]["save"]

    ];
}
//




$itemType=$originalItemType;



$incBody=SITE_TEMPLATE_PATH."/home/cuerpo.php";

