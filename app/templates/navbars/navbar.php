
<nav class="flex ">



    <?php

    foreach ($userPermissions as $k=>$v)
    {


        if(!strpos($v,"."))
        {
            ?>
            <a class="padding" href="<?php echo $_ENV["website"]["root"]."/{$v}"?>">
                <?php echo $_LANG["menu.{$v}"] ?>
            </a>
            <?php
        }
    }
    ?>

    <a class="padding" href="<?php echo $_ENV["website"]["root"]."/user/salir"?>">
        <?php echo $_LANG["menu.salir"]; ?>
    </a>
</nav>