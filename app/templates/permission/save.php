<form  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; }else echo "data-ng-init='{$itemType}={}'" ?> data-ng-submit="save(<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>
    <?php



    $label=$_LANG["{$itemType}.authorizedActions"];;

    $data["list"] = ArrayService::controllersToArray();
    unset($data["list"]["user.login"]);
    unset($data["list"]["user.salir"]);

    $data["options"]=[1=>"{$itemType}.actions.me",2=>"{$itemType}.actions.group",3=>"{$itemType}.actions.everyone"];
    $model="{$itemType}.actions";





    include (TEMPLATE_PATH."/base/form/radio-select.php");

    /*
    $label=$_LANG["{$itemType}.authorizedActions"];;
    $options=ArrayService::controllersToArray();




    $multiple=true;
    $model="{$itemType}.actions";
    include (TEMPLATE_PATH."/base/form/select.php");
    */
    ?>


    <?php
    $type="text";
    $label=$_LANG["{$itemType}.loginRedirect"];
    $model="{$itemType}.login_redirect";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php

    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>


</form>

