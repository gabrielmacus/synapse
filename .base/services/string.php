<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 16/10/2017
 * Time: 23:21
 */

class StringService
{

    static function replaceCurlyBraces($array,$text)
    {
        foreach ($array as $k=>$v)
        {
            $text =  str_replace("{".$k."}",$v,$text);
        }

        return $text;
    }
}