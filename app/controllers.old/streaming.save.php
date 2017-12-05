<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/10/2017
 * Time: 0:21
 */

if(empty($_GET["act"]))
{

    //Cargo las categorias si las hay para el tipo
    include BASE_PATH."/.base/db/categories.php";

    $incBody=TEMPLATE_PATH."/streaming/save.php";
}
else
{


   
    $res = [] ;

    $streaming = R::dispense('streaming');

    $user = R::findOne('user',' id = ? ',[$userData->id]);

    if(!empty($user))
    {

        $streaming->user = $user;
    }

    if(empty($_POST["id"]))
    {
        $streaming->created_at = time();
    }
    else
    {
        $streaming->updated_at = time();
    }

    ArrayService::setPropertiesToBean($_POST,$streaming);

    $res = R::store($streaming);


    echo json_encode($res);
}
