
<nav class="flex ">



    <?php

    foreach ($userPermissions as $k=>$v)
    {


        if(!strpos($v,"."))
        {
            ?>
            <a class="padding" href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$v}"?>">
                <?php echo $_LANG["menu.{$v}"] ?>
            </a>
            <?php
        }
    }
    ?>

    <a class="padding" href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/user/salir"?>">
        <?php echo $_LANG["menu.salir"]; ?>
    </a>
    <a class="avatar ">

        <span class="username"><?php echo $userData->username?></span>
        <figure>
            <img src="https://tasmania.madeopen.com.au/img/profile-pic.svg">
        </figure>

    </a>
</nav>