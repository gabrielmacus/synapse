
<?php

$title="Portfolio";
include "header.php";

$w=319;
$h=230;

?>

<div class="col-s-1 col-m-2 col-l-3 col-xl-4 flex">

    <?php
    foreach ($portfolio as $k=>$v)
    {
        ?>

        <a class="cl s-12 m-6 l-4 xl-3 portfolio-item">

            <figure>
                <img src="<?php echo reset($v["images"])["url"]."?w={$w}&h={$h}"?>">

                <?php
                if(!empty($v["text"]))
                {
                    ?>
                    <figcaption class="caption animated"><?php echo $v["text"]?></figcaption>
                    <?php
                }
                ?>

            </figure>

        </a>
        <?php
    }
    ?>


</div>
