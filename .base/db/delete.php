<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 20/11/2017
 * Time: 20:59
 */

$res= empty($res)?[]:$res;

$item = R::dispense($itemType);

if(empty($_GET["id"]))
{
    throw new Exception("{$itemType}.error.notExists",400);
}


$item->id = $_GET["id"];

$res=R::trash($item);
