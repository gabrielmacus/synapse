
<?php
$embedParam=(!empty($_GET["embed"]))?$_GET["embed"]:"false";
?>
<div class="form-block submit">
    <button type="submit" class="padding">
        <?php echo $text1; ?>
    </button>


    <button  type="button" onclick="<?php echo !empty($itemType)?"window.location.href='{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$itemType}?embed={$embedParam}'":"window.history.back()"; ?>" class="padding">
        <?php echo $text2; ?>
    </button>

</div>