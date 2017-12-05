
<?php


/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 24/10/2017
 * Time: 10:24 AM
 */



if(empty($_GET["act"]))
{

    $p = R::find('permission');

    foreach ($p as $k=>$v)
    {
        $permissions_options[$v->id] = $v->name;
    }



    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    $itemToSave = R::dispense($itemType);

    $_POST["type"] = (empty($_POST["type"]))?"account":$_POST["type"];

    $p = R::findOne('permission'," id = ? ",[$_POST['permission_id']]);

    if(empty($p))
    {
        throw new Exception("user.error.permissionsNotFound",500);
    }

    if(!empty($_POST["password"]))
    {
        $_POST["password"] = hash('sha256', $_POST["password"] );
    }

    $_POST["permission_id"] =$p->id;

    include (BASE_PATH."/.base/db/save.php");




    echo json_encode($res);
}
