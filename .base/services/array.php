<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 17/10/2017
 * Time: 10:32 AM
 */

class ArrayService
{
    static function setPropertiesToBean($array,&$bean)
    {
        foreach ($array as $k=>$v)
        {
            if(!is_array($v))
            {
                $bean->setAttr($k,$v);
            }
            else
            {
                $bean->setAttr($k,json_encode($v));
            }

        }
    }

    static function controllersToArray($process=false)
    {
        $files = scandir(CONTROLLER_PATH);

        $controllers=[];
        if(!$process)
        {
            foreach ($files as $k=>$v)
            {

                $v = str_replace(".php","",$v);

                $vArr = explode(".",$v);


                $r=reset($vArr);

                if(!empty($r))
                {
                    $controllers[$v]=$v;
                }
            }
        }
        else
        {
            foreach ($files as $k=>$v)
            {
                $vArr = explode(".",$v);
                $v = reset($vArr);

                if(!empty($v))
                {
                    $action = ($vArr[1]=='php')?'list':$vArr[1];

                    $controllers[$v]["actions"][]=$action;
                }
            }
        }
        return $controllers;
    }

    static function makeCategoriesBreadCrumb($categories,$childrenId,&$breadcrumb=[])
    {


           foreach ($categories as $k=>$v)
           {

               if($v["id"] == $childrenId)
               {
                   $breadcrumb[$v["id"]]=$v;

                   if(!empty($v["belongs"]))
                   {
                       self::makeCategoriesBreadCrumb($categories,$v["belongs"],$breadcrumb);
                   }
                   else
                   {
                       $breadcrumb = array_reverse($breadcrumb);
                   }


               }




           }


    }
    static function makeCategoriesTree($categories,$parentId=0,&$arr=[])
    {

        foreach ($categories as $k=>$v)
        {
            if($v["belongs"] == $parentId)
            {

                $categories[$k]["categories"]=[];

                self::makeCategoriesTree($categories,$v["id"],$categories[$k]["categories"]);

                $arr[]=$categories[$k];
            }


        }


    }

    static function loadCategories()
    {
        $catFilePath=BASE_PATH."/.base/cache/categories.json";


        if(file_exists($catFilePath))
        {
            //Si existe, levanto la caché
            $cat = json_decode(file_get_contents($catFilePath),true);
        }
        else
        {
            //Si no, levanto desde bd y guardo en caché
            $cat = R::find('category');
            FileService::write(json_encode($cat),BASE_PATH."/.base/cache/categories.json",'w');

        }
        return $cat;
    }

    static  function setNestedArray(&$array, $path, $value ="", $delimiter = '.') {
        $pathParts = explode($delimiter, $path);

        $lastKey = end($pathParts);

        $current = &$array;


        foreach($pathParts as $key) {

            $val = ($key == $lastKey && !empty($value))?$value:[];


            if(empty($current[$key]))
            {
                $current[$key]=$val;
            }



            $current = &$current[$key];




        }






    }


}