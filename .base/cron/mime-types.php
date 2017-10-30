
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 27/10/2017
 * Time: 12:44 PM
 */
$return = array();
$mimes = file_get_contents('http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types'); // make sure that allow_url_fopen is enabled!

preg_match_all('#^([^\s]{2,}?)\s+(.+?)$#ism', $mimes, $matches, PREG_SET_ORDER);

foreach ($matches as $match){
    $exts =  explode(" ", $match[2]);
    foreach ($exts as $ext){
        $return[$ext]=$match[1];
    }
}

$data ='<?php $mime_types='.var_export($return,true).'; ?>';


FileService::write($data,BASE_PATH."/.base/cache/mimes.php",'w');
