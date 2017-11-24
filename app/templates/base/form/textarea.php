<div class="form-block">
    <label><?php echo $label; ?></label>

    <?php
    if(empty($richtext))
    {
        ?>
        <textarea class="" data-ng-model="<?php echo $model ?>" type="<?php echo $type; ?>"></textarea>
    <?php
    }
    else
    {
        ?>

        <?php
    }
    ?>





    <?php include "error.php"?>
</div>

<?PHP

$richtext=false;
?>