<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 15/12/2017
 * Time: 02:28 PM
 */

if(empty($_GET["act"]))
{

    //Cargo las categorias si las hay para el tipo
    include BASE_PATH."/.base/db/categories.php";

    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{
    $res = [] ;

    include (BASE_PATH."/.base/db/save.php");

    echo json_encode($res);
}
