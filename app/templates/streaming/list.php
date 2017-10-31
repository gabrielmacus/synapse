<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 17/10/2017
 * Time: 0:21
 */
$title =$_LANG["streaming.list"];

include TEMPLATE_PATH."/base/header.php";


$urlAction=$_ENV["website"]["root"]."/{$itemType}/watch";

$controller ="{$itemType}Controller";

$extraActions=
    [
      "play"=>["clickAction"=>'toggleStreaming({item})',"icon"=>'<i class="material-icons">&#xE037;</i>'],
        "stop"=>["clickAction"=>'toggleStreaming({item})',"icon"=>'<i class="material-icons">&#xE047;</i>']
    ];

include TEMPLATE_PATH."/base/list.php";

$text = $_LANG["{$itemType}.empty"];

include TEMPLATE_PATH."/base/empty.php";

$text = $_LANG["{$itemType}.nueva"];

include TEMPLATE_PATH."/base/footer.php";


?>

<script>

    app.controller('<?php echo $controller ?>', function($scope,$rootScope,$http) {
       
        $scope.toggleStreaming=function (item) {

            //var id =item.currentTarget.getAttribute("data-id");

            var isPlaying =!isNaN(parseInt(item.active));


            var url ='<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}";?>/streaming/start?act=true&id='+item.id;
            if(isPlaying)
            {
                url ='<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}";?>/streaming/stop?act=true&id='+item.id;
            }


            $http.get(url)
                .then(function(e){
                    location.reload();
                    console.log(e);
                },$rootScope.error);

        }
        
        
    });


        
</script>
