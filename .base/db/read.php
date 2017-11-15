<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/11/2017
 * Time: 11:11 AM
 */

$query = (empty($query))?"":$query;

$params =(empty($params))?[]:$params;

if(!empty($_GET["id"]))
{

    $query = (!empty($query)) ? $query.=" AND {$itemType}.id = ? ":"  {$itemType}.id = ?";

    $params[]=$_GET["id"];
}

$oResult = R::find($itemType,$query,$params);

foreach ($oResult as $oValue)
{

    $data[$oValue->id] =$oValue->export();

}
//Asocio los elementos
if(!empty($data))
{
    $oSql ='SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_name like "%'.$itemType.'_%" OR table_name like "%_'.$itemType.'%" AND table_schema = "'.$_ENV["db"]["name"].'"';

    $asociations = R::getAll($oSql);

    foreach ($asociations as $k=>$v)
    {

        $asociatedType = trim(trim($v["table_name"],"_{$itemType}"),"{$itemType}_");

        $dataKeys = array_keys($data);


        $oSql="SELECT *,{$v["table_name"]}.id as 'link_id' FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id AND {$v["table_name"]}.{$itemType}_id IN (".implode(",",$dataKeys).")";

        $links = R::getAll($oSql);

        foreach ($links as $link)
        {
            $data[$link["{$itemType}_id"]]["associated"][$asociatedType][$link["array"]][$link["pos"]]=$link;
        }


    }

}
