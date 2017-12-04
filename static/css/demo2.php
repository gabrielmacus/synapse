<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 11/11/2017
 * Time: 11:02
 */

set_time_limit(0);

if(!empty($_GET["act"])) {

    switch ($_GET["act"]) {
        case 1:
            //Asi guardo contenido asociado con datos en la tabla intermedia

            $imagen = R::findOne('imagen', " id = ? ", [1]);

            $post = R::dispense("post");

            $post->title = "The forest";

            $post->link("post_imagen",
                [
                    'caption' => "blahh foobar"
                ])->setAttr("image_id", $imagen);

            R::store($post);

            break;

        case 2:
            $imagen = R::dispense("image");

            $imagen->name = "woods.jpg";


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


            $ftpFolder = rtrim($_ENV["ftp"]["folder"], "/") . "/" . $date . "/";

            echo $ftp->exec("mkdir {$ftpFolder}");


            break;

        case 5:
            $a = "2017/11/21/5a137d33a5cac/file_3.jpg";

            echo dirname($a);
            break;

        case 6:

            echo json_encode(R::findMulti(['post', 'user'], "SELECT post.*,user.* FROM post,user WHERE post.user_id = user.id AND user.permission_id = ? ", [3]));


            break;
        case 7:

            $cant =(!empty($_GET["cant"]))?$_GET["cant"]:1;

           for($i=1;$i<=$cant;$i++)
           {
               // Create map with request parameters
               $data_string = "associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5Bsize%5D=33469&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5Bid%5D=3&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5Bname%5D=106842245_6.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5Bdescription%5D=&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5Burl%5D=http%3A%2F%2Flocalhost%2Fsynapse-media%2Ffiles%2F2017%2F11%2F30%2F5a2000d5b2105%2Ffile_1.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B0%5D%5B%24%24hashKey%5D=object%3A32&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5Bsize%5D=729337&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5Bid%5D=5&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5Bname%5D=car_db5_aston_martin_93821_1920x1080.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5Bdescription%5D=&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5Burl%5D=http%3A%2F%2Flocalhost%2Fsynapse-media%2Ffiles%2F2017%2F11%2F30%2F5a2008e6b7fa2%2Ffile_1.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B1%5D%5B%24%24hashKey%5D=object%3A33&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5Bsize%5D=177334&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5Bid%5D=6&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5Bname%5D=ITF.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5Bdescription%5D=&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5Burl%5D=http%3A%2F%2Flocalhost%2Fsynapse-media%2Ffiles%2F2017%2F12%2F04%2F5a2546258663f%2Ffile_1.jpg&associated%5Bfile%5D%5Bimages%5D%5Bsave%5D%5B2%5D%5B%24%24hashKey%5D=object%3A34&category_id=16&title=".StringService::randomString(10)."&text=".StringService::randomString(60);

               $url = "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/post/save?act=true";

               $ch = curl_init($url);

               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

               curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



               curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Content-Type: application/x-www-form-urlencoded',
                       'Content-Length: ' . strlen($data_string),
                       "Cookie: tk=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6ImdhYnJpZWxtYWN1cyIsImNyZWF0ZWRfYXQiOiIxNTExODkzMDcwIiwidHlwZSI6ImFjY291bnQiLCJlbWFpbCI6ImdhYnJpZWxtYWN1c0BnbWFpbC5jb20iLCJuYW1lIjoiR2FicmllbCIsInN1cm5hbWUiOiJNYWN1cyIsInBlcm1pc3Npb25faWQiOiIxMDAwIiwic3RhdHVzIjoiMSIsInVzZXJfaWQiOiIxIiwidXBkYXRlZF9hdCI6bnVsbH0.RxVhBi1Rhg7gHkODVvvv0uUTF0Jru2U0XP_i2Th8WiA"
                   )

               );

               $result = curl_exec($ch);

               curl_close($ch);

               echo $result."<br>";
           }

            break;

    }
}

//$vase->ownProductTagList;
