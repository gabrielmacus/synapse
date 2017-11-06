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

    $repository = R::dispense($itemType);

    $user = R::findOne('user',' id = ? ',[$userData->id]);

    if(!empty($user))
    {

        $repository->user = $user;
    }

    if(empty($_POST["id"]))
    {
        $repository->created_at = time();
    }
    else
    {
        $repository->updated_at = time();
    }

    ArrayService::setPropertiesToBean($_POST,$repository);

    $res = R::store($repository);


    echo json_encode($res);
}
