<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 20/11/2017
 * Time: 20:59
 */
$res= empty($res)?[]:$res;
$id = (!empty($_GET["id"]))?$_GET["id"]:0;


$item = R::findOne($itemType," id = ? ",[$id]);


if(empty($item))
{
    throw new Exception("{$itemType}.error.notExists",400);
}




if(empty($DEVELOPER_MODE))
{
    //Soy un usuario no desarrollador

    $permissionType=$userPermissions["{$uri["module"]}{$uri["action"]}"]["type"];



    switch ($permissionType)
    {
        case PERMISSION_ME:
            //Si puedo elimimar solo mis datos



            if($userData->id != $item->user_id)
            {
                throw new Exception("user.error.permissions",400);
            }


            break;
        case PERMISSION_GROUP:
            //Si puedo elimimar solo los datos del grupo

            if($userData->permission_id != $item->user->permission_id)
            {
                throw new Exception("user.error.permissions",400);
            }






            break;
        case PERMISSION_EVERYONE:
            //Si puedo elimimar los datos de todos


            break;

    }

}



$res=R::trash($item);
