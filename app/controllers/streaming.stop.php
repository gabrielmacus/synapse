<?php

/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 17/10/2017
 * Time: 11:43 AM
 */
if(empty($_GET["act"]))
{

}
else {
    if (empty($_GET["id"])) {
        throw new Exception("streaming.error.idNotSpecified", 400);
    }

    $streaming = R::findOne('streaming', ' id = ? ', [$_GET["id"]]);

    if (empty($streaming)) {
        throw new Exception("streaming.error.streamingNotExists", 400);
    }

    
    if(empty($streaming->pid))
    {
        throw new Exception("streaming.error.streamingNotPlaying", 400);

    }

    $pid = $streaming->pid;


    HlsService::stopHls($pid,$streaming->id);

    $_POST["id"] = $_GET["id"];

    $_POST["pid"] = "";

    include (CONTROLLER_PATH."/streaming.save.php");

}