
<form   class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="save(<?php echo $itemType;?>)">


    <?php
    include (TEMPLATE_PATH."/base/form/categories.php");
    ?>

    <?php
    $data1Attr="name";
    $imageAttr="url";
    $associatedType="file";
    $groupName="icon";
    $filters=["formats"=>"svg"];
    include (TEMPLATE_PATH."/base/form/associated.php");
    ?>


    <?php
    $type="text";
    $label=$_LANG["{$itemType}.text"];
    $model="{$itemType}.text";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>



    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

