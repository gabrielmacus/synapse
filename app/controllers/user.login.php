<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 16/10/2017
 * Time: 0:31
 */




if(empty($_GET["act"]))
{
    $incLayout = TEMPLATE_PATH."/layouts/login-layout.php";
    $incBody=TEMPLATE_PATH."/login/cuerpo.php";
}
else
{
    //Logs the user in

    switch ($_GET["act"])
    {
        default:
            //Login estandar
            if(!empty($_POST["user"]) && !empty($_POST["password"]))
            {

                $_POST["password"] = hash('sha256',$_POST["password"]);


                $user = R::findOne('user','  (username = ? OR email = ?) AND password = ? AND type = "account"',[$_POST["user"],$_POST["user"],$_POST["password"]]);

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


                    include (BASE_PATH."/.base/auth/set-cookie.php");
                }


            }
            else
            {
                throw new Exception("auth.error.noData",400);
            }
            break;

        case "gp":

            if(empty($_ENV["auth"]["gp"]) || empty($_ENV["auth"]["gp"]["active"]))
            {
                throw new Exception("gp.auth.error.inactive",400);
            }

            $gpPermission=R::findOne('permission',' name = ? ',['gp']);

            if(empty($gpPermission))
            {
                throw new Exception("gp.auth.error.inactive",400);
            }

            $idtoken=$_POST["idtoken"];
            unset($_POST["idtoken"]);
            $_POST["password"] = $idtoken;
            $_POST["type"]="gp";
            $_POST["username"]=rtrim($_POST["email"],"@gmail.com");
            $_POST["permissions_group"]=$gpPermission->id;
            $_POST["status"]=1;



            $gpUser = R::findOne('user',' email = ? ',[$_POST["email"]]);

            if(empty($gpUser))
            {
                include (CONTROLLER_PATH."/user.save.php");
            }
            else
            {
                if($gpUser->type == "account")
                {
                    throw new Exception("gp.auth.error.alreadyTakenEmail",400);
                }
            }

            $user =$_POST;
            $user["token"]=$idtoken;
            include (BASE_PATH."/.base/auth/set-cookie.php");



            break;

        case "fb":
            //Facebook

            break;
    }


}
