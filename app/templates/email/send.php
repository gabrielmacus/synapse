
<form data-ng-controller="emailController"  class="save flex padding" data-ng-submit="send()">


    <?php
    $type="text";
    $label=$_LANG["{$itemType}.from"];
    $model="{$itemType}.from";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>


    <?php
    $type="text";
    $label=$_LANG["{$itemType}.to"];
    $model="{$itemType}.to";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.subject"];
    $model="{$itemType}.subject";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>


    <?php

    $label=$_LANG["{$itemType}.body"];
    $model="{$itemType}.body";
    include (TEMPLATE_PATH."/base/form/textarea.php");
    ?>




    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>
</form>

<script>
    app.controller('emailController', function($rootScope, $http) {

        $rootScope.email={};

        $rootScope.send=function () {



            $rootScope.errors={};
            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }
            var url = "<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/"; ?>email?act=true";




            $http.post(url,param($rootScope.email),config)
                .then(function (e) {

                    location.reload();


                },$rootScope.error);
        }
    });
</script>
