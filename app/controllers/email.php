
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/12/2017
 * Time: 12:20 PM
 */



if(empty($_GET["act"]))
{

    $incBody=TEMPLATE_PATH."/{$itemType}/send.php";
}
else
{

    $res = [] ;

    if(empty($templateDir))
    {
        $_POST["template"] = (empty($_POST["template"]))?"default":$_POST["template"];

        $templates = scandir(TEMPLATE_PATH."/email/templates/");

        array_splice($templates,0,2);

        if(!in_array("{$_POST["template"]}.php",$templates))
        {
            throw new Exception("email.error.templateNotExists",400);
        }

        $templateDir =TEMPLATE_PATH."/email/templates/{$_POST["template"]}.php";
    }

    if(!file_exists($templateDir))
    {
        throw new Exception("email.error.templateNotExists",400);
    }









    ob_start();

    include ($templateDir);

    $emailBody=ob_get_contents();

    ob_end_clean();


    $email = new \PHPMailer\PHPMailer\PHPMailer(true);

    $email->isSMTP();

    foreach ($_ENV["email"]["config"] as $k=>$v)
    {
        $email->set($k,$v);
    }


    $from = (empty($_POST["from"]))?$_ENV["email"]["from"]:$_POST["from"];


    $to = (empty($_POST["to"]))?$_ENV["email"]["from"]:$_POST["to"];


    $email->setFrom($from);

    $email->isHTML(true);

    $email->addAddress($to);

    if(!empty($_POST["subject"]))
    {
        $email->Subject = $_POST["subject"];
    }

    $email->Body =$emailBody;

    $email->AltBody = strip_tags($emailBody);

//    $email->send();

    echo json_encode(true);
}
