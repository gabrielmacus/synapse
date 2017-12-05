<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05/12/2017
 * Time: 03:25 PM
 */
if(!empty($data))
{
    $oSql ='SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where (table_name like "%'.$itemType.'_%" OR table_name like "%_'.$itemType.'%" ) AND table_schema = "'.$_ENV["db"]["name"].'"';

    $asociations = R::getAll($oSql);

    foreach ($asociations as $k=>$v)
    {

        $asociatedType =explode("_",$v["table_name"]);

        unset($asociatedType[array_search($itemType,$asociatedType)]);

        $asociatedType=  reset($asociatedType);


        $dataKeys = array_keys($data);


        $oSql="SELECT *,{$v["table_name"]}.id as 'link_id' FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id    WHERE  {$v["table_name"]}.{$itemType}_id IN (".implode(",",$dataKeys).")
         AND {$v["table_name"]}.{$asociatedType}_id IS NOT NULL ORDER BY pos ASC";



        $links = R::getAll($oSql);

        foreach ($links as $link)
        {

            if(!empty($_ENV[$_ENV["website"]["panelAccess"]]))
            {
                if($asociatedType == "file" && !empty($link["url"])){

                    $link["url"] = $_ENV["ftp"]["website"]."/".$link["url"];

                }

                $data[$link["{$itemType}_id"]]["associated"][$asociatedType][$link["array"]]["save"][]=$link;
            }
            else
            {
                $data[$link["{$itemType}_id"]][$link["array"]][]=$link;
            }



        }


    }

}