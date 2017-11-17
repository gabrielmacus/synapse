

<form  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="save(<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $label=$_LANG["{$itemType}.formats"];
    $multiple=true;
    $model="{$itemType}.formats";
    $options = json_decode(file_get_contents(BASE_PATH."/.base/cache/formats.json"),true);
    include (TEMPLATE_PATH."/base/form/select.php");
    ?>



    <!---
    <div data-ng-if="inArray(['jpg','png','gif'],<?php echo "{$itemType}.formats"?>)">
    </div>
    --->



    <?php
    $type="number";
    $label=$_LANG["{$itemType}.maxSize"];
    $model="{$itemType}.max_size";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>




    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

