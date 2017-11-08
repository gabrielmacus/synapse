
<?php
$controllerName="{$itemType}".ucfirst($groupName)."Controller";

$arrayName = "{$itemType}.associated.{$groupName}";
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


        $rootScope.<?php echo $arrayName;?>=[];

        $rootScope.<?Php echo $groupName?>="<?php echo $_ENV["website"]["url"]."/".$language."/".$_ENV["website"]["panelAccess"]."/".$associatedType."?embed=true&group={$groupName}";?>&filter=";

        window.addEventListener("message", function (event) {


            if(event.origin+"<?php echo rtrim($_ENV["website"]["root"],"/");?>/" == "<?php echo rtrim($_ENV["website"]["url"],"/");?>/")
            {

                var data = event.data;

                console.log(data);
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
    <ul class="flex gutter">
        <!--
        <li class="empty padding " data-ng-if="<?php echo $arrayName?>.length==0">

           <p><?php echo str_replace("{i}",$_LANG["menu.{$associatedType}"],$_LANG["form.associate.empty"]); ?></p>
        </li>

        <li data-ng-repeat="i in <?php echo $arrayName?>">
            {{i.data1}}
        </li>
        -->
        <li class="cl xl3 l4 m6 s12 xs12">
            <figure>
                <img src="https://i.pinimg.com/736x/56/79/7e/56797edd0f810b67b11d81b28455a5f0--places-to-go-monastic.jpg">
            </figure>
            <div class="info">
                <h3>Demo 1</h3>
            </div>
        </li>
        <li class="cl xl3 l4 m6 s12 xs12">
            <figure>
                <img src="https://i.pinimg.com/736x/56/79/7e/56797edd0f810b67b11d81b28455a5f0--places-to-go-monastic.jpg">
            </figure>
            <div class="info">
                <h3>Demo 1</h3>
            </div>
        </li>
        <li class="cl xl3 l4 m6 s12 xs12">
            <figure>
                <img src="https://i.pinimg.com/736x/56/79/7e/56797edd0f810b67b11d81b28455a5f0--places-to-go-monastic.jpg">
            </figure>
            <div class="info">
                <h3>Demo 1</h3>
            </div>
        </li>
        <li class="cl xl3 l4 m6 s12 xs12">
            <figure>
                <img src="https://i.pinimg.com/736x/56/79/7e/56797edd0f810b67b11d81b28455a5f0--places-to-go-monastic.jpg">
            </figure>
            <div class="info">
                <h3>Demo 1</h3>
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
?>