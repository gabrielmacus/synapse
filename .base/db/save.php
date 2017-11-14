
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/11/2017
 * Time: 10:47 AM
 */

$item = (empty($item))? R::dispense($itemType):$item;

$user = R::findOne('user',' id = ? ',[$userData->id]);

if(!empty($user))
{

    $item->user = $user;
}

if(empty($_POST["id"]))
{
    $item->created_at = time();
}
else
{
    $item->updated_at = time();
}



if(!empty($_POST["associated"]))
{

    foreach ($_POST["associated"]  as $associatedType => $i)
    {

        foreach ($i as $arrayName => $j)
        {


            foreach ($j as $k=>$v)
            {
                //$streaming = R::findOne("streaming"," id = ? ",[$v["id"]]);

                $associatedItem = R::dispense($associatedType);

                $associatedItem->id= $v["id"];

                $linkName ="{$associatedType}_{$itemType}";

                $linkData = ["order"=>$k,"array"=>$arrayName];

                if(!empty($v["extra"]))
                {
                    //Datos extra en la asociacion
                    $linkData = array_merge($linkData,$v["extra"]);

                }

                $item->link($linkName,$linkData)->setAttr($associatedType,$associatedItem);

            }

        }

    }


}


unset($_POST["associated"]);

ArrayService::setPropertiesToBean($_POST,$item);

$res = R::store($item);