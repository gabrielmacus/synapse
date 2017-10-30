<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 16/10/2017
 * Time: 0:13
 */

class FileService
{
    static function write($data,$path,$type='a')
    {

        if(!$handle = fopen($path, $type))
        {
         throw new Exception("file.error.open");
        }

       if(!$result = fwrite($handle, $data))
        {
            throw new Exception("file.error.write");
        }

        return $result;
    }
    public static function deleteFile($file)
    {
        if(file_exists($file))
        {
            unlink($file);
        }
    }
    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new Exception("file.error.notDir");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                //unlink($file);
				self::deleteFile($file);
            }
        }
        rmdir($dirPath);
    }
}