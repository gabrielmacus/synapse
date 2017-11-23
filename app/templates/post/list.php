<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 23/11/2017
 * Time: 03:03 PM
 */

$title =$_LANG["{$itemType}.list"];

include TEMPLATE_PATH."/base/header.php";


//$clickAction ='toggleStreaming({item})';
//$urlAction=$_ENV["website"]["root"]."/repository/watch";

$controller ="{$itemType}Controller";

include TEMPLATE_PATH."/base/list.php";

$text = $_LANG["{$itemType}.empty"];

include TEMPLATE_PATH."/base/empty.php";

$text = $_LANG["{$itemType}.nuevo"];

include TEMPLATE_PATH."/base/footer.php";


?>

<script>

    app.controller('<?php echo $controller; ?>', function($scope,$rootScope,$http) {




    });



</script>
