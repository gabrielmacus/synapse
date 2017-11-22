<div class="form-block">
    <?php
    if(!empty($label))
    {
        ?>
        <label><?php echo $label; ?></label>
        <?php
    }
    ?>

    <input <?php echo !empty($onClick)?"data-ng-click='{$onClick}'":""; ?> <?php echo !empty($value)?"value='{$value}'":"";?> <?php echo !empty($onChange)?"data-ng-change='{$onChange}'":""; ?> <?php echo (!empty($placeholder))?"placeholder='{$placeholder}'":""; ?> <?php echo !empty($class)?"class='{$class}'":"";?> <?php echo !empty($model)?"data-ng-model='{$model}'":"";?> type="<?php echo $type; ?>">
    <?php include "error.php"?>
</div>
<?php
$label=false;
$class=false;
$onClick=false;
$onChange=false;
$value=false;
$type = false;
$model=false;
?>