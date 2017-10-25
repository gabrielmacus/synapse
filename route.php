<?php

try
{
    include ("app/autoload.php");

	
    switch($uri['action'])
    {
        case 'js':
        case 'embed':
        case 'css':
        case 'downloads':
        case 'hls':
            $inc = BASE_PATH.str_replace($_ENV['website']['root'],"",parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
            $ext = explode(".",$inc);
            $ext = end($ext);

            switch ($ext)
            {
                case 'm3u8':

                    header('Content-Type: application/vnd.apple.mpegurl');

                    break;
                case 'ts':

                    header('Content-Type: video/MP2T');

                    break;
                case 'css':
                    header("Content-type: text/css");
                    break;
                case 'js':
                    header("Content-type: application/javascript");

                    break;
            }
            readfile($inc);


            break;
        case 'cron':
		 $inc = BASE_PATH.str_replace($_ENV['website']['root'],"",parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
          
		  include($inc);
		
		break;





        default:

            $uri['action'] =(!empty($uri['action']))?".{$uri['action']}":$uri['action'];


            if(empty($uri["module"]))
            {
                $uri["module"]="home";
                $uri["action"]="";
            }

            $itemType= $uri["module"];

            
            //Policies

            if(!empty($_ENV["policies"]["{$uri['module']}{$uri['action']}"]) && is_array($_ENV["policies"]["{$uri['module']}{$uri['action']}"]))
            {

                foreach ($_ENV["policies"]["{$uri['module']}{$uri['action']}"] as $policy)
                {

                    $policiesInc=POLICIES_PATH."/{$policy}.php";

                    if(file_exists($policiesInc))
                    {
                        include ($policiesInc);
                    }
                }


            }    

            //Validation
            $validationInc = BASE_PATH."/app/validations/{$uri['module']}{$uri['action']}.php";
            if( !empty($_GET["act"]) && file_exists($validationInc))
            {
                include ($validationInc);
            }
            



            include (CONTROLLER_PATH."/{$uri['module']}{$uri['action']}.php");

            if(!empty($incBody))
            {
                if(empty($incLayout))
                {
                    $incLayout = TEMPLATE_PATH."/layouts/layout.php";
                }

                if(empty($incNavbar))
                {
                    $incNavbar = TEMPLATE_PATH."/navbars/navbar.php";
                }
                include $incLayout;

            }

        break;

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


