
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 24/10/2017
 * Time: 09:54 AM
 */





if($userData->permission_id != $_ENV["auth"]["developerPermissionGroup"]) {


    $userPermissions = R::findOne('permission', " id = ? ", [$userData->permission_id]);

    if(empty($userPermissions))
    {
        throw new Exception("user.error.permissionsNotFound",500);
    }

    $r=ltrim($userPermissions->loginRedirect,"/");

    $userPermissionsRedirect = "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$r}";

    $userPermissions = json_decode($userPermissions->actions,true);


    if( empty($userPermissions["{$uri["module"]}{$uri["action"]}"]) || empty($userPermissions["{$uri["module"]}{$uri["action"]}"]["action"])) {

        if (empty($_GET["act"]))
        {
            header("Location: {$userPermissionsRedirect}");
            exit();
        }
        else
        {
            throw new Exception("user.error.permissions",400);
        }

    }


}
else
{

    $controllersArray=ArrayService::controllersToArray();
    foreach ($controllersArray as $k=>$v)
    {
        $userPermissions[$k]= ["action"=>$k,"type"=>3];
    }


    $DEVELOPER_MODE= true;
}
