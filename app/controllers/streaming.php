<?php


$query ="";
$params=[];

if(!empty($_GET["id"]))
{

    $query=" id = ? ";
    $params[]=$_GET["id"];
}

$streamings= R::find($itemType,$query,$params);


/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/10/2017
 * Time: 0:21
 */
if(empty($_GET["act"]))
{
    $bodyClass[]='streaming-list';
    $incBody=TEMPLATE_PATH."/streaming/list.php";


    $items = [];

    foreach ($streamings as $k=>$v)
    {   
        
        $items[$v->id]["data1"]=$v->name;
        $items[$v->id]["active"] =$v->pid;
        $items[$v->id]["id"] =$v->id;
    }
    
}
else
{
    if(empty($dontPrint))
    {
        echo json_encode($streamings);
    }

}
