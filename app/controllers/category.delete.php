<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 22/11/2017
 * Time: 22:45
 */

if(empty($_GET["act"]))
{

}
else
{


    include (BASE_PATH."/.base/db/delete.php");


    if(empty($dontPrint)) {
        echo json_encode($res);
    }
}
