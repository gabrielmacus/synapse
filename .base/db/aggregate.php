<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 05/12/2017
 * Time: 03:25 PM
 */
/*
function _agreggate($type,$data=false,&$associatedItems=[], $asociations=false)
{

    if (!empty($data)) {
        if (!$asociations) {
            $oSql = 'SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_schema = "' . $_ENV["db"]["name"] . '"';

            $asociations = R::getAll($oSql);
        }



        foreach ($asociations as $k => $v) {


            if (strpos($v["table_name"], "_{$type}") || strpos($v["table_name"], "{$type}_")) {
                //Obtengo las tablas asociadas

                $asociatedType = explode("_", $v["table_name"]);

                unset($asociatedType[array_search($type, $asociatedType)]);

                $asociatedType = reset($asociatedType);

                $dataKeys = array_keys($data);


                $oSql = "SELECT *,{$v["table_name"]}.id as 'link_id' FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id    WHERE  {$v["table_name"]}.{$type}_id IN (" . implode(",", $dataKeys) . ")
         AND {$v["table_name"]}.{$asociatedType}_id IS NOT NULL ORDER BY pos ASC";

                echo $oSql;
                echo "<br>";

                $links = R::getAll($oSql);

                foreach ($links as $link) {

                    $link["path"] = "{$link["{$type}_id"]}.associated.{$asociatedType}.{$link["array"]}.save";

                    $associatedItems[$link["id"]]=$link;



                }


            }


        }


    }
}
*/
function ordPos($a, $b)
{

    if ($a["pos"] == $b["pos"]) {
        return 0;
    }
    return ($a["pos"] > $b["pos"]) ? -1 : 1;
}

function agreggate($types,$data=false,$asociations=false)
{
    $associatedItems=[];
    if (!empty($data)) {
        if (!$asociations) {
            $oSql = 'SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_schema = "' . $_ENV["db"]["name"] . '"';

            $asociations = R::getAll($oSql);
        }


        //Obtengo los diferentes ids
        $dataKeys = array_column($data,"id");
        foreach ($asociations as $k => $v) {


            foreach ($types as $type)
            {
                if (strpos($v["table_name"], "_{$type}") || strpos($v["table_name"], "{$type}_")) {



                    $asociatedType = explode("_", $v["table_name"]);

                    unset($asociatedType[array_search($type, $asociatedType)]);

                    $asociatedType = reset($asociatedType);

                  //  $dataKeys = array_keys($data);

                    $oSql="SELECT *,{$v["table_name"]}.id as 'link_id' FROM   {$v["table_name"]} LEFT JOIN {$asociatedType} ON {$asociatedType}.id = {$v["table_name"]}.{$asociatedType}_id    WHERE  {$v["table_name"]}.{$type}_id IN (" . implode(",", $dataKeys) . ")
         AND {$v["table_name"]}.{$asociatedType}_id IS NOT NULL ORDER BY pos ASC";

                    $links = R::getAll($oSql);

                    foreach ($links as $link) {

                        //$link["path"] = "{$link["{$type}_id"]}.associated.{$asociatedType}.{$link["array"]}.save";

                        if($asociatedType == "file")
                        {
                            $link["url"]="{$_ENV["ftp"]["website"]}/{$link["url"]}";
                        }

                        $link["path"] = "associated.{$asociatedType}.{$link["array"]}.save.{$link["id"]}";

                        $link["parent_type"]=$type;

                        $link["parent_id"]=$link["{$type}_id"];

                        $link["type"] = $asociatedType;

                        //$associatedItems["items"][$link["id"]]=$link;

                        //$associatedItems["items"][]=$link;



                        $associatedItems["items"]["{$link["id"]}_{$asociatedType}"]=$link;

                        if(empty($associatedItems["types"]) || !in_array($asociatedType,$associatedItems["types"]))
                        {
                            $associatedItems["types"][]=$asociatedType;

                        }



                    }

                    uasort($associatedItems["items"],"ordPos");


                }
            }



        }




        }


    return $associatedItems;

}


$oSql = 'SELECT table_name, table_schema AS dbname FROM INFORMATION_SCHEMA.TABLES where table_schema = "' . $_ENV["db"]["name"] . '"';

$asociations = R::getAll($oSql);

$aggregationLevels = (empty($aggregationLevels)|| !is_numeric($aggregationLevels))?2:$aggregationLevels;

$lastTypes =[$type];

$lastItems = $data;

$associatedItems = [];

for ($i=1;$i<=$aggregationLevels;$i++)
{

    $aggregation = agreggate($lastTypes,$lastItems,$asociations);

    if(!empty($aggregation["types"]) && !empty($aggregation["items"]))
    {
        $lastTypes = $aggregation["types"];

        $lastItems = $aggregation["items"];

        $associatedItems = $associatedItems + $lastItems;

    }


}
$associatedItems =array_reverse($associatedItems,true);


foreach ($associatedItems as $k=>$v)
{


    if(!empty($associatedItems["{$v["parent_id"]}_{$v["parent_type"]}"]))
    {

        ArrayService::setNestedArray($associatedItems["{$v["parent_id"]}_{$v["parent_type"]}"],$v["path"],$v);


    }



}


foreach ($associatedItems as $k=>$v)
{
    if(!empty($data[$v["parent_id"]]) && $type == $v["parent_type"])
    {
        ArrayService::setNestedArray($data[$v["parent_id"]],$v["path"],$v);



    }
}



//DebugService::print_formatted($data);


/*


$associatedItems = agreggate([$type],$data);

echo "<pre>";
print_r($associatedItems);
echo "<pre>";


$associatedItems2 = agreggate($associatedItems["types"],$associatedItems["items"]);

echo "<pre>";
print_r($associatedItems2);
echo "<pre>";


$associatedItems3 = agreggate($associatedItems2["types"],$associatedItems2["items"]);

echo "<pre>";
print_r($associatedItems3);
echo "<pre>";

exit();
*/











/*

$associatedItems3 = agreggate($associatedItems2["types"],$data);

echo "<pre>";
print_r($associatedItems3);
echo "<pre>";
*/





/*

$associatedItems = [];
agreggate($type,$data,$associatedItems);

echo "<pre>";
print_r($associatedItems);
echo "<pre>";

$associatedItems2 = [];
agreggate($type,$associatedItems,$associatedItems2);


echo "<pre>";
print_r($associatedItems2);
echo "<pre>";


exit();


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





    }

}


agreggate($type,$data);
*/