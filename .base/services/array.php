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

}