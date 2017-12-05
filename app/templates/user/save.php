
<form  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="save(<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.username"];
    $model="{$itemType}.username";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.surname"];
    $model="{$itemType}.surname";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>


    <?php
    $type="email";
    $label=$_LANG["{$itemType}.email"];
    $model="{$itemType}.email";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $type="password";
    $label=$_LANG["{$itemType}.password"];
    $model="{$itemType}.password";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $label=$_LANG["{$itemType}.permissions"];
    $model="{$itemType}.permission_id";
    $options = $permissions_options;
    include (TEMPLATE_PATH."/base/form/select.php");
    ?>

    <?php
    $label=$_LANG["{$itemType}.status"];
    $model="{$itemType}.status";
    $options = [0=>$_LANG["{$itemType}.status.inactive"],1=>$_LANG["{$itemType}.status.active"],2=>$_LANG["{$itemType}.status.suspended"]];
    include (TEMPLATE_PATH."/base/form/select.php");
    ?>

    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

