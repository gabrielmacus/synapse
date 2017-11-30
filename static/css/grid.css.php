
<?php


    function generateGrid($size,$columns,$margin)
    {
            ?>


    <?php
       for($i=1;$i<=$columns;$i++)
           {
               ?>


    .col-<?php echo $size?>-<?php echo $i;?> .cl:nth-child(<?php echo $i?>n)
    {
        margin-right: 0!important;
    }

    .cl.<?php echo "{$size}-{$i}";?>
    {
    <?php
    $w = ($columns / $i);

    $w = (($i * 100) / $columns) -  ($margin - ($margin / $w)) ;

    echo "width:{$w}%";
    ?>
    }




    <?php
            }
        ?>
    <?php
    }


    header("Content-type: text/css; charset: UTF-8");

    $columns=12;
    $breakpoints =  ["l"=>1024,"m"=>768,"s"=>600];
    $margin = 2.1;


    ?>
 @media screen and (min-width: <?php echo reset($breakpoints)+1?>px) {

     <?php  generateGrid("xl",$columns,$margin); ?>

 }

<?php

    foreach ($breakpoints as $k=>$v)
        {
            ?>

   @media screen and (max-width: <?php echo $v?>px) {


       <?php  generateGrid($k,$columns,$margin);?>


   }



<?php
        }

?>

.flex
{
    display: flex;
    flex-wrap: wrap;
}


.fila
{
    width: 100%;
}



/*
.col-3 .cl:nth-child(3n),
.col-2 .cl:nth-child(2n){ margin-right: 0}
.col-4 .cl:nth-child(4n) { margin-right: 0}
.cl {float:left;margin-right:1%}
*/
.cl img{height:100%;width: 100%;object-fit: cover}
.cl {float:left;margin-right:<?php echo $margin;?>%}

/*

.cl-1 {width:7.416666666666667%}
.cl-2 {width:15.833333333333332%}
.cl-3 {width:24.25%}
.cl-4 {width:32.666666666666664%}
.cl-5 {width:41.083333333333336%}
.cl-6 {width:49.5%}
.cl-7 {width:57.91666666666667%}
.cl-8 {width:66.33333333333333%}
.cl-9 {width:74.75%}
.cl-10 {width:83.16666666666667%}
.cl-11 {width:91.58333333333334%}
.cl-12 {width:100%}
*/
