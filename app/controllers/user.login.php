<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 16/10/2017
 * Time: 0:31
 */



use \Firebase\JWT\JWT;

if(empty($_GET["act"]))
{
    $incLayout = TEMPLATE_PATH."/layouts/login-layout.php";
    $incBody=TEMPLATE_PATH."/login/cuerpo.php";
}
else
{
    //Logs the user in

    if(!empty($_POST["user"]) && !empty($_POST["password"]))
    {

        $_POST["password"] = hash('sha256',$_POST["password"]);


        $user = R::findOne('user','  (username = ? OR email = ?) AND password = ?',[$_POST["user"],$_POST["user"],$_POST["password"]]);

        if(empty($user))
        {
            throw new Exception("auth.error.invalidData",400);
        }
        else
        {

            switch ($user->status)
            {
                case USER_INACTIVE:
                    throw new Exception("user.error.inactive",400);
                    break;
                case USER_SUSPENDED:
                    throw new Exception("user.error.suspended",400);
                    break;
            }

            unset($user["password"]);

            setcookie("tk",JWT::encode($user,$_ENV["auth"]["secret"]),time()+$_ENV["auth"]["sessionTime"],'/');

            $redirect =($_ENV["website"]["root"] !="")?$_ENV["website"]["root"]."/{$language}/{$_ENV["website"]["panelAccess"]}/":"/{$language}/{$_ENV["website"]["panelAccess"]}/";



            if(!empty($_COOKIE["redirect"]))
            {
                $redirect = $_COOKIE["redirect"];
            }



            header("Location: {$redirect}");

        }


    }
    else
    {
        throw new Exception("auth.error.noData",400);
    }

}
