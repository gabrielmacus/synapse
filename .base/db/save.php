
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/11/2017
 * Time: 10:47 AM
 */

$item = (empty($item))? R::dispense($itemType):$item;





if(!empty($userData))
{
    $user = R::dispense("user");
    $user->id =$userData->id;
    $item->user = $user;

}

if(empty($_POST["id"]))
{
    //Creo
    $item->created_at = time();
    $item->updated_at = null;
}
else
{
    //Edito


    $itemToEdit=R::find($itemType," id = ? ",[$_POST["id"]]);

    if(empty($itemToEdit))
    {
        throw new Exception("{$itemType}.error.notExists",400);
    }

    $itemToEdit = reset($itemToEdit);

    if(empty($DEVELOPER_MODE))
    {
        //Soy un usuario no desarrollador

        $permissionType=$userPermissions["{$uri["module"]}{$uri["action"]}"]["type"];

        switch ($permissionType)
        {
            case PERMISSION_ME:
                //Si puedo editar solo mis datos

                if($userData->id != $itemToEdit->user_id)
                {
                    throw new Exception("user.error.permissions",400);
                }


                break;
            case PERMISSION_GROUP:
                //Si puedo editar solo los datos del grupo

                if($userData->permission_id != $itemToEdit->user->permission_id)
                {
                    throw new Exception("user.error.permissions",400);
                }


                break;
            case PERMISSION_EVERYONE:
                //Si puedo editar los datos de todos


                break;

        }

    }

    $item->updated_at = time();
}




if(!empty($_POST["associated"]))
{

    foreach ($_POST["associated"]  as $associatedType => $i)
    {

        foreach ($i as $arrayName => $j)
        {

            $linkName ="{$associatedType}_{$itemType}";

            if(!empty($j["delete"]))
            {

                foreach ($j["delete"] as $k=>$v)
                {


                    if(!empty($v["link_id"]))
                    {
                        R::trash($linkName,$v["link_id"]);

                    }


                }
            }

            if(!empty($j["save"]))
            {
                foreach ($j["save"] as $k=>$v)
                {

                    //Guardo
                    $associatedItem = R::dispense($associatedType);

                    $associatedItem->id= $v["id"];


                    if(empty($v["link_id"]))
                    {
                        //Agrego una asociacion
                        $linkData = ["pos"=>$k,"array"=>$arrayName];

                        if(!empty($v["extra"]))
                        {
                            //Datos extra en la asociacion
                            $linkData = array_merge($linkData,$v["extra"]);

                        }

                        $item->link($linkName,$linkData)->setAttr($associatedType,$associatedItem);

                    }
                    else
                    {
                        //Edito una asociacion

                        $oSql ="UPDATE {$linkName} SET pos = {$k} ";

                        if(!empty($v["extra"]))
                        {
                            foreach ($v["extra"] as $j => $i)
                            {
                                $oSql.= ",{$j} = '{$i}' ";
                            }
                        }
                        $oSql.= " WHERE id = {$v["link_id"]} ";

                        R::exec($oSql);

                    }


                }
            }

        }

    }


}


unset($_POST["associated"]);

//Inserto la categoria
if(!empty($_POST["category_id"]))
{
   $cat = R::dispense("category");

   $cat->id = $_POST["category_id"];

   $item->category = $cat;

   unset($_POST["category_id"]);
}

ArrayService::setPropertiesToBean($_POST,$item);

$res = R::store($item);
