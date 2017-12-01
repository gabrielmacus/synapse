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



                $user = R::findOne('user','  (username = ? OR email = ?) AND password = ? AND type = "account" ',[$_POST["user"],$_POST["user"],$_POST["password"]]);

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
        case "fb":

            if(empty($_ENV["auth"][$_GET["act"]]) || empty($_ENV["auth"][$_GET["act"]]["active"]))
            {
                throw new Exception("{$_GET["act"]}.auth.error.inactive",400);
            }

            $permission=R::findOne('permission',' name = ? ',[$_GET["act"]]);

            if(empty($permission))
            {
                throw new Exception("{$_GET["act"]}.auth.error.inactive",400);
            }

            $idtoken=$_POST["idtoken"];

            unset($_POST["idtoken"]);

            $_POST["password"] = $idtoken;

            $_POST["type"]=$_GET["act"];



            $snUser = R::findOne('user',' email = ? ',[$_POST["email"]]);


            if(empty($snUser))
            {

                //Creo un usuario nuevo


                list($username, $domain) = explode('@', $_POST["email"] . "@"); // ."@" is a trick: look note below
                //."@": This is made to avoid in short critical errors with the list command and ensure that explode will produce at least two variables as needed.

                $_POST["username"]=$username;
                $_POST["permission_id"]=$permission->id;
                $_POST["status"]=1;

                //Si hay otro usuario con el mismo nombre de usuario que genere a partir del email, genero otro igual pero con el numero de cantidad
                $usernameCount=R::count('user',' username = ? ',[$_POST["username"]]);

                $_POST["username"] = ($usernameCount==0)?$_POST["username"]:$_POST["username"].$usernameCount;





                include (CONTROLLER_PATH."/user.save.php");
            }
            else
            {





                if($snUser->type != $_GET["act"])
                {
                    throw new Exception("{$_GET["act"]}.auth.error.alreadyTakenEmail",400);
                }
                else
                {
                    $_POST["id"]=$snUser->id;

                    $_POST["permission_id"] = $snUser->permission->id;

                    $_POST["username"] = $snUser->username;

                    include (CONTROLLER_PATH."/user.save.php");
                }

            }

            $user =$_POST;

            $user["token"]=$idtoken;

            

            include (BASE_PATH."/.base/auth/set-cookie.php");





            break;
    }


}
