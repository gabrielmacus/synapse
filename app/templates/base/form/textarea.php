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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.9.2/trix.css">
        <!-- https://github.com/sachinchoolur/angular-trix -->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/trix/0.9.2/trix.js"></script>
        <?php
    }
    ?>





    <?php include "error.php"?>
</div>