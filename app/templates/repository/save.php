

<form  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load(\"{$_ENV['website']['root']}/{$itemType}?act=true&id={$_GET["id"]}\",\"{$itemType}\")'"; } ?> data-ng-submit="save('<?php echo $_ENV['website']['root']?>/repository/save?act=true',<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

