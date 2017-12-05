<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05/12/2017
 * Time: 03:25 PM
 */


function agreggate($type,&$data=false,$asociations=false,$maxDepth=2,$actualDepth=0)
{
    if (!empty($data) && $actualDepth <= $maxDepth) {
        if (!$asociations) {
            $oSql = 'SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_schema = "' . $_ENV["db"]["name"] . '"';

            $asociations = R::getAll($oSql);
        }

        $nextAggregationSet=[];

            foreach ($asociations as $k => $v) {


                if (strpos($v["table_name"], "_{$type}") || strpos($v["table_name"], "{$type}_")) {//Obtengo las tablas asociadas

                    $asociatedType = explode("_", $v["table_name"]);

                    unset($asociatedType[array_search($type, $asociatedType)]);

                    $asociatedType = reset($asociatedType);


                    $dataKeys = array_keys($data);


                    $oSql = "SELECT *,{$v["table_name"]}.id as 'link_id' FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id    WHERE  {$v["table_name"]}.{$type}_id IN (" . implode(",", $dataKeys) . ")
         AND {$v["table_name"]}.{$asociatedType}_id IS NOT NULL ORDER BY pos ASC";


                    $links = R::getAll($oSql);

                    foreach ($links as $link) {

                        $linkPath="";

                        if (!empty($_ENV[$_ENV["website"]["panelAccess"]])) {
                            if ($asociatedType == "file" && !empty($link["url"])) {

                                $link["url"] = $_ENV["ftp"]["website"] . "/" . $link["url"];

                            }

                            $linkPath="{$link["{$type}_id"]}.associated.{$asociatedType}.{$link["array"]}.save";

                            $data[$link["{$type}_id"]]["associated"][$asociatedType][$link["array"]]["save"][] = $link;
                        } else {

                            $linkPath = "{$link["{$type}_id"]}.{$link["array"]}";

                            $data[$link["{$type}_id"]][$link["array"]][] = $link;
                        }


                        $link["path"] = $linkPath;

                        $nextAggregationSet[$asociatedType][$link["id"]]=$link;

                    }
                }
            }


            /*
             $actualDepth++;

            foreach ($nextAggregationSet as $t=>$set)
            {
                agreggate($t,$data,$asociations,$maxDepth,$actualDepth);
            }*/



    }

}


agreggate($type,$data);
