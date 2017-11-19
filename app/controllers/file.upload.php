<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 19/11/2017
 * Time: 0:47
 */
if(empty($_GET["act"]))
{

}
else
{

    $res = [] ;

    if(!empty($_FILES))
    {
        //Subo solo de a un archivo

        $file =reset($_FILES);

        $tmpFolder = (!empty($_ENV["upload"]["tmpFolder"]))? BASE_PATH."/static/".$_ENV["upload"]["tmpFolder"]:false;




        if($file["error"] || !$tmpFolder )
        {
            throw new Exception("file.error.tmpUpload",500);
        }

        FileService::mmkdir($tmpFolder);

        $tmpFolder =$tmpFolder."/".time().$file["name"];

        FileService::move($file["tmp_name"],$tmpFolder);


        $tmpUrl  = "{$_ENV["website"]["url"]}/static/".$_ENV["upload"]["tmpFolder"]."/".time().$file["name"];

        $res[]=$tmpUrl;

    }


    echo json_encode($res);
}
