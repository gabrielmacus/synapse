<?php
$controller="radioSelect{$model}Controller";

?>
<div class="form-block">
    <label><?php echo $label?></label>

    <script>
        app.controller('<?php echo $controller?>', function($scope,$rootScope,$http) {


            if(!$rootScope.<?php echo $itemType?>)
            {
                $rootScope.<?php echo $itemType ?> = {};
            }

            $rootScope.<?php echo $model?>=[];




        });
    </script>

    <ul class="radio-select flex" data-ng-controller="<?php echo $controller; ?>">

        <?php

        foreach ($data["list"] as $k=>$v)
        {
            ?>
            <li class="animated">

                <span class="check noselect">

                    <input data-ng-true-value="'<?php echo $k;?>'" data-ng-false-value="null" data-ng-model="<?php echo $model?>['<?php echo $k;?>'].action"  id="checkbox<?php echo $k;?>" type="checkbox">
                    <label class="selected" for="checkbox<?php echo $k?>">

                        <i class=" material-icons">&#xE834;</i>



                    </label>
                    <label for="checkbox<?php echo $k?>" class="unselected">
                          <i class=" material-icons">&#xE835;</i>
                    </label>


                </span>
               <span class="data"><?php echo $v?></span>
                <span class="options ">
                    <?php
                    foreach ($data["options"] as $j=>$i)
                    {
                        ?>
                        <span class="radio"><input  data-ng-model="<?php echo $model?>['<?php echo $k;?>'].type" id="radio<?php echo $k.$j?>" name="<?php echo $k;?>" type="radio" value="<?php echo $j;?>"><label for="radio<?php echo $k.$j;?>" class="animated"><?php echo $_LANG[$i];?> <i class="material-icons unselected">&#xE836;</i> <i class="material-icons selected">&#xE837;</i></label></span>
                        <?php
                    }
                    ?>


                </span>
            </li>
            <?php

        }
        ?>


    </ul>



</div>

<?php
$model =false;
$data = false;
$controller =false;
?>