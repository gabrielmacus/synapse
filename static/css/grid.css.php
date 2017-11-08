
<?php
    header("Content-type: text/css; charset: UTF-8");

    $gutter =8;

    $columns=12;

    $breakpoints=
    [
            "xl"=>"",
            "l"=>1024,
            "m"=>768,
            "s"=>600,
            "xs"=>420
];
    ?>

<?php
    foreach ($breakpoints as $k=>$v)
        {

            if(!empty($v))
                {

                    ?>

                    @media screen and (max-width: <?php echo $v?>px) {
                    <?php

                    for ($i=1;$i<=$columns;$i++)
                        {


                            ?>

                    <?php
                        $width = (($i*100)/$columns);

                        }
                    ?>
                    }
                        <?php
                }


        }

 ?>
.flex
{
    display: flex;
    flex-wrap: wrap;
}

/*


.gutter
{
    justify-content: space-between;
}



<?php
    foreach ($breakpoints as $k=>$v)
        {

            if(!empty($v))
                {
                    ?>
                    @media screen and (max-width: <?php echo $v?>px)
                    {
                    <?php
                    for ($i=1;$i<=$columns;$i++)
                        {

                        $width = (($i*100)/$columns);
                            ?>


                        .cl.<?php echo $k.$i?>
                        {

                        <?php echo "width:{$width}%;"?>;

                        }
                        .gutter .cl.<?php echo $k.$i?>
                        {
                            <?php echo "width:calc({$width}% - {$gutter}px);"?>;
                            margin-bottom: <?php echo $gutter * 2 ?>px;
                        }


                    <?php
                            }
                        ?>

                    }
                <?php
                }
                else
                {

                for ($i=1;$i<=$columns;$i++)
                                 {

                                 $width = (($i*100)/$columns);
                                     ?>

                .cl.<?php echo $k.$i?>
                {

                <?php echo "width:{$width}%;"?>;

                }
                .gutter .cl.<?php echo $k.$i?>
                {

                   <?php echo "width:calc({$width}% - {$gutter}px);"?>;
                    margin-bottom: <?php echo $gutter * 2 ?>px;
                }

                <?php
                        }

                }


        }
?>
.cl:last-child
{
    margin-right: 0%;
}

*/