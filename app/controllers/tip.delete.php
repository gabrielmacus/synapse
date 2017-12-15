<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 15/12/2017
 * Time: 02:28 PM
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
