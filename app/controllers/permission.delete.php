<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 31/10/2017
 * Time: 09:56 AM
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
        throw new Exception("repository.error.notExists",400);
    }


    $item->id = $_GET["id"];

    $res=R::trash($item);

    echo json_encode($res);
}
