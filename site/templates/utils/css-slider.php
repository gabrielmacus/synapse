
<?php
/**
 * Genero los estilos de la galería
 * Documentación: https://snook.ca/archives/html_and_css/simplest-css-slideshow
 */


$sliderNumber =(empty($sliderNumber))?1:$sliderNumber;
$num = count($images);


if($num > 1){
    $fade = !empty($fade)?$fade:3; // tiempo de fade entre imagenes
    $visible=!empty($visible)?$visible:3; // Tiempo visible entre transición
    $animationDuration = (($fade + $visible) * $num);
    $a = 100 / $animationDuration;

    ?>
    <style>
        @keyframes slide-fade-<?php echo $sliderNumber;?> {
            0%   { opacity: 0; }
        <?php echo  number_format($a * $fade, 2, '.', ','); ?>%   { opacity: 1; }
        <?php echo  number_format($a * ($fade + $visible), 2, '.', ','); ?>%  { opacity: 1; }
        <?php echo number_format($a * ($fade + $visible + $fade), 2, '.', ','); ?>%  { opacity: 0; }
        100% { opacity: 0; }
        }

        .slider-<?php echo $sliderNumber ?> .css-slide {
            position:absolute;
            width:100%;
            height:100%;
            opacity:0;
            animation-name: slide-fade-<?php echo $sliderNumber;?>;
            animation-duration: <?php echo $animationDuration;?>s;
            animation-iteration-count: infinite;
        }


        <?php

    foreach ($images as $idx=>$m) {


            ?>


        .slider-<?php echo $sliderNumber ?> .css-slide-<?php echo $idx; ?> {
            animation-delay: <?php echo (($fade + $visible) * ($idx - 1));?>s;
        }


        <?php


    } ?>

    </style>
    <?php
}

?>



<div class="css-slider slider-<?php echo $sliderNumber?>">

    <?php foreach ($images as $k => $v) {

        ?>

        <div class="css-slide css-slide-<?php echo $k; ?>">
            <figure>
                <img src="<?php echo $v["url"];?>" />
                <?php
                if(!empty($v["text"]))
                {
                    ?>
                    <figcaption><?php echo $v["text"]?></figcaption>
                    <?php
                }
                ?>
            </figure>
        </div>

    <?php } ?>

</div>

<?php
$images= false;
$sliderNumber=false;
$fade=false;
$visible=false;

?>