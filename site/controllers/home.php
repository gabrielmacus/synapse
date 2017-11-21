<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 31/10/2017
 * Time: 02:50 PM
 */

$incBody=SITE_TEMPLATE_PATH."/home/cuerpo.php";

$_GET["act"] = true;
$dontPrint=true;


$itemType="portada";

$query = " WHERE selected  = ?";
$params = [1];

include (BASE_PATH."/.base/db/read.php");

$dataToSkin = reset($data);

echo json_encode($dataToSkin);