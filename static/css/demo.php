<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 15/10/2017
 * Time: 20:45
 */


$username = $_ENV["auth"]["instagram"]["user"];   // your username
$password =  $_ENV["auth"]["instagram"]["password"]; // your password
$filename = 'a.png';   // your sample photo
$caption = " #tag1 #tag2 #tag3";   // your caption


$original=  BASE_PATH."/static/.tmp/{$filename}";
$product=   BASE_PATH."/static/.tmp/r_{$filename}";

/*
$image = new SimpleImage();
$image->load($product_image);
$image->resize(480,600);
$image->save($square, IMAGETYPE_JPEG);
*/

$image = new ImageResize($original);

$image->crop(480,600);

$image->save($product);


unset($image);

$insta = new instagram();
$response = $insta->Login($username, $password);

if(strpos($response[1], "Sorry")) {
    echo "Request failed, there's a chance that this proxy/ip is blocked";
    print_r($response);
    exit();
}
if(empty($response[1])) {
    echo "Empty response received from the server while trying to login";
    print_r($response);
    exit();
}

$insta->Post($product, $caption);


/*
$user = R::dispense( 'user' );

$user->username = "gabrielmacus";


$user->password=hash('sha256',"demodemo");

$user->status  = 1;

$user->created_at = time();

$user->type ="account";

$user->email = "gabrielmacus@gmail.com";

$user->name = "Gabriel";

$user->surname = "Macus";

$user->permission_id = 10;

$id=R::store($user);
echo $id;*/