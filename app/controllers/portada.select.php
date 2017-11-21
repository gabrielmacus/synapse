<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 21/11/2017
 * Time: 01:02 PM
 */

if(empty($_GET["act"]))
{


}
else
{
    if (empty($_GET["id"]))
    {
        throw new Exception("{$itemType}.error.idNotSpecified",400);
    }

    $item = R::load($itemType,$_GET["id"]);

    if(empty($item))
    {
        throw new Exception("{$itemType}.error.notExists",400);
    }

    R::exec("UPDATE {$itemType} SET selected = 0");

    $item->selected =true;

    $res=R::store($item);

    echo json_encode($res);




}
