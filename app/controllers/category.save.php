<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 22/11/2017
 * Time: 22:22
 */

if(empty($_GET["act"]))
{
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    include (BASE_PATH."/.base/db/save.php");

    $cat = $res;

    //Leo las categorias actualizadas y las guardo en caché

    FileService::write(json_encode(R::find('category')),BASE_PATH."/.base/cache/categories.json",'w');


    echo json_encode($cat);
}
