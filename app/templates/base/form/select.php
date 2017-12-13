<div class="form-block">
    <label><?php echo $label?></label>

    <select <?php if(!empty($value)){ echo "data-ng-value='{$value}'"; } ?> data-ng-model="<?php echo $model?>"  <?php echo (!empty($multiple))?"multiple":""; ?>>
        <?php
        foreach ($options as $k=>$v)
        {
            ?>
            <option value="<?php  echo $k; ?>" ><?php echo $v?></option>
            <?php
        }
        ?>
    </select>

    <?php include "error.php"?>
</div>
<?php
$options=false;
$value=false;
$label=false;
$model=false;
$multiple  = false;

?>
