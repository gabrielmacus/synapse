<form  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load(\"{$itemType}\",{$_GET["id"]})'"; } ?> data-ng-submit="save('<?php echo $itemType; ?>',<?php echo $itemType;?>)">

    <?php
    $type="text";
    $label=$_LANG["{$itemType}.name"];
    $model="{$itemType}.name";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>
    <?php
    $label="Acciones autorizadas";
    $options=ArrayService::controllersToArray();

    unset($options["user.login"]);
    unset($options["user.salir"]);

    /*
     * /streaming/watch*/

    $multiple=true;
    $model="{$itemType}.actions";
    include (TEMPLATE_PATH."/base/form/select.php");
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

