
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

    if($_POST["type"] == "account")
    {
        $user = R::findOne('user',' id = ? ',[$userData->id]);

        if(!empty($user))
        {

            $itemToSave->user = $user;
        }
    }


    if(empty($_POST["id"]))
    {
        $itemToSave->created_at = time();
    }
    else
    {
        $itemToSave->updated_at = time();
    }


    $p = R::findOne('permission'," id = ? ",[$_POST['permission_id']]);


    if(empty($p))
    {
        throw new Exception("user.error.permissionsNotFound",500);
    }


    //unset($_POST["permission_id"]);

    ArrayService::setPropertiesToBean($_POST,$itemToSave);



    $itemToSave->password = hash('sha256', $itemToSave->password );

    $itemToSave->permission =$p;


    $res = R::store($itemToSave);


    echo json_encode($res);
}
