<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 17/10/2017
 * Time: 04:06 PM
 */

if(empty($_GET["act"]))
{

    $bodyClass[]='streaming-watch';
    $incBody=TEMPLATE_PATH."/streaming/watch.php";
    $dontPrint= true;
    $_GET["act"]=true;
    include CONTROLLER_PATH."/streaming.php";

   
   $streaming = reset($streamings);
    
    
}