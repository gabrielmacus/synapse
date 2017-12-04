<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/12/2017
 * Time: 03:14 PM
 */
if(!empty($_PAGINATION) && $_PAGINATION["pages"] > 1)
{

    unset($_GET["p"]);
    ?>

    <ol class="pagination ">

        <li class="prev <?php echo (empty($_PAGINATION["prevPage"]))?"disabled":""; ?> ">
            <a  href="<?php echo (empty($_PAGINATION["prevPage"]))?"":"?p={$_PAGINATION["prevPage"]}&".http_build_query($_GET); ?>"><i class="material-icons">&#xE408;</i></a>
        </li>


        <?php
        foreach ($_PAGINATION["paginator"] as $k=>$v)
        {
            unset($_GET["p"]);
            ?>
            <li class="page <?php echo (!empty($v["active"]))?"active":""?>"><a href="?p=<?php echo $k."&".http_build_query($_GET)?>" title="<?php echo str_replace("{i}",$k,$_LANG["pagination.goto"])?>"><?php echo $k;?></a></li>
            <?php


        }

        ?>

        <li class="next <?php echo (empty($_PAGINATION["nextPage"]))?"disabled":""; ?>">
            <a href="<?php echo (empty($_PAGINATION["nextPage"]))?"":"?p={$_PAGINATION["nextPage"]}&".http_build_query($_GET); ?>"><i class="material-icons">&#xE409;</i></a>
        </li>

    </ol>

    <?php

}