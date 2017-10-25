
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 24/10/2017
 * Time: 09:54 AM
 */




if($userData->permissions_group != $_ENV["auth"]["developerPermissionGroup"]) {
    $userPermissions = R::findOne('permission', " id = ? ", [$userData->permissions_group]);

    if(empty($userPermissions))
    {
        throw new Exception("user.error.permissionsNotFound",500);
    }

    $userPermissionsRedirect = $userPermissions->loginRedirect;
    $userPermissions = json_decode($userPermissions->actions,true);


    if(!in_array("{$uri["module"]}{$uri["action"]}",$userPermissions))
    {
        header("Location: {$userPermissionsRedirect}");
        exit();
    }


}
else
{
    $userPermissions = ArrayService::controllersToArray();

    $DEVELOPER_MODE= true;
}
