<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 23/11/2017
 * Time: 12:59 PM
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
