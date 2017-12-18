<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/12/2017
 * Time: 3:31
 */

FileService::write(json_encode($_POST),BASE_PATH."/write.txt");
//Opcion de compartir en redes
if(empty($snText))
{
    $snText = (!empty($_POST["text"]))?$_POST["text"]:false;

}
if(empty($snImages))
{

    $snImages = (!empty($_POST["associated"]["file"]["images"]["save"]))?"images":false;

}

if(!empty($_POST["publish"]) && $snText)
{


    foreach ($_POST["publish"] as $k=>$v)
    {
        switch ($k)
        {
            case "fb":


                $fbToken = (!empty($_POST["publish"]["fb"]["fbToken"]))?$_POST["publish"]["fb"]["fbToken"]:false;


                if($fbToken)
                {
                    $fb = new Facebook\Facebook([
                        'app_id' => $_ENV["auth"]["fb"]["appId"],
                        'app_secret' => $_ENV["auth"]["fb"]["appSecret"],
                        'default_graph_version' => $_ENV["auth"]["fb"]["version"],
                    ]);

                    $fbAttachedMedia = [];
                    if($snImages)
                    {
                        $fbPhotoEndpoint="/{$_ENV["siteEnv"]["fb"]["pageId"]}/photos";



                        foreach ($_POST["associated"]["file"][$snImages]["save"] as $image)
                        {
                            $fbResPhoto =$fb->post($fbPhotoEndpoint,[ "url"=>$image["url"],"published"=>false],$fbToken);

                            //   FileService::write(BASE_PATH."/.base/cache/photo.json",json_encode($fbResPhoto));

                            $fbAttachedMedia[]=["media_fbid"=>$fbResPhoto->getGraphNode()["id"]];

                        }



                    }




                    $fbEndpoint ="/{$_ENV["siteEnv"]["fb"]["pageId"]}/feed";

                    $fbRes = $fb->post($fbEndpoint, ['message' => $snText,"attached_media"=>$fbAttachedMedia], $fbToken);

                }




                break;
            case "insta":


                if($snImages)
                {

                    FileService::write(json_encode($_POST["associated"]["file"][$snImages]["save"]),BASE_PATH."/a.txt");


                    $image =reset($_POST["associated"]["file"][$snImages]["save"]);

                    $md5=md5($image["url"]);

                    $original=BASE_PATH."/static/.tmp/{$md5}.{$image["extension"]}";

                    copy($image["url"],$original);

                    $product=   BASE_PATH."/static/.tmp/r_".md5($original).".".$image["extension"];

                    $image = new ImageResize($original);

                    $image->crop(480,600);

                    $image->save($product);


                    unset($image);

                    $insta = new instagram();
                    $response = $insta->Login($_ENV["auth"]["instagram"]["user"], $_ENV["auth"]["instagram"]["password"]);

                    if(strpos($response[1], "Sorry")) {

                       throw new Exception("instagram.error.request",400);

                    }
                    if(empty($response[1])) {

                        throw new Exception("instagram.error.login",400);

                    }

                    $insta->Post($product, $snText);

                }





                break;
        }
    }

    unset($_POST["publish"]);
}

