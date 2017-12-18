<?php

include 'simpleimage.class.php';
include 'instagram.class.php';

$username = 'xxxx';   // your username
$password = 'yyyy';   // your password
$filename = 'zzzz.jpg';   // your sample photo
$caption = " #tag1 #tag2 # tag3 .....";   // your caption

$product_image= getcwd() .'/original/' . $filename;
$square = getcwd().'/resize/' . $filename;
$image = new SimpleImage(); 
$image->load($product_image); 
$image->resize(480,600); 						
$image->save($square, IMAGETYPE_JPEG);  
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

$insta->Post($square, $caption);
?>
