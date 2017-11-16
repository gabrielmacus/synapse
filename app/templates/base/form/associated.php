
<?php
$controllerName="{$itemType}".ucfirst($groupName)."Controller";

$arrayName = "{$itemType}.associated.{$associatedType}.{$groupName}";
?>
<script>



    app.controller('<?php echo $controllerName?>', function($scope,$rootScope,$http) {


        $rootScope.init<?php echo $itemType.ucfirst($groupName);?>=function () {
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

            if(!$rootScope.<?php echo $arrayName;?>)
            {
                $rootScope.<?php echo $arrayName;?>={"delete":[],"save":[]};
            }

        }


        $rootScope.init<?php echo $itemType.ucfirst($groupName);?>();

        $rootScope.<?Php echo $groupName?>="<?php echo $_ENV["website"]["url"]."/".$language."/".$_ENV["website"]["panelAccess"]."/".$associatedType."?embed=true&group={$groupName}";?>&filter=";

        window.addEventListener("message", function (event) {


            if(event.origin+"<?php echo rtrim($_ENV["website"]["root"],"/");?>/" == "<?php echo rtrim($_ENV["website"]["url"],"/");?>/" && event.data.group == "<?php echo $groupName;?>")
            {

                $rootScope.init<?php echo $itemType.ucfirst($groupName);?>();

                var data = event.data.items;

                for(var k in data)
                {
                    $rootScope.<?php  echo $arrayName?>.save.push(data[k]);
                }


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
    <ul class="col-4" sv-root sv-part="<?php echo $arrayName; ?>.save" >
        <li class="empty padding " data-ng-if="!<?php echo $arrayName?>.save || <?php echo $arrayName?>.save.length==0">

            <p><?php echo str_replace("{i}",$_LANG["menu.{$associatedType}"],$_LANG["form.associate.empty"]); ?></p>
        </li>

        <li class="cl-3"  sv-element data-ng-repeat="(k,i) in <?php echo $arrayName?>.save" >

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
            <span class="delete" data-ng-click="removeAssociated(k,<?php echo $arrayName?>)"><i class="material-icons">&#xE14C;</i></span>
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