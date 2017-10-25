<?php


$query ="";
$params=[];
if(!empty($_GET["id"]))
{

    $query=" id = ? ";
    $params[]=$_GET["id"];
}

$permissionGroups= R::find($itemType,$query,$params);


/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/10/2017
 * Time: 0:21
 */
if(empty($_GET["act"]))
{
    $bodyClass[]="{$itemType}-list";
    $incBody=TEMPLATE_PATH."/{$itemType}/list.php";


    $items = [];

    foreach ($permissionGroups as $k=>$v)
    {

        $items[$v->id]["data1"]=$v->name;
        $items[$v->id]["id"] =$v->id;
    }

}
else
{
    foreach ($permissionGroups as $k=>$v)
    {
        if(!empty($permissionGroups[$k]["actions"]))
        {
            $permissionGroups[$k]["actions"] = json_decode($permissionGroups[$k]["actions"],true);
        }
    }

    if(empty($dontPrint))
    {
        echo json_encode($permissionGroups);
    }

}
