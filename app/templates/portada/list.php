<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 19/10/2017
 * Time: 11:19 AM
 */


$title =$_LANG["{$itemType}.list"];

include TEMPLATE_PATH."/base/header.php";


$controller ="{$itemType}Controller";

$extraActions=
    [
        "unselect"=>["icon"=>'<i class="material-icons">&#xE837;</i>'],
        "select"=>["clickAction"=>'setAsSelected({item})',"icon"=>'<i class="material-icons">&#xE836;</i>']
    ];


include TEMPLATE_PATH."/base/list.php";

$text = $_LANG["{$itemType}.empty"];

include TEMPLATE_PATH."/base/empty.php";

$text = $_LANG["{$itemType}.nueva"];

include TEMPLATE_PATH."/base/footer.php";


?>

<script>

    app.controller('<?php echo $controller; ?>', function($scope,$rootScope,$http) {

        $rootScope.setAsSelected=function (item) {

            var url ='<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}";?>/portada/select?act=true&id='+item.id;
            $http.get(url)
                .then(function(e){
                    location.reload();

                },$rootScope.error);
        }


    });



</script>
