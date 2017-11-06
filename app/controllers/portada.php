<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 04/11/2017
 * Time: 0:01
 */


$query ="";
$params=[];

$query ="";

if(!empty($_GET["id"]))
{

    $query.=" {$itemType}.id = ? ";
    $params[]=$_GET["id"];
}

//$data= R::find($itemType,$query,$params);

$data = R::find('portada',$query,$params);



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

        $items[$v->id]["data1"]="{$v->name}";
        $items[$v->id]["id"] =$v->id;
    }




}
else
{


    if(empty($dontPrint))
    {


        $data = json_encode($data);

        echo $data;

    }

}
