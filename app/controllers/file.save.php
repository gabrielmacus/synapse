<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 18/11/2017
 * Time: 23:40
 */
if(empty($_GET["act"]))
{
    $incBody=TEMPLATE_PATH."/{$itemType}/save.php";
}
else
{

    $res = [] ;

    $ftp = new \FtpClient\FtpClient();
    $ftp->connect($_ENV["ftp"]["host"]);
    $ftp->login($_ENV["ftp"]["user"], $_ENV["ftp"]["password"]);

    $path = date("Y/m/d")."/".uniqid();

    $ftpFolder= rtrim($_ENV["ftp"]["folder"],"/")."/".$path."/";

    @$ftp->mkdir($ftpFolder);

    $tmpFile = BASE_PATH.str_replace($_ENV["website"]["url"],"",$_POST["url"]);

    $remoteFileName="file_".$userData->id.".".FileService::getExt($tmpFile);

    $remoteFile = $ftpFolder.$remoteFileName;

    $_POST["url"]=$path."/".$remoteFileName;

    $_POST["size"] = filesize($tmpFile);



    if(!file_exists($tmpFile))
    {
        throw new Exception("file.error.tmpFileNotExists",500);
    }


    if(!$ftp->put($remoteFile,$tmpFile,FTP_BINARY))
    {
        throw new Exception("file.error.ftpUpload",500);
    }

    include (BASE_PATH."/.base/db/save.php");

    unlink($tmpFile);

    echo json_encode($res);
}
