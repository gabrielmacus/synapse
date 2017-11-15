
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
                if(empty($v["delete"]))
                {
                    //Guardo

                    $associatedItem = R::dispense($associatedType);

                    $associatedItem->id= $v["id"];

                    $linkName ="{$associatedType}_{$itemType}";

                    if(empty($v["link_id"]))
                    {
                        //Agrego una asociacion
                        $linkData = ["position"=>$k,"array"=>$arrayName];

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

                        echo $oSql;
                        R::exec($oSql);

                    }



                }
                else
                {
                    //Elimino una asociacion

                }

            }

        }

    }


}


unset($_POST["associated"]);

ArrayService::setPropertiesToBean($_POST,$item);

$res = R::store($item);
