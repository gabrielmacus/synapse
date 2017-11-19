<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 17/10/2017
 * Time: 11:00 AM
 */

class HlsService
{
    static function streamHls($id,$cmd)
    {
        $download=BASE_PATH."/static/downloads/hls_{$id}.mkv";

        FileService::deleteFile($download);


        $path =BASE_PATH."{$_ENV["hls"]["outFilePath"]}/{$id}";

        if(!is_dir($path) && !mkdir($path))
        {
            throw new Exception("streaming.error.streamingFolder",500);
        }

        $cmd.=" -f hls {$path}/{$_ENV["hls"]["outFileName"]}.m3u8";

       //$cmd.="  -c copy {$download}";


        $p = new Process($cmd);


        return  $p->getPid();

    }

    static function stopHls($pid,$id)
    {
        $path =BASE_PATH."{$_ENV["hls"]["outFilePath"]}/{$id}";

        Process::stop($pid);

        sleep(1);

        FileService::deleteDir($path);


    }
}