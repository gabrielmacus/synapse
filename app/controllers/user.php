<?php


$query ="";
$params=[];

$query ="SELECT user.*,permission.* FROM user LEFT JOIN permission ON user.permission_id = permission.id WHERE user.id != {$userData->id} AND user.permission_id != {$_ENV["auth"]["developerPermissionGroup"]}";

if(!empty($_GET["id"]))
{

    $query.=" AND user.id = ? ";
    $params[]=$_GET["id"];
}

//$data= R::find($itemType,$query,$params);

$data = R::findMulti('user,permission',$query,$params);

$data =$data["user"];


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

    foreach ($data as $k=>$v)
    {

        if(!empty($v->name) && !empty($v->surname))
        {
            $items[$v->id]["data1"]="{$v->name} {$v->surname}";
        }
        else
        {
            $items[$v->id]["data1"]="{$v->username}";
        }

        $items[$v->id]["id"] =$v->id;
    }




}
else
{


     if(empty($dontPrint))
    {

        foreach ($data as $k=>$v)
        {
            unset($data[$k]["password"]);
        }

        $data = json_encode($data);

       echo $data;

    }

}
