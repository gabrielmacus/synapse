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



$data = R::find($itemType,$query,$params);

var_dump($data);

//Asocio los elementos
if(!empty($data))
{
    $oSql ='SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_name like "%'.$itemType.'_%" OR table_name like "%_'.$itemType.'%" AND table_schema = "'.$_ENV["db"]["name"].'"';

    $asociations = R::getAll($oSql);

    foreach ($asociations as $k=>$v)
    {

        $asociatedType = trim(trim($v["table_name"],"_{$itemType}"),"{$itemType}_");

        $dataKeys = array_keys($data);


        $oSql="SELECT * FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id AND {$v["table_name"]}.{$itemType}_id IN (".implode(",",$dataKeys).")";

        $links = R::getAll($oSql);

        foreach ($links as $link)
        {
           // $associatedBean = R::convertToBean($asociatedType,$link);

            $data[$link["{$itemType}_id"]][$link["array"]][$link["order"]]=$associatedBean;


        }
        //echo json_encode($links);


        //$assocIds=implode(",",R::getAssoc($oSql));

        //R::find($asociatedType," id IN (?) ",[$assocIds])


    }

}

echo json_encode($data);