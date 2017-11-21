<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 11/11/2017
 * Time: 11:02
 */



if(!empty($_GET["act"]))
{

    switch ($_GET["act"])
    {
        case 1:
            //Asi guardo contenido asociado con datos en la tabla intermedia

            $imagen = R::findOne('imagen'," id = ? ",[1]);

            $post = R::dispense("post");

            $post->title="The forest";

            $post->link("post_imagen",
                [
                    'caption'=>"blahh foobar"
                ])->setAttr("image_id",$imagen);

            R::store($post);

            break;

        case 2:
            $imagen = R::dispense("image");

            $imagen->name="woods.jpg";


            R::store($imagen);

            break;
        case 3:


            $ftp = new \FtpClient\FtpClient();
            $ftp->connect($_ENV["ftp"]["host"]);
            $ftp->login($_ENV["ftp"]["user"], $_ENV["ftp"]["password"]);


            $ftp->pasv(true);

            $ftp->mkdir('path/to/create/dir');

            break;
        case 4:


            $ftp = new \FtpClient\FtpClient();
            $ftp->connect($_ENV["ftp"]["host"]);
            $ftp->login($_ENV["ftp"]["user"], $_ENV["ftp"]["password"]);

            $date = date("Y/m/d");


            $ftpFolder= rtrim($_ENV["ftp"]["folder"],"/")."/".$date."/";

            echo $ftp->exec("mkdir {$ftpFolder}");


            break;

        case 5:
            $a ="2017/11/21/5a137d33a5cac/file_3.jpg";

            echo dirname($a);
            break;
    }
}

//$vase->ownProductTagList;

echo "ok";