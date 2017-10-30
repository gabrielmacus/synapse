<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 18/10/2017
 * Time: 02:54 PM
 */

class ValidationService
{
    static function validate($data,$regex)
    {
        if(empty($data))
        {
            $data="";
        }

        if(!filter_var($data,FILTER_VALIDATE_REGEXP,['options'=>['regexp'=>$regex]]))
        {
                return false;
        }


        return true;


    }
    static function isJSON($json) {
        json_decode($json);
        return (json_last_error()===JSON_ERROR_NONE);
    }
}