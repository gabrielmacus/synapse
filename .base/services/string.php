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
    static function slugit($str, $replace=array(), $delimiter='-') {
        if ( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }
    static function randomString($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }
}