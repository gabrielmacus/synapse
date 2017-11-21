<div class="form-block">
    <?php
    if(!empty($label))
    {
        ?>
        <label><?php echo $label; ?></label>
        <?php
    }
    ?>

    <input <?php echo (!empty($placeholder))?"placeholder='{$placeholder}'":""; ?> class="" data-ng-model="<?php echo $model ?>" type="<?php echo $type; ?>">
    <?php include "error.php"?>
</div>
<?php
$label=false;
?>