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

//Ordeno
$oSql=" {$oSql} ORDER BY updated_at DESC,created_at DESC";


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
$type=$itemType;
include "aggregate.php";


