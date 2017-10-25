<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 21/10/2017
 * Time: 4:46
 */

if(empty($_GET["act"]))
{
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    $permissionGroup = R::dispense($itemType);

    $user = R::findOne('user',' id = ? ',[$userData->id]);

    if(!empty($user))
    {

        $permissionGroup->user = $user;
    }

    if(empty($_POST["id"]))
    {
        $permissionGroup->created_at = time();
    }
    else
    {
        $permissionGroup->updated_at = time();
    }

    if(!empty($_POST["actions"]))
    {
        $_POST["actions"] = json_encode( $_POST["actions"]);
    }

    ArrayService::setPropertiesToBean($_POST,$permissionGroup);


    $res = R::store($permissionGroup);


    echo json_encode($res);
}
