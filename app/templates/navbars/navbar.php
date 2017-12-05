
<nav class="flex ">

    <div class="avatar ">

        <div class="wrapper">
            <span  data-ng-click="userMenuOpened = !userMenuOpened"  class="username"><?php echo $userData->username?> <i class="material-icons">&#xE5C5;</i></span>

            <figure data-ng-click="userMenuOpened = !userMenuOpened" >
                <img src="https://tasmania.madeopen.com.au/img/profile-pic.svg">
            </figure>
            <ul  class="menu toggle" data-ng-if="userMenuOpened" >

                <li><span class="triangle"></span></li>

                <li>
                    <a href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/user/salir"?>" class="padding"><?php echo $_LANG["menu.salir"]; ?></a>
                </li>
            </ul>

        </div>



    </div>

    <?php

    $k = "home";

    if(!empty($userPermissions[$k]) && !empty($userPermissions[$k]["type"]))
    {
        $v =$userPermissions[$k]["action"];
        ?>
        <a class="padding <?php echo ($itemType==$v)?"active":""; ?>" href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$v}"?>">
            <?php echo $_LANG["menu.{$v}"] ?>
        </a>
        <?php
        unset($userPermissions[$k]);

    }
    ?>


    <?php

    foreach ($userPermissions as $k=>$v)
    {

        $v=(!empty($v["action"]))?$v["action"]:false;
        if($v)
        {
            if(!strpos($v,"."))
            {
                ?>
                <a class="padding <?php echo ($itemType==$v)?"active":""; ?>" href="<?php echo "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$v}"?>">
                    <?php echo $_LANG["menu.{$v}"] ?>
                </a>
                <?php
            }
        }

    }
    ?>

</nav>

