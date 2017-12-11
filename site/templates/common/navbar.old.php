
<nav class="main-navbar ">


    <div class="sections fila  col-s-1  col-m-1 col-l-2 col-xl-2">



        <?php
        if($currentCat!=$mainCategory)
        {
            ?>
            <h2 class="title ">
                <?php echo $cat[$currentCat]["name"];?>
            </h2>
            <?php
        }
        else
        {
            ?>
            <h2 class="title">
                Secciones
            </h2>

            <?php
        }
        ?>



        <?php
        foreach ($cat as $k=>$v)
        {
            if($v["belongs"] == $currentCat)
            {
                ?>
                <a class="animated cl  s-12 m-12  l-6 xl-6" href="?s=<?php echo $v["id"];?>"><?php echo $v["name"];?></a>
                <?php
            }
        }
        ?>
    </div>



</nav>