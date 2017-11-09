<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 04/11/2017
 * Time: 0:07
 */

if(empty($_GET["act"]))
{
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    $item = R::dispense($itemType);

    $user = R::findOne('user',' id = ? ',[$userData->id]);

    if(!empty($user))
    {

        $item->user = $user;
    }

    if(empty($_POST["id"]))
    {
        $item->created_at = time();
    }
    else
    {
        $item->updated_at = time();
    }

    ArrayService::setPropertiesToBean($_POST,$item);

    $res = R::store($item);



    echo json_encode($res);
}
