<?php


try
{
    include (".base/autoload.php");



    if($uri["module"]=="static")
    {
        $inc = BASE_PATH.str_replace($_ENV['website']['root'],"",parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $ext = explode(".",$inc);
        $ext = end($ext);

        $contentType ="text/plain";


        switch ($ext)
        {
            case 'ts':

                $contentType="video/MP2T";

                break;



            default:
                if(file_exists(BASE_PATH."/.base/cache/mimes.php"))
                {
                    include (BASE_PATH."/.base/cache/mimes.php");

                    if(!empty($mime_types[$ext]))
                    {
                        $contentType =$mime_types[$ext];
                    }
                }
                break;
        }

        if($ext!="php")
        {
            header("Content-Type: {$contentType}");
            readfile($inc);
        }
        else
        {

            include ($inc);
        }



    }
    else
    {
        switch($uri['action'])
        {

            case 'cron':
                $inc = BASE_PATH.str_replace($_ENV['website']['root'],"",parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

                include($inc);

                break;

            default:


                   include (BASE_PATH."/.base/url/load.php");

                break;

        }

    }





}
catch(Exception $e)
{

    $error = 500;
    $msg =$_LANG["error"];

    if(!empty($_LANG[$e->getMessage()]))
    {
        $msg =$_LANG[$e->getMessage()];
        $error=$e->getCode();

        $saveLog=true;

    }
    else
    {
        //Validation error

        $result = json_decode($e->getMessage());
        
        if (json_last_error() === JSON_ERROR_NONE) {

            // JSON is valid
            $msg=$result;
        }
        else
        {
            $saveLog=true;
        }

    }

    http_response_code($error);

   if(!empty($saveLog))
   {
       $log="\n{$e->getMessage()},{$e->getLine()},{$e->getFile()}";
       FileService::write($log,LOG_PATH."/error.log");
   }

    echo json_encode($msg);
}


?>


