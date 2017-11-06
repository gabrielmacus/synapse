<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 04/11/2017
 * Time: 0:11
 */
if(empty($_GET["act"]))
{

}
else
{

    $res = [] ;

    $item = R::dispense($itemType);

    if(empty($_GET["id"]))
    {
        throw new Exception("permission.error.notExists",400);
    }


    $item->id = $_GET["id"];

    $res=R::trash($item);

    echo json_encode($res);
}
