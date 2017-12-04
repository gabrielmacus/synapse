<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/11/2017
 * Time: 11:11 AM
 */

//Obtengo las categorias

$cat = ArrayService::loadCategories();
// user.username as 'user_username', user.type as 'user_type',user.email as 'user_email',user.name as 'user_name',user.surname as 'user_surname'

$oSql="SELECT {$itemType}.*  FROM {$itemType}  LEFT JOIN user ON {$itemType}.user_id = user.id";

$query = (empty($query))?"":$query;

$params =(empty($params))?[]:$params;



if(empty($DEVELOPER_MODE))
{
    //Soy un usuario no desarrollador

    $permissionType=$userPermissions["{$uri["module"]}{$uri["action"]}"]["type"];



    switch ($permissionType)
    {
        case PERMISSION_ME:
            //Si puedo leer solo mis datos

            $query = (!empty($query)) ? $query.=" AND  {$itemType}.user_id = ? ":"  {$itemType}.user_id = ?";

            $params[]=$userData->id;


            break;
        case PERMISSION_GROUP:

            $query=(!empty($query))?" AND user.permission_id = ? ":" user.permission_id = ?";

            $params[]=$userData->permission_id;


            break;
        case PERMISSION_EVERYONE:
            //Si puedo leer los datos de todos


            break;

    }

}




if(!empty($_GET["id"]))
{

    $query = (!empty($query)) ? $query.=" AND {$itemType}.id = ? ":"  {$itemType}.id = ?";

    $params[]=$_GET["id"];
}

$oSql=(!empty($query))?"{$oSql} WHERE {$query} ":$oSql;

//Pagino
include "pagination.php";


$oResult  = R::getAll($oSql,$params);


$data=[];

foreach ($oResult as $oValue)
{

    $data[$oValue["id"]] =$oValue;

    if(!empty($data[$oValue["id"]]["category_id"]))
    {
        $catBreadcrumb=[];

        ArrayService::makeCategoriesBreadCrumb($cat,$data[$oValue["id"]]["category_id"],$catBreadcrumb);

        $data[$oValue["id"]]["categories"] = $catBreadcrumb;

    }




}



//Asocio los elementos
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