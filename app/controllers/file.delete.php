<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 20/11/2017
 * Time: 20:58
 */

if(empty($_GET["act"]))
{

}
else
{


    if(!empty($_GET["id"]))
    {
       $fileToDelete =  R::load($itemType,$_GET["id"]);
    }

   include (BASE_PATH."/.base/db/delete.php");

    if(!empty($fileToDelete))
    {
        $ftp = new \FtpClient\FtpClient();

        $ftp->connect($_ENV["ftp"]["host"]);

        $ftp->login($_ENV["ftp"]["user"], $_ENV["ftp"]["password"]);


        $dirToRemove=dirname($_ENV["ftp"]["folder"]."/".$fileToDelete->url);

        $flist=$ftp->nlist($dirToRemove);

        foreach ($flist as $file)
        {
            $ftp->delete($dirToRemove."/".basename($file));
        }

        $ftp->rmdir($dirToRemove);



    }

    if(empty($dontPrint)) {
        echo json_encode($res);
    }
}
