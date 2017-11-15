
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

ArrayService::setPropertiesToBean($_POST,$item);

$res = R::store($item);
