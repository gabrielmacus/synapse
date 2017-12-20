
<?php

$title="¿Qué te ofrecemos?";
include "header.php";

$elements =
    [
        ["title"=>"Colocación y reparación de aires acondicionados","image"=>"https://www.airconco.com/wp-content/uploads/2016/01/maintenance.jpg"],
        ["title"=>"Mantenimiento de heladeras y freezers","image"=>"http://mspoweruser.com/wp-content/uploads/2016/09/samsung-family-hub.jpg"],
        ["title"=>"Asesoramiento profesional","image"=>"http://www.airproductsinc.com/wp-content/uploads/2016/03/Dealer-Handshake-Woman.jpg"],
        ["title"=>"Reparación de lavarropas","image"=>"https://media1.popsugar-assets.com/files/thumbor/Ys8w2qYkpYAeI1jIYLcUq3QntJc/fit-in/550x550/filters:format_auto-!!-:strip_icc-!!-/2013/05/15/030/n/1922441/d02e50161ef1327b_P1150285.jpg"]

    ];

?>

<div class="col-s-1 col-m-1 col-l-2 col-xl-4 flex">

    <?php foreach($elements as $k=>$v)
    {
        ?>
        <div class="box  cl s-12 m-12 l-6 xl-3 " >

            <header class="front flex animated">


                <figure class="animated" >
                    <img src="<?php echo $v["image"]?>">
                </figure>

                <h3 ><?php echo $v["title"];?></h3>
            </header>

            <?php
            if(!empty($v["text"]))
            {
                ?>
                <div class="back animated">
                    <p>
                        <?php echo $v["text"]?>
                    </p>
                </div>

                <?php
            }
            ?>



        </div>
        <?php
    }?>

</div>

<?php

$elements =false;
?>