
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

    <a class="avatar">

        <span  data-ng-click="userMenuOpened = !userMenuOpened"  class="username"><?php echo $userData->username?></span>
        <figure data-ng-click="userMenuOpened = !userMenuOpened" >
            <img src="https://tasmania.madeopen.com.au/img/profile-pic.svg">
        </figure>
        <ul  class="menu scale-fade" data-ng-if="userMenuOpened" >
            <li><span class="triangle"></span></li>
            <li>
                <a class="padding" href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/user/salir"?>">
                    <?php echo $_LANG["menu.salir"]; ?>
                </a>

            </li>
        </ul>


    </a>
</nav>
