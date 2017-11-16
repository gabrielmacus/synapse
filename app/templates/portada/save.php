
<form   class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="save(<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $data1Attr="name";
    $associatedType="streaming";
    $groupName="streamings";
    include (TEMPLATE_PATH."/base/form/associated.php");
    ?>



    <?php
    $data1Attr="name";
    $associatedType="repository";
    $groupName="repositorios";
    include (TEMPLATE_PATH."/base/form/associated.php");
    ?>


    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

