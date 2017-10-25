<?php
$title =$_LANG["{$itemType}.list"];

include TEMPLATE_PATH."/base/header.php";


$controller ="{$itemType}Controller";


include TEMPLATE_PATH."/base/list.php";

$text = $_LANG["{$itemType}.empty"];

include TEMPLATE_PATH."/base/empty.php";

$text = $_LANG["{$itemType}.nuevo"];

$href="{$_ENV["website"]["root"]}/{$itemType}/save";

include TEMPLATE_PATH."/base/footer.php";


?>

<script>

    app.controller('<?php echo $controller ?>', function($scope,$rootScope,$http) {




    });



</script>
