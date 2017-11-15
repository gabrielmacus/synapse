
<?php
$controllerName="{$itemType}".ucfirst($groupName)."Controller";

$arrayName = "{$itemType}.associated.{$associatedType}.{$groupName}";
?>
<script>


    app.controller('<?php echo $controllerName?>', function($scope,$rootScope,$http) {

        if(!$rootScope.<?php echo $itemType ?>)
        {
            $rootScope.<?php echo $itemType ?>={};
        }

        if(!$rootScope.<?php echo $itemType ?>.associated)
        {
            $rootScope.<?php echo $itemType ?>.associated={};
        }

        if(!$rootScope.<?php echo $itemType ?>.associated.<?php echo $associatedType?>)
        {
            $rootScope.<?php echo $itemType ?>.associated.<?php echo $associatedType?>={};
        }

        $rootScope.<?php echo $arrayName;?>=[];


        $rootScope.<?Php echo $groupName?>="<?php echo $_ENV["website"]["url"]."/".$language."/".$_ENV["website"]["panelAccess"]."/".$associatedType."?embed=true&group={$groupName}";?>&filter=";

        window.addEventListener("message", function (event) {


            if(event.origin+"<?php echo rtrim($_ENV["website"]["root"],"/");?>/" == "<?php echo rtrim($_ENV["website"]["url"],"/");?>/")
            {

                var data = event.data;

                console.log(data);

                console.log($rootScope.portada);
                angular.merge($rootScope.<?php  echo $arrayName?>,data);
                $rootScope.modal=false;
                $rootScope.$apply();




            }

        }, false);

    });
</script>
<div data-ng-controller="<?php echo $controllerName; ?>"   class="form-block associated">

    <label>
        <?php echo $_LANG["form.associate.{$groupName}"];?>
    </label>
    <ul class="flex gutter" sv-root sv-part="<?php echo $arrayName; ?>" >
        <li class="empty padding " data-ng-if="!<?php echo $arrayName?> || <?php echo $arrayName?>.length==0">

            <p><?php echo str_replace("{i}",$_LANG["menu.{$associatedType}"],$_LANG["form.associate.empty"]); ?></p>
        </li>


        <li  sv-element data-ng-repeat="i in <?php echo $arrayName?>  ">
            <?php
            if(!empty($imageAttr)) {
                ?>
                <figure data-ng-if="<?php echo "i.{$imageAttr}";?>">
                    <img data-ng-src="<?php echo "{{i.{$imageAttr}}}"; ?>">
                </figure>
                <?php
            }?>
            <div class="info">
                <h3><?php echo "{{i.{$data1Attr}}}";?></h3>
            </div>
        </li>
    </ul>

    <a   style="margin-left: auto;"   data-ng-click='openModal(<?Php echo $groupName?>,"iframe")'>
        <?php echo str_replace("{i}",$_LANG["menu.{$associatedType}"],$_LANG["form.associate"]);?>
    </a>

</div>


<?php


$groupName=false;
$arrayName=false;
$associatedType=false;
$controllerName=false;
$imageAttr = false;
$data1Attr=false;
?>