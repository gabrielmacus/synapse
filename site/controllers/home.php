
<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 31/10/2017
 * Time: 02:50 PM
 */

$incBody=SITE_TEMPLATE_PATH."/home/cuerpo.php";


$mainCategory=1;
$cat = ArrayService::loadCategories();
$currentCat= (empty($_GET["s"]))?$mainCategory:$_GET["s"];

$bodyClass[]="home";
$bodyClass[]="section-{$cat[$currentCat]["id"]}";


$data=[];
for($i=1;$i<=5;$i++)
{
    $data[$i]["title"]="No hay nadie que ame el dolor mismo, que lo busque, lo encuentre y lo quiera, simplemente porque es el dolor.";
    $data[$i]["text"]=
        "<p>Vendo clio mio 2001 diesel en buen estado, se escuchan ofertas razonables, recibo whatsapp, se vende para comprar uno mas nuevo, anda perfecto...</p>";

}
